<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "edvisardb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else echo "Connected successfully";
    
    $select_delete = $_REQUEST['delete_place'];
    
    // "VALUES (".$place_id.",'".$place_name."','".$place_location."','".$place_owner."',".$latitute. "," .$longtitude.");";

    $del = "DELETE FROM place WHERE place_name = '". $select_delete ."'";
    $result = $conn->query($del);

    $return_data['table'] =  "<table class='table' id='tableplace'>".
              "<tr>".
              "<td class='headtd'>".
                   "<STRONG> Place name </STRONG>".
              "</td>".
              "<td class='headtd'>".
                  "<strong>  Place location </strong>".
             "</td>".
            "</tr>";
              $sql = "SELECT place_name , place_location FROM place;";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $return_data['table'] += "<tr><td>".$row["place_name"] . "</td><td>".$row["place_location"]."</td>";
                  }
                 $return_data['table'] += "</table>";
              } else echo "0 results";

        $return_data['option'] =  "";
        $sql = "SELECT place_name FROM place;";
               $result = $conn->query($sql);
              if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
               $return_data['option'] += "<option value='".$row['place_name']."' class='selector' >" .
               $row['place_name']." </option>";
                   }
              } else echo "0 result"; 

      echo delete("/arpage/ar_".$select_delete.".php");


      


      mysqli_close($conn);
      echo json_encode($return_data);exit;
?>    









