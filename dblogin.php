<html>
<body>

<script type="text/javascript">   

    function Redirect() 
    {  
        window.location="input.php"; 
    } 
    
    //document.write("You will be redirected to a new page in 5 seconds"); 
    //setTimeout('Redirect()',0);   

</script>



<?php
$user = 'root';
$password = 'root';
$db = 'edvisardb';
$host = 'localhost';
$port = 3306;

// Create connection
$conn = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br/>";


// Create database
$sql = "CREATE DATABASE edvisardb";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br/><br/>";
} else {
    echo "<br/>Error creating database: " . $conn->error . "<br/><br/>";
}

/*  Retrival data from table
$sql = "SELECT cus_id, cus_name, cus_family FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<br> id: ". $row["cus_id"]. " - Name: ". $row["cus_name"]. " " . $row["cus_family"] . "<br>";
     }
} else {
     echo "0 results<br><br>";
}

*/



// Get the Log-in credentials from user
$email = $_GET['login-email'];
$password = $_GET['login-pw'];


// Check the users input against the DB.
$query = "SELECT * FROM customer WHERE cus_email = '$email' AND cus_password = '$password'";


$sql = "SELECT cus_email, cus_password FROM customer  WHERE cus_email = '$email' AND cus_password = '$password'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo "Email: " . $row["cus_email"]. " - Password: " . $row["cus_password"]. " " . "<br>";
    }

    echo '<script> Redirect(); </script>';
} else {
    echo "Your username or password is incorrect!";
}





//$sql = "INSERT INTO customer (cus_id, cus_name,cus_family, cus_phone, cus_email, cus_gender, cus_bd, cus_age, customercol, cus_fb_id, cus_location) VALUES ('10', 'Phuripat', 'Akarasiriwong', '0993255909', 'civvystreet1994@gmail.com', 'male', '1994-04-17', '22', '', '', 'Nonthaburi, Thailand')";


//$sql = "INSERT INTO customer (cus_id, cus_family, cus_gender, cus_location) VALUES (" . $id . ", '" . $family . "', '" . $gender . "', '" . $location . "');";


//$sql = "INSERT INTO customer (cus_name, cus_family, cus_gender, cus_bd, cus_age, cus_phone, cus_email, cus_location, cus_fb_id, cus_username, cus_password) VALUES ('" . $name . "', '" . $family . "', '" . $gender . "', '" . $birthday . "', " . $age . ", '" . $phone . "', '" . $email . "', '" . $location . "', " . $fbid . ", '" . $username . "', '" . $password . "');";


//if ($conn->query($sql) === TRUE) {
  //  echo "New record created successfully<br/><br/>";
//} else {
  //  echo "Error: " . $sql . "<br>" . $conn->error . "<br/><br><br>";
//}



//Capture data array from AJAX and process it...
    function js2php_proc() {
        if(!empty($_POST)){
            //start an output var
            $output = array();
        
            //do any processing here.
            //$output['message'] = "Array successfully sent!";
            $output['message'] = $_POST['jsarray'];
        
            //send the output back to the client
            echo json_encode($output);
        }
    }




$conn->close();


?>

<br/><br/>
Your Email address is: <?php echo $_GET["login-email"]; ?><br>
Your Password is: <?php echo $_GET["login-pw"]; ?><br>


</body>
</html>