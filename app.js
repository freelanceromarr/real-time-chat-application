const express = require("express");
const cookieParser = require("cookie-parser");
const mongoose = require("mongoose");
const path = require("path");
const app = express();

//all routers
const loginRouter = require("./router/loginRouter");
const UserRouter = require("./router/userRouter");
const inboxRouter = require("./router/inboxRouter");

//error handler
const {
  defaultErrorHandler,
  notFoundErrorHandler,
} = require("./middleware/errorHandle");
//configuring dotenv package
require("dotenv").config();

//database connection
mongoose
  .connect(process.env.DB_CONNECTION, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
  })
  .then(function () {
    console.log("database Connected");
  })
  .catch(function (err) {
    console.log(err);
  });

//body parser json
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

//view engine setup
app.set("view engine", "ejs");

//static Folder
app.use(express.static(path.join(__dirname, "public")));

//cookie parser  setup
app.use(cookieParser(process.env.COOKIE_PARSER_SECRET_KEY));

//route setup
app.use("/", loginRouter);
app.use("/users", UserRouter);
app.use("/inbox", inboxRouter);

//error handling
app.use(notFoundErrorHandler);
//default error handler
app.use(defaultErrorHandler);

app.listen(process.env.PORT, function () {
  console.log(
    "application is running at http://localhost:%d",
    process.env.PORT
  );
});
