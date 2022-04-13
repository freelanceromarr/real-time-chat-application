const express = require("express");
const Router = express.Router();
const filehandle = require("../middleware/users/filehandle");
const { getUsers, addUser } = require("../controller/userController");
const dynamicTitle = require("../middleware/title");
const isLogin= require("../middleware/users/logincheck")
const {
  uservalidator,
  userValidationErrorHandler,
} = require("../middleware/users/uservalidator");

Router.get("/", dynamicTitle("Users"), isLogin, getUsers);

//post user list
Router.post(
  "/",
  filehandle,
  uservalidator,
  userValidationErrorHandler,
  addUser
);

module.exports = Router;
