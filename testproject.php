<!DOCTYPE html>
<html>
<head>
<title>EddvisAR - Augmented Reality in Web Browser Technology</title>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<meta charset="utf-8"/>
<script type="text/javascript" src="scripts/orientationChange.js"></script>

<!-- COMPASS -->

<script type="text/javascript" src="scripts/orientationChange.js"></script>

<script type="text/javascript" src="scripts/gl-matrix.min.js"></script>
<script type="text/javascript" src="scripts/fulltilt.min.js"></script>
<script type="text/javascript" src="scripts/compass.js"></script>

<!-- FEATURE DETECTION -->

<link rel="stylesheet" href="featuredetection/styles/panel.css">
<script src="featuredetection/modernizr.js"></script>
<script src="featuredetection/panel.js"></script>

<!-- DEVICEORIENTATION EMULATOR DETECTION + BOOTSTRAP -->
<script src="https://richtr.github.io/doe/doe.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script type="text/javascript" src="jquery.easyui.min.js"></script>
    <script>
      var GlobalTravel = 0;
      var GlobalTotalDis = 0;
      var StepToMetre = 1.5;
      //http://www.convertunits.com/from/step/to/meter

      var Globaldistance;


      var oldAcceleration = [0, 0, 0];
      var isChange = 0;
      var stepCount = 0;
      var scrollAmount = 30;



    </script>
<script>

window.addEventListener('load', function() {

  /* Pretty Print Feature Detection */
  //if(window.FeaturePanel) {
    //new FeaturePanel({
      //title: 'Marine Compass',
      //legend: 'A fully web standards compliant JavaScript 3D Compass application.',
      //link: 'https://github.com/richtr/Marine-Compass',
      //features: [
        //{name: 'deviceorientation', title: 'Device Orientation Events', link: 'http://caniuse.com/#feat=deviceorientation'},
        //{name: 'webgl', title: 'WebGL', link: 'http://caniuse.com/#feat=webgl'}
      //]
    //});
  //}
 /* Compass Web App */
  var canvasElement = document.getElementById('glCanvas');
  canvasElement.setAttribute('width', window.innerWidth);
  canvasElement.setAttribute('height', window.innerHeight);

  var headingElement = document.getElementById('headingReading');

  // var headingElement = document.getElementById('headingReading');
  // headingElement + " Direction: " + compassdirection
  new Compass( canvasElement, headingElement);

}, true);

</script>
<script type="text/javascript">





</script>

<style type="text/css">
* {
  margin: 0;
  padding: 0;
}
#container {
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  overflow: hidden;
}

  #glCanvas {
    position: absolute;
    top: 450px;
    left: 100px;
    width: 1px;
    height: 1px;

  }
  .output_err {
    display: block;
    background-color: #fff;
    color: #CC0000;
    font-weight: bold;
    border: 1px solid #000;
    margin: 20px 10px;
    padding: 20px;
  }
  .heading {
    display: block;
    text-align: center;
    padding: 10px 0 0;
    height: 40px;
    color: #fff;
    font-size: 0.8em;
    font-weight: normal;
  }
  .headingcompass {
    display: block;
    text-align: center;
    padding: 0px 0 0;
    height: 20px;
    color: #fff;
    font-size: 0.8em;
    font-weight: normal;
  }

</style>
</head>
<!--  <body onload="initGeolocation();">  -->
<body onload="getLocation();">  
<div class="heading">Heading: <span id="headingReading">-</span>&deg;<p id="directional"></p></div>
<canvas id="glCanvas" width="320" height="240"></canvas>

<div id="container"></div>
<script type="text/javascript" src="js/awe-loader-min.js"></script>
<p id="demo"></p>
<p id="moStepCount"></p>
<p id="directional"></p>
<p id="demogeo"></p>
<p id ="alldistance"></p>

