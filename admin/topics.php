<?php include 'includes/header.php'; ?>
<?php
	$id = $_GET['id'];

	//Create DB Object
	$db = new Database();
	
	//Create Query
	$query = "SELECT * FROM topics WHERE id = ".$id;
	//Run Query
	$topic = $db->select($query)->fetch_assoc();
	
	//Create Query
	$query = "SELECT * FROM categories";
	//Run Query
	$categories = $db->select($query);
?>

<?php
	if(isset($_POST['submit'])){
		//Assign Vars
		$title = mysqli_real_escape_string($db->link, $_POST['title']);
		$body = mysqli_real_escape_string($db->link, $_POST['body']);
		//Simple Validation
		if($body == '' || $title ==''){
			//Set Error
			$error = 'Please fill out all required fields';
		} else {
			$query = "UPDATE topics SET title = '$title', body = '$body' WHERE id =".$id;
			
			$update_row = $db->update($query);
		}
	}
?>

<?php
	if(isset($_POST['delete'])){
		$query = "DELETE FROM topics WHERE id = ".$id;
		
		$delete_row = $db->delete($query);
	}
?>
<form role="form" method="post" action="topics.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label>Topic Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $topic['title']; ?>">
	<label>Topic Body</label>
    <input name="body" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $topic['body']; ?>">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>
<?php include 'includes/footer.php'; ?>