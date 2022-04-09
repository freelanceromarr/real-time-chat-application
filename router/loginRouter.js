const express = require('express')
const Router= express.Router();
const {getLogin}= require('../controller/loginController')
const dynamicTitle= require('../middleware/title')


Router.get('/',dynamicTitle("Login"),getLogin);



module.exports =Router;