<script type="text/javascript">
          

          var longitudemap, latitudemap;

            function myFunction(a, b) 
            {
              return a * b;
            }


            function initGeolocation()
         {
            if( navigator.geolocation )
            {
               // Call getCurrentPosition with success and failure callbacks
               navigator.geolocation.getCurrentPosition( success, fail );
            }
            else
            {
               alert("Sorry, your browser does not support geolocation services.");
            }
         }

         function success(position)
         {
           longitudemap = position.coords.longitude;
           latitudemap = position.coords.latitude;
             //document.getElementById('long').value = position.coords.longitude;
             //document.getElementById('lat').value = position.coords.latitude;
             alert("longitude :" + longitudemap);
             //x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitute: " + position.coords.longitude;
         }

         function fail()
         {
            // Could not obtain location
         }

                        
            function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) 
            {
              var R = 6371000; // Radius of the earth in m
              var dLat = deg2rad(lat2-lat1);  // deg2rad below
              var dLon = deg2rad(lon2-lon1); 
              var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
                  Math.sin(dLon/2) * Math.sin(dLon/2); 
              var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
              var d = R * c; // Distance in km
              return d;

            }

            function deg2rad(deg) 
            {
              return deg * (Math.PI/180)
            }

            var x = document.getElementById("demogeo");

              function getLocation() {
                  if (navigator.geolocation) {
                      navigator.geolocation.getCurrentPosition(showPosition);
                  } else {
                      x.innerHTML = "Geolocation is not supported by this browser.";
                  }
              }

              function showPosition(position) {
                  //x.innerHTML = "Latitude: " + position.coords.latitude +
                  //"<br>Longitude: " + position.coords.longitude;
                  Globaldistance = getDistanceFromLatLonInKm(position.coords.latitude,position.coords.longitude,36.062386,140.1358352)
                  //document.getElementById("demo").innerHTML = "Distance Between current position and iBeacons: " + Globaldistance;
                  GlobalTotalDis = Globaldistance;
                 // document.getElementById("distance-number").innerHTML = "TotalStep: "+totalstep;
              }


            //document.getElementById("demo").innerHTML = "Distance Between iBeacons: " + getDistanceFromLatLonInKm(36.062386,140.135769,36.062409,140.135762);
            //document.getElementById("geolalong").innerHTML = "Latitide : " + getDistanceFromLatLonInKm(36.062386,140.135769,36.062409,140.135762) + "<br>Longitude: ";
            //document.getElementById("geolalong").innerHTML = "Latitide : " + position.coords.latitude + "<br>Longitude: ";
            
      </script>

      <script>
      // 8 Directional Declare
       var NP = [];
       var NEP = [];
       var NWP = [];
       var EP = [];
       var WP = [];
       var SWP = [];
       var SEP = [];
       var SP = [];
       var AR = new Array();
       var ARint = new Array();
       var ARx = new Array();
       var ARy = new Array();
       var ARz = new Array();
       var ARfile = new Array();
       var ARheight = new Array();
       var ARwidth = new Array();


  window.addEventListener('load', function() {
    // initialize awe after page loads
    window.awe.init({
      // automatically detect the device type
      device_type: awe.AUTO_DETECT_DEVICE_TYPE,
      // populate some default settings
      settings: {
      	container_id: 'container',
        fps: 30,
        default_camera_position: { x:0, y:0, z:0 },
        default_lights:[
          {
            id: 'point_light',
            type: 'point',
            color: 0xFFFFFF
          },
        ],
      },
      ready: function() {
        // load js files based on capability detection then setup the scene if successful
        awe.util.require([
          {
            capabilities: ['gum','gyro','webgl'],
            files: [ 
              [ 'js/awe-standard-dependencies.js', 'js/awe-standard.js' ], // core dependencies for this app 
              'js/awe-standard-window_resized.js', // window resize handling plugin
              'js/awe-standard-object_clicked.js', // object click/tap handling plugin
              'awe.geo_ar.js', // geo ar plugin
            ],
            success: function() { 
              // limit demo to supported devices
              // NOTE: only Chrome and Firefox has implemented the DeviceOrientation API in a workable way
              //       so for now we are excluding all others to make sure your first experience is a happy one
              var device_type = awe.device_type();
              var browser_unsupported = false;
              if (device_type != 'android') {
                browser_unsupported = true;
              } else if (!navigator.userAgent.match(/chrome|firefox/i)) {
                browser_unsupported = true;
              }
              if (browser_unsupported) {
                document.body.innerHTML = '<p>This demo currently requires a standards compliant Android browser (e.g. Chrome M33).</p>';
                return;
              }

              // setup and paint the scene
			       window.awe.setup_scene();
             // setup some code to handle when an object is clicked/tapped
              window.addEventListener('object_clicked', function(e) { 


                    var id = e.detail.projection_id;

                    if(id == "standard")
                    {
                        window.location="mainpage.php";
                    }
                    else
                    {
                        window.location="targetbase.html";
                    }


                 //id of object  //e.detail.projection_id;
              }, false);
             init();

      function init(){
        if (window.DeviceMotionEvent) {
            window.addEventListener('devicemotion', deviceMotionHandler, false);
        } else {
          console.log('This device does not support Device Motion');
        }
      }
      
      function deviceMotionHandler(eventData) {
        var info, xyz = "[X, Y, Z]";

        // Grab the acceleration from the results
        var acceleration = eventData.acceleration;
        info = xyz.replace("X", acceleration.x);
        info = info.replace("Y", acceleration.y);
        info = info.replace("Z", acceleration.z);
        //document.getElementById("moAccel").innerHTML = info;

        // Grab the acceleration including gravity from the results
        acceleration = eventData.accelerationIncludingGravity;
        info = xyz.replace("X", acceleration.x);
        info = info.replace("Y", acceleration.y);
        info = info.replace("Z", acceleration.z);
        //document.getElementById("moAccelGrav").innerHTML = info;

        // Grab the rotation rate from the results
        var rotation = eventData.rotationRate;
        info = xyz.replace("X", rotation.alpha);
        info = info.replace("Y", rotation.beta);
        info = info.replace("Z", rotation.gamma);
        //document.getElementById("moRotation").innerHTML = info;

        // // Grab the refresh interval from the results
        info = eventData.interval;
        //document.getElementById("moInterval").innerHTML = info;   

        // compare with old acceleration
        var dot =   (oldAcceleration.x * acceleration.x) +
              (oldAcceleration.y * acceleration.y) +
              (oldAcceleration.z * acceleration.z);

        var a = Math.abs(Math.sqrt(   Math.pow(oldAcceleration.x,2) +
                        Math.pow(oldAcceleration.y,2) +
                        Math.pow(oldAcceleration.z,2)));

        var b = Math.abs(Math.sqrt(   Math.pow(acceleration.x,2) +
                        Math.pow(acceleration.y,2) +
                        Math.pow(acceleration.z,2)));

        dot /= (a * b);

        //console.log(dot);

        if(dot <= 0.994 && dot > 0.90){ //bounce
          //console.log("bounce");
          //console.log("step count: " + stepCount + ", isChange: " + isChange);
          if(isChange == 0){
            stepCount+=1;
            if(stepCount%2==0){
              income = getdirection();
              Resize();


            

            }

            stepDetected();
          } else {
            if(isChange == 3){
              isChange = -1;
            }
          }
          isChange+=1;
        }
        // set old acceleration to current
        oldAcceleration = acceleration;    

        // display step count
        //document.getElementById("moStepCount").innerHTML = "TotalStep: " + stepCount +"Compass: "+compassdirection;
        //document.getElementById("alldistance").innerHTML = "All Distance :" + GlobalTotalDis;
      }




      function stepDetected(){
        var s = $('body').scrollTop();
        console.log(s);
        s += 80;
        $('body').animate({
          scrollTop: "+=" + scrollAmount
        }, 500);
      }

             function getdirection(){
              var index;

              if(compassdirection == 'North')index = 0;
                  else if(compassdirection == 'East')index = 1;
                      else if(compassdirection == 'South')index = 2;
                          else if(compassdirection == 'West')index = 3;
              return index;
             }
             

             function Resize(){
            
              var size;
              var pos = 0;
              var scaling =  (1.5/18)*0.8; 
              //travel (distance/20)
              var income = getdirection();
              if(income == 0){size = [1,0,-1,0]}
                else if(income == 1){size = [0,1,0,-1]}
                  else if(income == 2){size = [-1,0,1,0]}
                    else if(income == 3){size = [0,-1,0,1]}


              GlobalTravel = GlobalTravel + 1.5* (size[income]);
              GlobalTotalDis = GlobalTotalDis - (1.5 *(size[income]));

              for(i = 0;i< AR.length;i++){
              var c = awe.projections.view(AR[i]);
                awe.projections.update({ // rotate clicked object by 180 degrees around x and y axes over 10 seconds
                  data:{

                    //scale: { x: p.scale.x-0.8, y: p.scale.y-0.8, z: p.scale.z-0.8},
             
                    scale: { x: c.scale.x+(0.01*size[ARint[i]]), y: c.scale.y+(0.01*size[ARint[i]]), z: c.scale.z+(0.01*size[ARint[i]])},
                  },
                  where:{ id:AR[i]}
                });
              }
             }







      

			
              // setup some code to handle when an object is clicked/tapped
           //window.addEventListener('object_clicked', function(e) { 

            function Startdis(){
             var distance = Globaldistance
             var scale =0.8;
             if(distance >= 20)scale = -0.8;
             else if (distance <=2)scale = 0;
                  else scale = ((distance-2)/18)*(-0.8);
             return scale;
            }

            function Startobject(){
              var scale = Startdis();

           
              //
          }


          //    }, false);
            

          //    }, false);

              // add some points of interest (poi) for each of the compass points
            <?php
            session_start();
            $placename = $_SESSION['placename'];
                        $servername = "localhost";
                        $username = "root";
                        $password = "root";
                        $dbname = "edvisardb";
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        
                        $get = "SELECT place_id FROM place WHERE place_name = '".$placename."';"; 
                        $result = $conn->query($get);
                          if ($result->num_rows > 0) {
                            // output data of each row
                              while($row = $result->fetch_assoc()) {
                                 $placeid = $row['place_id'];
                              }
                            }

                        $sql = "SELECT * FROM arobject WHERE ar_place_id=".$placeid.";";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            // output data of each row
                              while($row = $result->fetch_assoc()) {

                                echo "AR.push('".$row['ar_name']."');";
                                echo "ARx.push(".$row['ar_x'].");";
                                echo "ARy.push(".$row['ar_y'].");";
                                echo "ARz.push(".$row['ar_z'].");";
                                echo "ARfile.push('".$row['ar_file']."');";
                                echo "ARheight.push(".$row['ar_height'].");";
                                echo "ARwidth.push(".$row['ar_width'].");";
                                if($row['ar_z']>0)echo "ARint.push(0);";
                                if($row['ar_z']<0)echo "ARint.push(2);";
                                if($row['ar_z']== 0 && $row['ar_x'] < 0)echo "ARint.push(1);";
                                if($row['ar_z']== 0 && $row['ar_x'] > 0)echo "ARint.push(3);";
                                
                              }
                          }
                                   
            ?>
            
			        // add some points of interest (poi) for each of the compass points
              for(i = 0; i < AR.length;i++){
               awe.pois.add({ id:AR[i], position: { x:ARx[i], y:ARy[i], z:ARz[i] } });
              }
               awe.pois.add({ id:'standard', position: { x: 60, y: 140, z:300 }});
              



               var ang = 0;
              // add projections to each of the pois
              for(i =0;i<AR.length;i++){
                ang = 0;
                if(ARx[i] > 0)
                {
                    ang = 70;
                }
                if(ARx[i] < 0)
                {
                    ang = 100;
                }

                awe.projections.add({ 
                  id:AR[i], 
                  geometry:{shape: 'plane', height: ARheight[i], width: ARwidth[i], widthSegments: 1, heightSegments: 1},
                      rotation:{ x:0, y:ang, z:0 },
                  material:{ 
                    color:0xFFFFFF
                  },
                  //texture: { path: 'http://www.youtube.com/embed/JW5meKfy3fY?autoplay=1' },
                  //texture: { path: 'tokyo2016.mp4' },
                  texture: { path: ARfile[i] },
                  visible: true,
                  cast_shadow: true,
                  receive_shadow: true,
                }, { poi_id: AR[i] });
              

              if(ARx[i] == 0 && ARy[i] == 0 && ARz[i] == 200)
              {
                awe.pois.update({
                        data: {
                          visible: true,
                          rotation: { x:0, y:180, z:0 }
                        },
                        where: {
                          id: AR[i]
                        }
                      });
               }

             }

               awe.projections.add({ 
                  id:'standard', 
                  geometry:{shape: 'plane', height: 100, width: 150, widthSegments: 1, heightSegments: 1},
                      rotation:{ x:0, y:180, z:0 },
                  material:{ 
                    color:0xFFFFFF
                  },
                  //texture: { path: 'http://www.youtube.com/embed/JW5meKfy3fY?autoplay=1' },
                  //texture: { path: 'tokyo2016.mp4' },
                  texture: { path: 'website.jpeg' },
                  visible: true,
                  cast_shadow: true,
                receive_shadow: true,
                }, { poi_id: 'standard' });

                
			//Startobject();

      //getLocation();
            },
          },
          { // else create a fallback
            capabilities: [],
            files: [],
            success: function() { 
              document.body.innerHTML = '<p>This demo currently requires a standards compliant mobile browser (e.g. Firefox on Android). NOTE: iOS does not currently support WebGL or WebRTC and has not implemented the DeviceOrientation API correctly. Please see <a href="http://lists.w3.org/Archives/Public/public-geolocation/2014Jan/0000.html">this post to the W3C GeoLocation Working Group</a> for more detailed information.</p>';
              return;
            },
          },
        ]);
      }
    });
  });
</script>
<?php
  //echo $placeid + "\n";
  //echo $placename;
?>




</body>
</html>
