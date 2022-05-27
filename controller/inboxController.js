const User = require("../model/chatusers");
const Conversations = require("../model/conversation");
const escape = require("../utilities/escape");
const createError = require("http-errors");
const Message = require("../model/message")

async function getinbox(req, res, next){
    try{
        const conversationList = await Conversations.find({
            $or:[
                {"creator.id":req.user.userId},
                {"participant.id" :req.user.userId}
            ]
        });
        console.log(conversationList.participant);
        res.locals.data = conversation;
        res.render('inbox', {conData: conversationList})
    }
    catch(err){
        next(err);
    }
    
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
        newConversation = new Conversations({
            creator: {
                id:req.user.userId,
                name: req.user.username,
                avatar: req.user.avatar !== null ? req.user.avatar : './images/nophoto.png'
            },
            participant: {
                id:req.body.id,
                name: req.body.name,
                avatar: req.body.avatar
            }

        })
        const result = await newConversation.save();
        console.log(result);
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

//get message controller
async function getmessage(req, res, next) {
    try {
        const message= await Message.find({
            conversation_id : req.params.conversation_id
        }).sort("-createdAt")
        if (message.length > 0) {
            const {participant}= await Conversation.find(req.params.conversation_id)
            res.status(200).json({
                data:{
                    message: message,
                    participant: participant,
                    conversation_id: conversation_id,
                }
            })
            //may create problem
        }else{res.status(200).json({
            data:{
                message: 'No message available here'
            }
        })}
    } catch (error) {
        res.status(500).json({
            errors:{
                common:{
                    msg: "unknowns error occured"
                }
            }
        })
    }
}
module.exports= {getinbox, searchUser,conversation, getmessage}