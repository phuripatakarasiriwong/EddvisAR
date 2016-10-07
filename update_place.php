<?php
 	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "edvisardb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT place_name FROM place;";
               $result = $conn->query($sql);
              if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
               echo "<option value='".$row['place_name']."' class='selector' >" .
               $row['place_name']." </option>";
                   }


	echo "<select id='sel_delete' class='selector' name='delete_place'>".
            "<option value='NULL'>Select Place</option>";
             
    $sql = "SELECT place_name FROM place;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {
    	echo "<option value='".$row['place_name']."' class='selector' >" .
          	$row['place_name']." </option>";
    	}
    } else echo "0 results";
             
     echo    "</select>";



?>