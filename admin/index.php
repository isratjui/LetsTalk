<?php include 'includes/header.php'; ?>
<?php

//Create DB Object
$db = new Database;
//Create Query
$query = "SELECT * FROM categories ORDER BY name DESC";
//Run Query
$categories = $db->select($query);

$query = "SELECT * FROM users";
//Run Query
$posts = $db->select($query);

$query = "SELECT * FROM topics";
//Run Query
$topics = $db->select($query);


?>

<table class="table table-striped">
	<tr>
		<th>Category ID#</th>
		<th>Category Name</th>
	</tr>
	<?php while($row = $categories->fetch_assoc()) : ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>			
			</tr>
		<?php endwhile; ?>
</table>


<table class="table table-striped">
	<tr>
		<th>User ID#</th>
		<th>Name</th>
		<th>Email</th>
		<th>Username</th>
		<th>About</th>
	</tr>
		<?php while($row = $posts->fetch_assoc()) : ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['about']; ?></td>
			</tr>
		<?php endwhile; ?>
</table>






<table class="table table-striped">
	<tr>
		<th>ID#</th>
		<th>Title</th>
		<th>Body</th>
		
	</tr>
		<?php while($row = $topics->fetch_assoc()) : ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><a href="topics.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
				<td><?php echo $row['body']; ?></td>
			</tr>
		<?php endwhile; ?>
</table>






<?php

$query = "SELECT * FROM replies";
//Run Query
$reply= $db->select($query);

?>

<table class="table table-striped">
	<tr>
		<th>Reply ID#</th>
		<th>Body</th>
	</tr>
	<?php while($row = $reply->fetch_assoc()) : ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><a href="replies.php?id=<?php echo $row['id']; ?>"><?php echo $row['body']; ?></a></td>			
			</tr>
		<?php endwhile; ?>
</table>

	     