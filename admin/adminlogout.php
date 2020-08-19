<?php
  // If the user is logged in, delete the session vars to log them out
  session_start();
  
  if (isset($_SESSION['id'])) {
    // Delete the session vars by clearing the $_SESSION array
    $_SESSION = array();

    // Destroy the session
    session_destroy();
  }

  // Redirect to the home page
  $home_url = '../index.php';
  header('Location: ' . $home_url);
?>