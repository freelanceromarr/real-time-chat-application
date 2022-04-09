const fileUploader = require("../../avater/filehandler");

function filehandle(req, res, next) {
  const fileupdload = fileUploader(
    "avatar",
    "200000",
    ["image/jpg", "image/jpeg", "image/png"],
    "Only jpg, jpeg and png format allowed"
  );
  fileupdload.any()(req, res, (err) => {
    if (err) {
      res.status(500).json({
        error: {
          avatar: {
            msg: err.message,
          },
        },
      });
      console.log(err);
    } else {
      next();
    }
  });
}

module.exports = filehandle;
