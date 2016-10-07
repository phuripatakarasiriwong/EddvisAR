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
    

    $ar_id = NULL;
    $ar_place = $_REQUEST['ar_placename'];
    $ar_name = $_REQUEST['ar_name'];
    $ar_x = $_REQUEST['ar_x'];
    $ar_y = $_REQUEST['ar_y'];
    $ar_z = $_REQUEST['ar_z'];
    // $ar_z = 0;
    $ar_file = $_REQUEST['ar_file'];
    $ar_width = $_REQUEST['ar_width'];
    $ar_height = $_REQUEST['ar_height'];
    $ar_place_id = NULL;
    // "VALUES (".$place_id.",'".$place_name."','".$place_location."','".$place_owner."',".$latitute. "," .$longtitude.");";

    $getid = "SELECT place_id FROM place WHERE place_name = '". $ar_place ."'";
    $result = $conn->query($getid);
    if ($result->num_rows > 0) {
                  // output data of each row
                    while($row = $result->fetch_assoc()) {
                      $ar_place_id  = $row['place_id'];
                    }
                } else 
                  echo "0 results";
    

   $insert = "INSERT INTO arobject(ar_id,ar_name,ar_x,ar_y,ar_z,ar_place_id,ar_file,ar_width,ar_height)" .
    "VALUES (NULL,'".$ar_name."',".$ar_x.",".$ar_y.",".$ar_z. ",".$ar_place_id.",'" .$ar_file. "',".$ar_width. ",".$ar_height.");";
    

 if (mysqli_query($conn, $insert)) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

    mysqli_close($conn);        
?>    



