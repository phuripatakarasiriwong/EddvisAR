<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "edvisardb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

 

      $sql = "SELECT cus_name FROM customer;";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
            
          }
      } else 
        echo "0 results";
      $place_id = NULL;
        $place_name = $_GET['placename'];
       $place_location = $_GET['location'];
       $place_file = $_REQUEST['placefile'];
       // $place_location = 'location';
        
      $place_owner = NULL;
      $latitute = $_REQUEST['latitude'];
      $longitude = $_REQUEST['longitude'];
       //"VALUES (".$place_id.",'".$place_name."','".$place_location."','".$place_owner."',".$latitute. "," .$longtitude.");";

      $insert = "INSERT INTO place(place_id,place_name,place_location,place_owner,latitute,longitude,url)" .
      "VALUES (NULL,'".$place_name."','".$place_location."','".$place_owner."',".$latitute. "," .$longitude.",'". $place_file ."');";
      

      mysqli_query($conn, $insert);
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
                    $return_data['table'] += "<tr><td>".$row["place_name"] . "</td><td>".$row["place_location"]."</td><td>" . $row['url'] ."</td>";
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
    
    $myfile = fopen("./arpage/ar_".$place_name.".php", "w") or die("Unable to open file!");
    $txt = "<?php \n".
              "session_start();\n".
              '$_SESSION'."['placename'] = '".$place_name."';\n".
              "header('Location: ../countview.php');\n".
            "?>";
    fwrite($myfile, $txt);
    fclose($myfile);
  ?>    
