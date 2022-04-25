const bcrypt = require("bcrypt");
const User = require("../model/chatusers");


// show users list
async function getUsers(req, res, next) {
  const allusers= await User.find({});
  res.render("users", {users:allusers});
}
//delete user
async function deleteUser(req, res, next){
  const userId= req.params;
  await User.findOneAndDelete({_id:req.params.userId})
   
      console.log(req.params);
      res.status(200).json({message: req.params.userId});

  
}


//add user 
async function addUser(req, res, next) {
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
  }
}

module.exports = { getUsers, addUser, deleteUser };
