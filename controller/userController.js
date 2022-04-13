const bcrypt = require("bcrypt");
const User = require("../model/chatusers");
function getUsers(req, res, next) {
  res.render("users");
}

async function addUser(req, res, next) {
  console.log(req.body);
  let newUser;
  const makeHashPassword = await bcrypt.hash(req.body.password, 12);
  if (req.files && req.files.length > 0) {
    newUser = new User({
      ...req.body,
      password: makeHashPassword,
      avatar: req.files[0].filename,
    });
  } else {
    newUser = new User({
      ...req.body,
      password: makeHashPassword,
    });
  }
  try {
    const result = await newUser.save();
    res.status(200).json({
      message: "user successfully added",
    });
  } catch (error) {
    res.status(500).json({
      errors: {
        common: {
          error: "something wrong ",
        },
      },
    });
    console.log(error);
  }
}
module.exports = { getUsers, addUser };
