<!DOCTYPE html>
<html lang="en">
  <head>
		<title>Augmented Reality in Browser</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'>

		<link rel="stylesheet" type="text/css" href="css/slicknav.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">


		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
	
		<script src="jquery-3.0.0.js"></script>
		
		<!-- Script of Eddystone scan to search frequency -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no,
		shrink-to-fit=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
		<!--
		<style>
		@import 'ui/css/evothings-app.css'; 
		</style>-->

<style>
html {
  background-color: rgba(0,0,0,0.2);
  font-family: "Tenor Sans", sans-serif;
}

body {
  font-family: sans-serif;
  background-color: transparent;
}
table {
  
  background:#5D92BA;/*#005F7F */ /* For Safari 5.1 to 6.0 */
 
}
td{
  
}
.option{
  color:black;
}

.theme-dropdown .dropdown-menu {
  position: static;
  display: block;
  margin-bottom: 20px;
}

.theme-showcase > p > .btn {
  margin: 5px 0;
}

.theme-showcase .navbar .container {
  width: auto;
}


.headtd{
  background:#005F7F;


}

#map_canvas {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 50px;
  left: 0px;
  

  /* Display Google Map as a gray scale*/
  /*filter: gray; /* IE6-9 */
  /*-webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
  /* -moz-filter: grayscale(100%);
  -ms-filter: grayscale(100%);
  -o-filter: grayscale(100%);
  filter: grayscale(100%);  */
}
#listing {
  position: absolute;
  width: 600px;
  height: 360px;
  overflow: auto;
  left: 800px;
  top: 500px;
  cursor: pointer;
}
#controls {
  width: 200px;
  position: absolute;
  top: 500px;
  left: 400px;
  height: 60px;
  padding: 5px;
  font-size: 12px;
}
.placeIcon {
  width: 16px;
  height: 16px;
  margin: 2px;
  top:20;
}
#resultsTable {
  font-size: 10px;
  border-collapse: collapse;
}
#locationField {
  width: 400px;
  height: 25px;
  top: 20px;
  left: 0px;
  position: absolute;
}
#autocomplete {
  width: 400px;
}
div#info { width:100%; position:absolute; overflow:hidden; text-align:center; top:0;
    left:0; }
.table{
  color:white;

}
.selector{
  color:black;
}
</style>


<script>
//var x = document.getElementById("demo");
var placelatitude;
var placelongitude;
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        // x.innerHTML = "Geolocation is not supported by this browser.";
        // window.alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    // x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
    // window.alert("Latitude: " + position.coords.latitude + "   Longitude: " + position.coords.longitude);
    placelatitude = position.coords.latitude;
    placelongitude = position.coords.longitude;
}
</script>


	</head>
   
