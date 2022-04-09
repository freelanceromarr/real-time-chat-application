const { check, validationResult } = require("express-validator");
const CreateError = require("http-errors");
const { unlink } = require("fs");
const User = require("../../model/chatusers");
const uservalidator = [
  check("name")
    .isLength({ min: 0 })
    .withMessage("Name is required")
    .isAlpha("en-US", { ignore: "-" })
    .withMessage("Name must not contain anything other than alphabet")
    .trim(),
  check("email")
    .isEmail()
    .withMessage("Invalid Email Address")
    .trim()
    .custom(async (value) => {
      try {
        const user = await User.findOne({ email: value });
        if (user) {
          throw CreateError("Email is already exist");
        }
      } catch (err) {
        throw CreateError(err.message);
      }
    }),
  check("phone")
    .isMobilePhone("bn-BD", { strictMode: true })
    .withMessage("Mobile phone should be valid")
    .trim()
    .custom(async (value) => {
      try {
        const phone = await User.findOne({ phone: value });
        if (phone) {
          throw CreateError("Phone is already in exist");
        }
      } catch (error) {
        throw CreateError(error.message);
      }
    }),
  check("password")
    .isStrongPassword()
    .withMessage(
      "Password should be at least 8 characters, 1 lowercase, 1 uppercase, 1 number and 1 symbol"
    ),
];

const userValidationErrorHandler = (req, res, next) => {
  const errors = validationResult(req);
  const errormapping = errors.mapped();
  if (errors.isEmpty()) {
    next();
  } else {
    console.log(req);

    if (req.files && req.files.length > 0) {
      const { filename } = req.files[0];
      unlink(
        path.join(__dirname, `../../public/upload/avatar/${filename}`),
        (err) => {
          if (err) {
            console.error(err);
          }
        }
      );
    }
  }
  res.status(500).json(errormapping);
};
module.exports = { uservalidator, userValidationErrorHandler };
