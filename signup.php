<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>
<body>

<?php
require_once('config.php');
 
if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $name = mysqli_real_escape_string($con, trim($_POST['name']));
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $password1 = mysqli_real_escape_string($con, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($con, trim($_POST['password2']));
    $code = mysqli_real_escape_string($con, trim($_POST['code']));
    
    if (!empty($name) && !empty($email) && !empty($code) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
        $query = "SELECT * FROM admins WHERE code = '$code'";
        $data = mysqli_query($con, $query);
        if (mysqli_num_rows($data) == 0) {
        echo '<div class="prompterror">Admin Code does not match. You do not have the permission to sign up as Admin<br /><a href="signup.php">Back to Previous Page</a></div>';
        }
        else{ 
        $query1 = "UPDATE admins SET name='$name', email= '$email', password='$password1' WHERE code ='$code'";
		mysqli_query($con, $query1); 
        // Confirm success with the user
        echo '<div class="promptsuccess">Your new account has been successfully created. You\'re now ready to <a href="admin/index.php">log in</a>.</div>';
        }
      
    }
    else {
      echo '<div class="prompterror">You must enter all of the sign-up data, including the desired password twice.</div>';
    }
  }
 
  mysqli_close($con);
?>
 
<div class="container">
<div class="signup">
  <h3>Sign Up</h3>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Please enter your fullname, email and desired password to sign up.</legend>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" placeholder="Enter Your Name" value="<?php if (!empty($name)) echo $name; ?>" required/><br />
      <label for="name">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter E-mail" value="<?php if (!empty($email)) echo $email; ?>" required/><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" placeholder="Choose a Strong password" required/><br />
      <label for="password2">Confirm Password:</label>
      <input type="password" id="password2" name="password2" placeholder="Retype Your Password" required/><br />
      <label for="code">Admin Code(For Admins Only):</label>
      <input type="text" id="code" name="code" placeholder="Enter The Admin Code" required/><br />
    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>
  <a href="loginadmin.php">if you already have account</a>
  </div>
  </div>
</body> 
</html>