<body onload="getLocation()">
  <div class="container">    
    <div class="col-md5">    
        <h1 class="login-heading">
          <strong>Welcome.</strong> Please login.
        </h1>
    </div>
  </div>


  <div class="container">
    <div class="row"> 
        <div class ="col-md-12">
          <table class="table" id="tableplace">
            <tr>

              <h2><strong>List of places</strong></h2>
            </tr>
            <tr>
              <td class="headtd"> 
                
                   <STRONG> Place name </STRONG>
              </td>
              <td class="headtd">
              
                  <strong>  Place location </strong>
              
             </td>
             <td class="headtd">
              
                  <strong>  Place File </strong>
              
             </td>
            </tr>
            <?php 
              $servername = "localhost";
              $username = "root";
              $password = "root";
              $dbname = "edvisardb";
              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);

            
              

              $sql = "SELECT * FROM place;";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["place_name"] . "</td><td>".$row["place_location"]."</td><td>" . $row['url'] ."</td>";
                  }
              } else 
                echo "0 results";







            ?>
          </table>
        </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-md-12">
                  <form id="placeform" method="get" action="">
                    <table class="table">
                      <tr>
                        <td> 
                              Place name :<input type="text" id="placename" name ="placename" class="input-txt">
                        </td>   
                        <td>
                              Place location :<input type="text" id="placelocation" name ="location" class="input-txt">
                       </td>
                       <td>
                    <div>
 
                                <label for="fileToUpload">Take or select photo(s)</label><br />
                           
                                <input type="file" name="fileToUpload" id="fileToUpload" onchange="fileSelected();" accept="video/mp4,video/x-m4v,video/avi,image/*" capture="camera" />
                           
                              </div>
                           
                              <div id="details"></div>                  
                              <div id="progress"></div>
                   </td>
                      </tr>
                    </table>
        </div>
    </div>
      <div class="row">
        <div class="col-md-2">  
          <input type="submit" class="btn btn-lg btn-success" id="button1" value="Add Place"> 
        </div>
        <div class="col-md-3">
          <input type="submit" class="btn btn-lg btn-danger" id="delplace" value="Delete" ></button>
          <select id="sel_delete" class="option" name="delete_place">
            <option value="NULL">Select Place</option>
             <?php
              $sql = "SELECT place_name FROM place;";
               $result = $conn->query($sql);
              if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
               echo "<option value='".$row['place_name']."' class='selector' >" .
               $row['place_name']." </option>";
                   }
               } else 
               echo "0 results";
             ?>
          </select>
        </div>
         </form>
      </div>
    </div>

  <div class="container">
    <div class="row"> 
        <div class ="col-md-12">
          <table class="table" id="artable" >
            <tr>
              <h2><strong>List augmented reality</strong></h2>
                
            </tr>
            <tr>
              <td class="headtd"> 
                   <strong> Place </strong>
              </td>
              <td class="headtd">
                   <strong> AR name </strong>
              </td>
              <td class="headtd">
                    <strong> Position X </strong>
              </td>
              <td class="headtd">
                   <strong> Position Y </strong>
              </td>
              <td class="headtd">
                   <strong> Position Z </strong>
              </td>
              <td class="headtd">
                  <strong> File name</strong>
              </td>
              <td class="headtd">
                  <strong>Width</strong>
              </td>
              <td class="headtd">
                  <strong>Height</strong>
              </td>
              </tr>
           
              <?php 
                  
                

                $sql = "SELECT * FROM arobject,place WHERE ar_place_id = place_id;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                    while($row = $result->fetch_assoc()) {
                      echo "<tr><td>".$row["place_name"] . "</td><td>".$row["ar_name"]."</td> " . "</td><td>".$row["ar_x"]."</td>" . "</td><td>".$row["ar_y"]."</td>" . "</td><td>".$row["ar_z"]."</td><td>".$row["ar_file"]."</td>".
                      "<td>".$row['ar_width']."</td>"."<td>".$row['ar_height']."</td>"."</tr>";
                    }
                } else 
                  echo "0 results";
              ?>
              
              </table>
            </div>
          </div>
        </div>




        <div class="container">
          <div class="row">
            <div class=" col-md-12">
              <form id="form1" enctype="multipart/form-data" method="get">
                <table  class="table">
                  <tr>
                    <td> 
                          <select class="option" name="ar_placename" id="ar_pname">
                            <option value="NULL">Select Place</option>
                            <?php
                              $sql = "SELECT place_name FROM place;";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                // output data of each row
                                  while($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['place_name']."' class='selector' >" .
                                    $row['place_name']." </option>";
                                  }
                              } else 
                                echo "0 results";


                            ?>
                          </select>
                          
                    </td>
                    <td>
                    
                          Ar name :<input class="input-txt" type="text" id ="ar_name">
                    
                   </td>
                   <td>
                    
                          X :<input class="input-txt" type="text" id ="ar_x">
                    
                   </td>
                   <td>
                    
                          Y :<input class="input-txt" type="text" id ="ar_y">
                    
                   </td>
                   <td>
                    
                          Z :<input class="input-txt" type="text" id ="ar_z">
                    
                   </td>
                   <td>
                    
                          Width :<input class="input-txt" type="text" id ="ar_width">
                    
                   </td>
                   <td>
                    
                          Height :<input class="input-txt" type="text" id ="ar_height">
                    
                   </td>
                   <td>
                    <div>
 
                                <label for="fileToUpload1">Take or select photo(s)</label><br />
                           
                                <input type="file" name="fileToUpload1" id="fileToUpload1" onchange="fileSelected1();" accept="video/mp4,video/x-m4v,video/avi,image/*" capture="camera" />
                           
                              </div>
                           
                              <div id="details1"></div>                  
                              <div id="progress1"></div>
                   </td>

                  </tr>

                </table>
                  <div class="row">
                    <div class="col-md-2"> 
                        <input class="btn btn-lg btn-success" id="add_ar" type="submit" value="Add AR"></button>
                    </div>
                    <input type="submit" class="btn btn-lg btn-danger" id="delar" value="Delete" ></button>
                      <select id="ar_delete" class="option">
                      <option value="NULL">Select AR</option>
                               <?php
                                  $sql = "SELECT * FROM arobject;";
                                  $result = $conn->query($sql);
                                 if ($result->num_rows > 0) {
                                  // output data of each row
                                 while($row = $result->fetch_assoc()) {
                                   echo "<option value='".$row['ar_name']."' class='selector' >" .
                                 $row['ar_name']." </option>";
                                     }
                                 } else 
                                 echo "0 results";
                              ?>
                    </select>
              </form>
              </div>
            </div>
          </div>
        </div>

        <div>
          <br></br>
           <p style="text-align:center;"> <img src="position1.jpeg"  alt="Position_xyz" align="middle" > </p>
           <p></p><p></p><p></p><p></p><p></p><p></p><p></p>
           <p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
           <p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
           <br></br>
        </div>




