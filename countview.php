<?php
session_start();

			  $servername = "localhost";
              $username = "root";
              $password = "root";
              $dbname = "edvisardb";
              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              $pagename = $_SESSION['placename'];
              $number = 0;





 	  $sql = "SELECT visited FROM place WHERE place_name = '".$pagename."';";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
            $number = $row['visited'];
          }
      } else 
        echo "0 results";
// Has visitor been counted in this session?
// If not, increase counter value by one
  if(!isset($_SESSION['visited'])){
  $_SESSION['visited'] = "TRUE";
  $number++;
  $update = "UPDATE place SET visited = ".$number.
  	" WHERE place_name = '".$pagename."';";
  	mysqli_query($conn, $update);
  }
header('Location: testproject.php');
?>