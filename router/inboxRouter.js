const express = require('express')
const Router= express.Router();
const {getinbox}= require('../controller/inboxController')
const dynamicTitle= require('../middleware/title')

Router.get('/', dynamicTitle('Inbox'),getinbox);



module.exports =Router;