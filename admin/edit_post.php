<?php include 'includes/header.php'; ?>
<?php
	$id = $_GET['id'];

	//Create DB Object
	$db = new Database();
	
	//Create Query
	$query = "SELECT * FROM users WHERE id = ".$id;
	//Run Query
	$post = $db->select($query)->fetch_assoc();
	
	//Create Query
	$query = "SELECT * FROM categories";
	//Run Query
	$categories = $db->select($query);
?>

<?php
	if(isset($_POST['submit'])){
		//Assign Vars
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$username = mysqli_real_escape_string($db->link, $_POST['username']);
		$about = mysqli_real_escape_string($db->link, $_POST['about']);
		
		//Simple Validation
		if($name == '' || $email == '' || $username == ''){
			//Set Error
			$error = 'Please fill out all required fields';
		} else {
			$query = "UPDATE users 
					SET 
					name = '$name',
					email = '$email',
					username = '$username',
					about = '$about',
					
					WHERE id =".$id;
			
			$update_row = $db->update($query);
		}
	}
?>

<?php
	if(isset($_POST['delete'])){
		$query = "DELETE FROM users WHERE id = ".$id;
		
		$delete_row = $db->delete($query);
	}
?>
<form role="form" method="post" action="edit_post.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label>Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Name" value="<?php echo $post['name']; ?>">
  </div>
  <div class="form-group">
    <label>Email</label>
    <textarea name="email" class="form-control" placeholder="Enter your Email address">
		<?php echo $post['email']; ?>
	</textarea>
  </div>
  
  <div class="form-group">
    <label>Username</label>
    <input name="username" type="text" class="form-control" placeholder="Enter username" value="<?php echo $post['username']; ?>">
  </div>
  <div class="form-group">
    <label>About</label>
    <input name="about" type="text" class="form-control" placeholder="Enter About" value="<?php echo $post['about']; ?>">
  </div>
  <div>
	<input name="submit" type="submit" class="btn btn-default" value="Submit" />
	<a href="index.php" class="btn btn-default">Cancel</a>
	<input name="delete" type="submit" class="btn btn-danger" value="Delete" />
	
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>