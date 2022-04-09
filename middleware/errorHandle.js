const CreateError = require("http-errors");
//not found error handler
const notFoundErrorHandler = (req, res, next) => {
  next(CreateError(404, "Your request not found"));
};

//default application error handler
const defaultErrorHandler = (err, req, res, next) => {
  res.locals.error =
    process.NODE_ENV === "development" ? err : { error: err.message };

  if (res.locals.html) {
    res.render("error", {
      title: "error page",
      error: " Something wrong happened",
    });
  } else {
    console.log(err);
    res.json(res.locals.error);
  }
};

module.exports = {
  notFoundErrorHandler,
  defaultErrorHandler,
};
