const User = require("../model/chatusers");
const Conversation = require("../model/conversation");
const escape = require("../utilities/escape");
const createError = require("http-errors");

function getinbox(req, res, next){
    console.log(req.user);
    res.render('inbox')
}

async function searchUser(req, res, next){
    const user= req.body.user;
    const searchQuery = user.replace("+88", "");
    const name_search_regex = new RegExp(escape(searchQuery), "i");
    const mobile_search_regex = new RegExp("^" + escape("+88" + searchQuery));
    const email_search_regex = new RegExp("^" + escape(searchQuery) + "$", "i");

    try {
            if(searchQuery !== ""){
                const users = await User.find({ 
                    $or: [
                        {
                            name: name_search_regex,
                          },
                          {
                            mobile: mobile_search_regex,
                          },
                          {
                            email: email_search_regex,
                          },
                    ]
                });
                res.status(200).json(users)
            }
            else{
                throw createError("You must provide some text to search!");
            }
    } catch (err) {
        res.status(500).json({
            errors: {
              common: {
                msg: err.message,
              },
            },
          });
    }
}

//conversation create controller
async function conversation(req, res, next) {
    console.log(req.body)
    let newConversation
    try {
        newConversation = new Conversation({
            creator: {
                id:req.user.userId,
                name: req.user.username,
                avatar: req.user.avatar
            },
            participant: {
                id:req.body.id,
                name: req.body.name,
                avatar: req.body.avatar
            }

        })
        const result = await newConversation.save();
        res.status(200).json({ message: 'Conversation created'})
    } catch (err) {
        res.status(400).json({ 
            errors:{
                common:{
                    msg: err.message,
                }
            }
        })
    }
}
module.exports= {getinbox, searchUser,conversation}