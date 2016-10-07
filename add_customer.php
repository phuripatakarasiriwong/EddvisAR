<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "edvisardb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $cus_name = $_REQUEST['cus_name'];
    $cus_family = $_REQUEST['cus_family'];
    $cus_gender = $_REQUEST['cus_gender'];
    $age = $_REQUEST['age'];
    $email = $_REQUEST['email'];
    $location = $_REQUEST['location'];
    $fbid = $_REQUEST['facebook_id'];
 
      $insert = "INSERT INTO customer(cus_name,cus_family,cus_gender,cus_age,cus_email,cus_location,cus_fb_id)" .
      "VALUES ('".$cus_name ."','".$cus_family."','".$cus_gender."',".$age.",'".$email. "','" .$location."','". $fbid ."');";
      mysqli_query($conn, $insert);
      
      
  ?>    