<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">
      var gfilename;

      function fileSelected() {
        var count = document.getElementById('fileToUpload').files.length;
              document.getElementById('details').innerHTML = "";
              for (var index = 0; index < count; index ++)
              {
                     var file = document.getElementById('fileToUpload').files[index];
                     var fileSize = 0;
                     if (file.size > 1024 * 1024)
                            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB'; 
                     else
                            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
                     document.getElementById('details').innerHTML += 'Name: ' + file.name + '<br>Size: ' + fileSize + '<br>Type: ' + file.type;
                     document.getElementById('details').innerHTML += '<p>';
                     gfilename = file.name;
              }
      }
 
      function uploadFile() {
        var fd = new FormData();
              var count = document.getElementById('fileToUpload').files.length;
              for (var index = 0; index < count; index ++)
              {
                     var file = document.getElementById('fileToUpload').files[index];
                     fd.append('myFile', file);
              }
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress", uploadProgress, false);
        xhr.addEventListener("load", uploadComplete, false);
        xhr.addEventListener("error", uploadFailed, false);
        xhr.addEventListener("abort", uploadCanceled, false);
        xhr.open("POST", "savetofile.php");
 
        xhr.send(fd);
 
      }
 
      function uploadProgress(evt) {
 
        if (evt.lengthComputable) {
 
          var percentComplete = Math.round(evt.loaded * 100 / evt.total);
 
          document.getElementById('progress').innerHTML = percentComplete.toString() + '%';
 
        }
 
        else {
 
          document.getElementById('progress').innerHTML = 'unable to compute';
 
        }
 
      }
 
      function uploadComplete(evt) {
 
        /* This event is raised when the server send back a response */
 
        //alert('upload complete');
 
      }
 
      function uploadFailed(evt) {
 
        //alert("There was an error attempting to upload the file.");
 
      }
 
      function uploadCanceled(evt) {
 
        //alert("The upload has been canceled by the user or the browser dropped the connection.");
 
      }
      function addcompleted(){

      }
    </script>



    <script type="text/javascript">
      var gfilename1;

      function fileSelected1() {
        var count = document.getElementById('fileToUpload1').files.length;
              document.getElementById('details1').innerHTML = "";
              for (var index = 0; index < count; index ++)
              {
                     var file = document.getElementById('fileToUpload1').files[index];
                     var fileSize = 0;
                     if (file.size > 1024 * 1024)
                            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB'; 
                     else
                            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
                     document.getElementById('details1').innerHTML += 'Name: ' + file.name + '<br>Size: ' + fileSize + '<br>Type: ' + file.type;
                     document.getElementById('details1').innerHTML += '<p>';
                     gfilename1 = file.name;
              }
      }
 
      function uploadFile1() {
        var fd = new FormData();
              var count = document.getElementById('fileToUpload1').files.length;
              for (var index = 0; index < count; index ++)
              {
                     var file = document.getElementById('fileToUpload1').files[index];
                     fd.append('myFile', file);
              }
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress", uploadProgress, false);
        xhr.addEventListener("load", uploadComplete, false);
        xhr.addEventListener("error", uploadFailed, false);
        xhr.addEventListener("abort", uploadCanceled, false);
        xhr.open("POST", "savetofile.php");
 
        xhr.send(fd);
 
      }
 
      function uploadProgress(evt) {
 
        if (evt.lengthComputable) {
 
          var percentComplete = Math.round(evt.loaded * 100 / evt.total);
 
          document.getElementById('progress1').innerHTML = percentComplete.toString() + '%';
 
        }
 
        else {
 
          document.getElementById('progress1').innerHTML = 'unable to compute';
 
        }
 
      }
 
      function uploadComplete(evt) {
 
        /* This event is raised when the server send back a response */
 
        //alert('upload complete');
 
      }
 
      function uploadFailed(evt) {
 
        //alert("There was an error attempting to upload the file.");
 
      }
 
      function uploadCanceled(evt) {
 
        //alert("The upload has been canceled by the user or the browser dropped the connection.");
 
      }
      function addcompleted(){

      }
    </script>














