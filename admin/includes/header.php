<?php include 'config.php'; ?>
<?php include 'Database.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/customadmin.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          
		  <a class="blog-nav-item" href="add_category.php">Add Category</a>

<a class="blog-nav-item" href="adminlogout.php" style="color:red;">Log Out</a>		  
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
		<h2>Admin Area</h2>
      </div>
      <div class="row">
        <div class="col-sm-12 blog-main">
		<?php if(isset($_GET['msg'])) : ?>
			<div class="alert alert-success"><?php echo htmlentities($_GET['msg']); ?></div>
		<?php endif; ?>