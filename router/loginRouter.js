const express = require('express')
const Router= express.Router();
const {getLogin, getintologin, logout}= require('../controller/loginController')
const dynamicTitle= require('../middleware/title')
const {loginValidation, loginValidationHandler} = require('../middleware/users/loginvalidetor');

const pageTitle = 'login'
Router.get('/',dynamicTitle(pageTitle),getLogin);

Router.post('/', 
dynamicTitle(pageTitle), 
loginValidation, 
loginValidationHandler,
getintologin
);

Router.delete('/',logout);

module.exports =Router;