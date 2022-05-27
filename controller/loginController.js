const User = require("../model/chatusers");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
const createError = require("http-errors");

function getLogin(req, res, next){
    res.render('index')
}

//userlogin 
async function getintologin(req, res, next){
    try {
        const user= await User.findOne({
            $or : [{email: req.body.username}, {phone: req.body.username}]
        });
        if (user && user._id) {
            const passwordvalidation= await bcrypt.compare(
                req.body.password,
                user.password
            );
            if(passwordvalidation){
                //object for token generated
                const userObject= {
                    userId: user._id,
                    username:user.name, 
                    email: user.email, 
                    mobile: user.mobile,
                    avatar: user.avatar || null,
                    role: user.role || "user",
                } 
                //generate token
                const token= jwt.sign(userObject, process.env.TOKEN_KEY, {
                    expiresIn: process.env.TOKEN_EXPIRE
                });
    
                //cookie generate
                const cookie = res.cookie(process.env.COOKIE_NAME, token, { 
                    maxAge: process.env.TOKEN_EXPIRE,
                    httpOnly: true,
                    signed:true,
                });
                res.locals.userLogedIn= userObject;
                
                res.redirect('/inbox');
                // res.status(200).json({ message: 'successfully login'});
            } else {throw createError('Invalid login info')}

        } else {throw createError('Invalid login info')}

    } catch (err) {
        res.render('index', {
            data: {
                username: req.body.username
            },
            errors: {
                common: {
                    msg: err.message
                }
            }
        });
        // res.status(500).json({ errors: {common: {
        //                 msg: err.message
        //             }}})
    }
}

//logout
function logout(req, res, next) {
    res.clearCookie(process.env.COOKIE_NAME);
    res.send('logged out');
}

module.exports= {getLogin, getintologin, logout}