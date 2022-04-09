const multer = require("multer");
const path = require("path");
const CreateError = require("http-errors");

//define a function for file upload

function fileUploader(filepath, file_size, file_format, error_msg) {
  //file directory
  const filedirectory = `${__dirname}/../public/upload/${filepath}`;

  //storage for multer

  const storage = multer.diskStorage({
    destination: function (req, file, cb) {
      cb(null, filedirectory);
    },
    filename: function (req, file, cb) {
      const file_ext = path.extname(file.originalname);
      const fileName =
        file.originalname
          .replace(file_ext, "")
          .toLocaleLowerCase()
          .split(" ")
          .join("_") +
        "_" +
        Date.now();
      cb(null, fileName + file_ext);
    },
  });

  //file upload to multer

  const upload = multer({
    storage: storage,
    limits: {
      fileSize: file_size,
    },
    fileFilter: function (req, file, cb) {
      file_format.includes(file.mimetype)
        ? cb(null, true)
        : cb(null, CreateError(error_msg));
    },
  });
  return upload;
}

module.exports = fileUploader;
