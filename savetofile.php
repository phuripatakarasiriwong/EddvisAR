<?php


  $user = 'root';
  $password = 'root';
  $db = 'inventory';
  $host = 'localhost';
  $port = 3306;

  $link = mysqli_init();
  $success = mysqli_real_connect(
     $link, 
     $host, 
     $user, 
     $password, 
     $db,
     $port
  );


if (isset($_FILES['myFile'])) {
    // Example:
    move_uploaded_file($_FILES['myFile']['tmp_name'], "" . $_FILES['myFile']['name']);
    echo 'successful';
}
?>