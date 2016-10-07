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
    
    $ar_name = $_REQUEST['ar_name'];
    // "VALUES (".$place_id.",'".$place_name."','".$place_location."','".$place_owner."',".$latitute. "," .$longtitude.");";

    $getid = "DELETE FROM arobject WHERE ar_name = '". $ar_name ."'";
    $result = $conn->query($getid);

                
   mysqli_close($conn);
?>    
