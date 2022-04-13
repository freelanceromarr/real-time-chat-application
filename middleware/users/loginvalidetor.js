const {check, validationResult} = require("express-validator");
const User = require('../../model/chatusers');
const CreateError = require("http-errors");

const loginValidation =[
    check('username')
    .isLength({min: 1})
    .withMessage('Invalid phone or Email'),
    check('password')
    .isLength({min: 1})
    .withMessage('Invalid password')
]

const loginValidationHandler = function(req, res, next){
    const errors= validationResult(req);
    const mappedErrors = errors.mapped()
    if (Object.keys(mappedErrors).length === 0) {
        next()
    }else{
        // res.status(400).json(mappedErrors);
        res.render('index',{
            data:{
                username: req.body.username
            },
            errors: mappedErrors,
        })
    }
}

module.exports ={loginValidation, loginValidationHandler}