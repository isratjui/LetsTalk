<?php
session_start();
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Admin Panel</title>
		<meta name="keywords" content="css transforms, circular navigation, round navigation, circular menu, tutorial" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
    </head>
	
	<body>

	<div class="container">
		<header>

		<h1 class="title">Admin Panel</h1>
		<h3 class="semi-title">Choose from your favorite Mechanics, Get The Best Service in Town and Spread The Name</h3><hr />	
		
      
		

		<?php 
            
            if (isset($_POST['submit'])) {
      $user_email = mysqli_real_escape_string($con, trim($_POST['email']));
      $user_password = mysqli_real_escape_string($con, trim($_POST['password']));
      $admin_code = mysqli_real_escape_string($con, trim($_POST['code']));
      $_SESSION['code'] = $admin_code;
       
      if (!empty($user_email) && !empty($user_password) && empty($admin_code)) {
        // Look up the username and password in the database
        $query = "SELECT * FROM users WHERE email = '$user_email' AND password = '$user_password'";
        $data = mysqli_query($con, $query);
 
        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars, and redirect to the home page
          $row = mysqli_fetch_array($data);
           $_SESSION['email'] = $row['email'];
           $_SESSION['id'] = $row['id'];
           $_SESSION['name'] = $row['name'];

           $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
           
           header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          echo '<script>alert("Sorry, you must enter a valid username and password to log in.")</script>';
        }
      }  
      else if(!empty($user_email) && !empty($user_password) && !empty($admin_code)){
        // Look up the username and password in the database
        $query = "SELECT * FROM admins WHERE email = '$user_email' AND password = '$user_password' 
        AND code = '$admin_code'";
        $data = mysqli_query($con, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars, and redirect to the home page
          $row = mysqli_fetch_array($data);
           
          $_SESSION['email'] = $row['email'];
          $_SESSION['id'] = $row['id'];
          $_SESSION['name'] = $row['name'];

          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin/index.php';
           
          header('Location: ' . $home_url);
        }
        else{
          // The username/password are incorrect so set an error message
          echo '<script>alert("Sorry, you must enter a valid email, password and code to log in.")</script>';
        }
      }      
      else {
        // The username/password weren't entered so set an error message
        echo '<div class="prompterror">Sorry, you must enter your email and password to log in.</div>';
      }
    }
?>

<div class="container">
    <div class="signin">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
        <legend>Sign In</legend>
        <label for="name">Email:</label>
        <input type="email" name="email" placeholder="E-mail" value="<?php if (!empty($user_email)) echo $user_email; ?>" required><br />
        <label for="name">Password:</label>
        <input type="password" name="password" placeholder="Password" required><br />
        <label for="name">Admin Code (For Admins Only):</label>
        <input type="text" name="code" placeholder="Admin Code"><br />
        </fieldset>
        <input type="submit" name="submit" value="Log in">
        
        <p>Don't Have an Account? <a href="signup.php">Register here.</a>
        </form>
    </div>
    </div>

<?php ?>        
				
</header>
			
</div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
	</body>
</html>