<script type="text/javascript">
  $(function() {












    $("#button1").click(function() {
      var textcontent = $('#placename').val();
      var textlocation = $('#placelocation').val();
        $.ajax({
          dataType:"json",
          type:"get",
          url:'add_place.php',
          data:{'placename' : textcontent,'location' : textlocation, 'placefile' : gfilename ,'latitude' : placelatitude , 'longitude' : placelongitude},
          cache: true,
          success: function(html){
            $("#tableplace").html(html.table);
            $("#sel_delete").html(html.option);
            
          }
        });
    });

     $("#delplace").click(function() {
      var selectplace = $('#sel_delete').val();
        $.ajax({
          dataType:"json",
          type:"get",
          url:'delete_place.php',
          data:{'delete_place' : selectplace},
          cache: true,
          success: function(html){
            $("#tableplace").html(html.table);
            $(".option").html(html.option);
             
          }
        });
    });

     $("#add_ar").click(function(){
      var name = $('#ar_name').val();
      var x = $('#ar_x').val();
      var y = $('#ar_y').val();
      var z = $('#ar_z').val();
      var pname = $('#ar_pname').val();
      var width = $('#ar_width').val();
      var height = $('#ar_height').val();
      uploadFile();
      $.ajax({
        dataType:"json",
        type:"get",
        url:'add_ar.php',
        data:{'ar_name': name,'ar_x': x,'ar_y' : y,'ar_z' : z,'ar_placename': pname,'ar_file': gfilename1,'ar_width': width,'ar_height': height },
        cache: true,
        success: function(html){
          
        }
      });
     });

     $("#ar_delete").click(function(){
      var ardelete = $('#ar_delete').val();
      uploadFile();
      $.ajax({
        dataType:"json",
        type:"get",
        url:'delete_ar.php',
        data:{'ar_name': ardelete},
        cache: true,
        success: function(html){

        }
      });
     });


   });

</script>

	</body>
	
</html>
