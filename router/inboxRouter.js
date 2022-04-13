const express = require('express')
const Router= express.Router();
const {getinbox}= require('../controller/inboxController')
const dynamicTitle= require('../middleware/title')
const isLogin= require('../middleware/users/logincheck')
//get request for inbox page
Router.get('/', dynamicTitle('Inbox'),getinbox);



module.exports =Router;