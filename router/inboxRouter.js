const express = require('express')
const Router= express.Router();
const {getinbox, searchUser, conversation, getmessage}= require('../controller/inboxController')
const dynamicTitle= require('../middleware/title')
const isLogin= require('../middleware/users/logincheck')

//get request for inbox page
Router.get('/', dynamicTitle('Inbox'),isLogin,getinbox);
Router.post("/search", searchUser);
Router.post("/conversation", isLogin, conversation);

//messages
Router.get('/message/:conversation_id',getmessage);

module.exports =Router;