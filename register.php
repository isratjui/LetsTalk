<?php

include('includes/config.php');




?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register With Us</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body>

  <?php

 
if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
	$username = mysqli_real_escape_string($con, trim($_POST['username']));
    $name = mysqli_real_escape_string($con, trim($_POST['name']));
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $password = mysqli_real_escape_string($con, trim($_POST['password']));
  $query = "SELECT * FROM users WHERE email = '$email'";
     $data = mysqli_query($con, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query1 = "insert into users(name, email, password) values ('$name','$email','$password')";
        mysqli_query($con, $query1); 
        // Confirm success with the user
        echo '<div class="promptsuccess">Your new account has been successfully created. You\'re now ready to <a href="index.php">log in</a>.</div>';
        }else{
        // An account already exists for this username, so display an error message
        echo '<div class="prompterror">An account already exists for this user email. Please use a different address.<br />Already have an account? <a href="login.php">Login Here</a></div>';
        $email = "";
      }
    }
   
     
 
  mysqli_close($con);
?>
  
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">La La Land</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="register.html">Create An Account</a></li>
            <li><a href="create.html">Create Topic</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left">Create An Account</h1>
						<h4 class="pull-right">Lets be happy</h4>
						<div class="clearfix"></div>
						<hr>
						<form role="form" enctype="multipart/form-data" method="post" action="register.php">
							<div class="form-group">
							
							<input type="text" id="name" name="name" placeholder="Enter Your Name" value="<?php if (!empty($name)) echo $name; ?>" /><br />
							
								<label>Name*</label> <input type="text" class="form-control"
							name="name" placeholder="Enter Your Name" value="<?php if (!empty($name)) echo $name; ?>">
							</div>
							<div class="form-group">
							<label>Email Address*</label> <input type="email" class="form-control"
							name="email" placeholder="Enter Your Email Address" value="<?php if (!empty($email)) echo $email; ?>">
							</div>
						<div class="form-group">
					<label>Choose Username*</label> <input type="text"
							class="form-control" name="username" placeholder="Create A Username" value="<?php if (!empty($username)) echo $username; ?>">
						</div>
					<div class="form-group">
					<label>Password*</label> <input type="password" class="form-control"
				name="password" placeholder="Enter A Password" value="<?php if (!empty($password)) echo $password; ?>">
				</div>
				<div class="form-group">
		<label>Confirm Password*</label> <input type="password"
			class="form-control" name="password2"
			placeholder="Enter Password Again" value="<?php if (!empty($password)) echo $password; ?>">
			</div>
				<div class="form-group">
					<label>Upload Avatar</label>
				<input type="file" name="avatar">
				<p class="help-block"></p>
					</div>
					<div class="form-group">
					<label>About Me</label>
					<textarea id="about" rows="6" cols="80" class="form-control"
					name="about" placeholder="Tell us about yourself (Optional)"></textarea>
			</div>
		<!	<input name="register" type="submit" class="btn btn-default" value="Register" /> >
			<input type="submit" value="Sign Up" name="submit" />
</form>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div id="sidebar">
					<div class="block">
						<h3>Login Form</h3>
						<form role="form">
						<div class="form-group">
							<label>Username</label>
							<input name="username" type="text" class="form-control" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input name="password" type="password" class="form-control" placeholder="Enter Password">
						</div>			
						<button name="do_login" type="submit" class="btn btn-primary">Login</button> <a  class="btn btn-default" href="register.html"> Create Account</a>
					</form>
					</div>
					
					<div class="block">
					<h3>Categories</h3>
					<div class="list-group">
						<a href="#" class="list-group-item active">All Topics <span class="badge pull-right">14</span></a> 
						<a href="#" class="list-group-item">Beauty<span class="badge pull-right">4</span></a>
						<a href="#" class="list-group-item">Health<span class="badge pull-right">9</span></a>
						<a href="#" class="list-group-item">Travel<span class="badge pull-right">12</span></a>
						<a href="#" class="list-group-item">Life<span class="badge pull-right">7</span></a>
						<a href="#" class="list-group-item">Relationship<span class="badge pull-right">3</span></a>
					</div>
				</div>	
				</div>
			</div>
		</div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
