<?php
session_start();
if(!$_SESSION['user_username']){
header('location:login.php?error=You must Log In to view this page...!');
}
 
require_once('config.php');
 
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Instructor's Page</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
Welcome <font color='red' size="3">
<?php echo $_SESSION['user_username']; ?>
</font> 
<center><a href="index.php">Insert New Record</a></center>
<center>
<font color="green" size="4"><?php echo @$_GET['deleted']; ?></font>
</center>
Sort By: <a href="admin.php?sortby=name">Name</a>&nbsp;&nbsp;<a href="admin.php?sortby=firstname">First Name</a>&nbsp;&nbsp;<a href="admin.php?sortby=id">ID</a>&nbsp;&nbsp;<a href="admin.php?sortby=email">E-mail</a>&nbsp;&nbsp;<a href="admin.php?sortby=sec">Section</a>
 
 
<table align="center" width="1000" border="4">
<tr>
<td colspan='20' align='center' bgcolor="lime">
<h1>CSE391 - Student List</h1></td>
</tr>
 
<tr align="center">
<th>Fullname</th>
<th>Firstname</th>
<th>Student ID</th>
<th>E-mail</th>
<th>Section</th>
<th>Delete</th>
</tr>
 
<tr>
 
<?php
 
 
 
$sql = mysqli_query($dbc,"SELECT * FROM student_info ORDER BY name");
 
// If the user chooses to sort the produts in a different way, then an HTML link will set a PHP variable into this page
// We will check for that variable and change the SQL query to sort the student_info in a different way
if (isset($_GET['sortby'])) {
  // Capture that in a variable by that name
  $sortby = $_GET['sortby'];
  // Now to change the SQL query based on the sorting the user chose (price high to low, low to high, alphabetical and latest first)
  if ($sortby == 'name') {
    $sql = mysqli_query($dbc,"SELECT * FROM student_info ORDER BY name");
  }
  elseif ($sortby == 'firstname') {
    $sql = mysqli_query($dbc,"SELECT * FROM student_info ORDER BY first_name");
  }
  elseif ($sortby == 'id') {
    $sql = mysqli_query($dbc,"SELECT * FROM student_info ORDER BY sid ASC");
  }
  elseif ($sortby == 'email') {
    $sql = mysqli_query($dbc,"SELECT * FROM student_info ORDER BY email");
  }
  elseif ($sortby == 'sec') {
    $sql = mysqli_query($dbc,"SELECT * FROM student_info ORDER BY sec ASC");
  }
}
 
while($row = mysqli_fetch_array($sql,MYSQLI_BOTH)){
  $s_name = $row['name'];
  $s_fname = $row['first_name'];
  $s_id = $row['sid'];
  $s_email = $row['email'];
  $s_sec = $row['sec'];
 
?>
<td><?php echo $s_name; ?></td> 
<td><?php echo $s_fname; ?></td>  
<td><?php echo $s_id; ?></td> 
<td><?php echo $s_email; ?></td>  
<td><?php echo $s_sec; ?></td>  
<td><a href='delete.php?del=<?php echo $s_id; ?>'>Delete</a></td>
</tr>
 
 
<?php } ?>
 
</table><br /><br /><br /><br />
<center><form action="admin.php" method="GET">
Search a Record: <input type="text" name="search">
<input type="submit" name="submit" value="Find Now"> 
</form></center><br /><br />
<?php
 
if(isset($_GET['search'])){
  $search_record = $_GET['search'];
 
  $query2 = "SELECT * FROM student_info WHERE first_name='$search_record' OR sid='$search_record' OR email='$search_record' OR sec='$search_record'";
  $result2 = mysqli_query($dbc,$query2);
 
  while($row2 = mysqli_fetch_assoc($result2)){
  $rname = $row2['name'];
  $rfirstname = $row2['first_name'];
  $rsid = $row2['sid'];
  $remail = $row2['email'];
  $rsec = $row2['sec'];
  ?>
<table width="800" bgcolor="yellow" align="center" border="1">
<tr align="center">
<td><?php echo $rname; ?></td>
<td><?php echo $rfirstname; ?></td>
<td><?php echo $rsid; ?></td>
<td><?php echo $remail; ?></td>
<td><?php echo $rsec; ?></td>
</tr>
</table>
<?php
 
  } 
}
 
 
?>
<br /><br />
<a href="logout.php">Log Out</a>
</body>
</html>