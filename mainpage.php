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
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		
		<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
		<script type="text/javascript" src="js/camera.min.js"></script>
		<script type="text/javascript" src="js/myscript.js"></script>
		<script src="js/sorting.js" type="text/javascript"></script>
		<script src="js/jquery.isotope.js" type="text/javascript"></script>
		<!--script type="text/javascript" src="js/jquery.nav.js"></script-->

		
		
		<!-- Script of Eddystone scan to search frequency -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no,
		shrink-to-fit=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
		<!--
		<style>
		@import 'ui/css/evothings-app.css';
		</style>-->

<style>
body {
  font-family: sans-serif;
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

</style>



		<script>
			jQuery(function(){
					jQuery('#camera_wrap_1').camera({
					transPeriod: 500,
					time: 3000,
					height: '490px',
					thumbnails: false,
					pagination: true,
					playPause: false,
					loader: false,
					navigation: false,
					hover: false
				});
			});
		</script>
		
	</head>

    
    <!--home start-->
    
    <div id="home">
    	<div class="headerLine">
	<div id="menuF" class="default">
		<div class="container">
			<div class="row">
				<div class="logo col-md-4">
					<div>
						<a href="#">
							<img src="images/logo.png">
						</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="navmenu"style="text-align: center;">
						<ul id="menu">
							<li class="active" ><a href="#home">Home</a></li>
							<li><a href="place.php">Places</a></li>
							<!--li><a href="#features">Features</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row wrap">
				<div class="col-md-12 gallery"> 
						<div class="camera_wrap camera_white_skin" id="camera_wrap_1">
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Connect<p><font color ="#29abe2">E</font>ddystone</p></h2>
								</div>
							</div>
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Enable<p><font color ="#bdccd4">A</font><font color ="#f93838">R</font> web</p></h2>
								</div>
							</div>
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Link<p><font color ="#8b9dc3">Social</font></p></h2>
								</div>
							</div>
						</div><!-- #camera_wrap_1 -->
				</div>
			</div>
		</div>
	</div>
		 <?php 
              $servername = "localhost";
              $username = "root";
              $password = "root";
              $dbname = "edvisardb";
		      $conn = new mysqli($servername, $username, $password, $dbname);
		      $sql = "SELECT * FROM place;";
              if ($result = mysqli_query($conn,$sql)){
                $numplaces=mysqli_num_rows($result);
              } 
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-4 project">
					<h3><?php echo $numplaces; ?></h3>
					<h4>Places</h4>
					<p>The number of places in our data</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 cBusiness">
					<h3>An alternative way to promote your places - With iBeacons and EddvisAR</h3>
					<h4>Be it attraction spots, shops or event booths with EdvisAR you could promote it regardless of the places</h4>
          <h4>Incase you need to move, just take iBeacons and it's done !</h4>


					
					<!-- <h1>Eddystone Scan</h1>  -->
					<p id="message"> <!-- Please move within range of Eddystone beacons.  --></p>
					<ul id="found-beacons" class="dynamic"></ul>
					
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 centPic">
					<img class="img-responsive"  src="images/bizPic.png"/>
				</div>
			</div>
		</div>   
    </div>
    
    <!--about start-->    
    
    <div id="about">
    	<div class="line2">
			<div class="container">
				<div class="row Fresh">
					<div class="col-md-4 Des">
						<i class="fa fa-camera"></i>
						<h4>Real Location with AR</h4>
						<p>EdvisAR provided location based AR for many interesting places, which has informations and guides provided.</p>
					</div>
					<div class="col-md-4 Ver">
						<i class="fa fa-map-marker"></i>
						<h4>Google maps with location</h4>
						<p>The places will be mark on Google maps which could be searched on EdvisAR</p>
					</div>
					<div class="col-md-4 Fully">
						<i class="fa fa-facebook-square"></i>
						<h4>Fast Connect to Social Network</h4>
						<p>Provide an easy way to quickly post your moment in the Facebook.</p>
					</div>		
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 wwa">
					<span name="about" ></span>
					<h3>How to use EdvisAR ? Just follow these instructions!</h3>
					<h4>Simple right ?</h4>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row team">
				<div class="col-md-4 b1">
						<img class="img-responsive" src="images/picTeam/physicalweb.png">
						<h4>Connect to Physical Web</h4>
						<h5>Connect</h5>
						<p>By using the eddystone here(make link here later), <br/> for android 6.0+ you can enable your physical web function <br/> or any application to find beacons.</p>
			
				</div>
			
			
				<div class="col-md-4">
						<img class="img-responsive" src="images/picTeam/permission.png">
						<h4>Enable Location and Camera</h4>
						<h5>Request Permissions</h5>
						<p>EddvisAR will uses your current location and camera<br/> make sure to allow it.</p>
	
				</div>
		
			
				<div class="col-md-4 b3">
						<img class="img-responsive" src="images/picTeam/smile.png">
						<h4>Enjoy!</h4>
						<h5>EddvisAR is now running!</h5>
						<p>Enjoy with the application and your interested information.</p>
			
				</div>
			</div>
		</div>
  <!-- End of Instructions  -->

		<div class="container">
			<div class="row">
				<div class="col-md-12 wwa">
					<hr/>
            <h3>Top 4 Visited places</h3>
				</div>
			</div>
		</div>


		<div class="container">
			<div class="row">
      <?php 
              
              // Create connection
              
               $sql = "SELECT * FROM place ORDER BY visited DESC LIMIT 4;";
               $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-3 bar'>".
                          "<div class='textP'>".
                          "<h3>First Rank</h3>";
                    echo  "<img class='img-responsive ' src='" . $row['url']."' />";
                    echo  "<p>". $row['place_name']. "<br/></p>".
                          "</div>".
                          "</div>";
                  }
              } else 
                echo "0 results";

        ?>
    </div>
   <?php 

    ?>

			</div>
		</div>	
		
		

  
    
  
		


		
	<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.js"></script>
	<script>
			$(document).ready(function(){
			$(".bhide").click(function(){
				$(".hideObj").slideDown();
				$(this).hide(); //.attr()
				return false;
			});
			$(".bhide2").click(function(){
				$(".container.hideObj2").slideDown();
				$(this).hide(); // .attr()
				return false;
			});
				
			$('.heart').mouseover(function(){
					$(this).find('i').removeClass('fa-heart-o').addClass('fa-heart');
				}).mouseout(function(){
					$(this).find('i').removeClass('fa-heart').addClass('fa-heart-o');
				});
				
				function sdf_FTS(_number,_decimal,_separator)
				{
				var decimal=(typeof(_decimal)!='undefined')?_decimal:2;
				var separator=(typeof(_separator)!='undefined')?_separator:'';
				var r=parseFloat(_number)
				var exp10=Math.pow(10,decimal);
				r=Math.round(r*exp10)/exp10;
				rr=Number(r).toFixed(decimal).toString().split('.');
				b=rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1"+separator);
				r=(rr[1]?b+'.'+rr[1]:b);

				return r;
}
				
			setTimeout(function(){
					$('#counter').text('0');
					$('#counter1').text('0');
					$('#counter2').text('0');
					setInterval(function(){
						
						var curval=parseInt($('#counter').text());
						var curval1=parseInt($('#counter1').text().replace(' ',''));
						var curval2=parseInt($('#counter2').text());
						if(curval<=707){
							$('#counter').text(curval+1);
						}
						if(curval1<=12280){
							$('#counter1').text(sdf_FTS((curval1+20),0,' '));
						}
						if(curval2<=245){
							$('#counter2').text(curval2+1);
						}
					}, 2);
					
				}, 500);
			});
	</script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#menu').slicknav();
		
	});
	</script>
	
	<script type="text/javascript">
    $(document).ready(function(){
       
        var $menu = $("#menuF");
            
        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("default")
                           .addClass("fixed transbg")
                           .fadeIn('fast');
                });
            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("fixed transbg")
                           .addClass("default")
                           .fadeIn('fast');
                });
            }
        });
	});
    //jQuery
	</script>

	<script type="text/javascript" charset="utf-8">

		jQuery(document).ready(function(){
			jQuery(".pretty a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true, social_tools: ''});
			
		});
	</script>
  
	</body>
	
</html>