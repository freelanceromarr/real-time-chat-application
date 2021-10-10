const express = require('express')
const Router= express.Router();
const {getUsers}= require('../controller/userController')
const dynamicTitle= require('../middleware/title')


Router.get('/',dynamicTitle('Users'),getUsers);



module.exports =Router;