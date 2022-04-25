
const jwt = require('jsonwebtoken')
const isLogin = (req, res, next)=>{
    let cookies = Object.keys(req.signedCookies).length > 0 ? req.signedCookies : null;
    if (cookies) {
        try {
            const token = cookies[process.env.COOKIE_NAME];
            const decode= jwt.verify(token, process.env.TOKEN_KEY);
            req.user = decode;
            if (res.locals.html) {
                res.locals.userLogedIn= decode;
            }
            next();
        } catch (error) {
            if (res.locals.html) {
                res.redirect('/')
            }else{
                res.status(500).json({
                    errors:{
                        common:{
                            msg: 'Authentication failure'
                        }
                       
                    }
                })
            }
        }
        
    }else{
        if (res.locals.html) {
            res.redirect('/')
        }else{
            res.status(400).json({
                errors:{
                    common:{
                        msg: 'Authentication failure'
                    }
                   
                }
            })
        }
    }
}

module.exports = isLogin;