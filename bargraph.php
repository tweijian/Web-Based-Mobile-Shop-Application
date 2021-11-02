<html>
  <?php	
    session_start();
    //header
    include ('Header.php');
    require_once('DataBase.php');
    require_once('Mobile.php');
    $mobiles = NULL;
    $DB = new DataBase();
    $mobiles = $DB->getMobilesAsend();
    $query = "SELECT * FROM mobile";
    $con = mysqli_connect("localhost","root","","mobileshop");
    $result = mysqli_query($con, $query);
    if($mobiles == 0 || $mobiles == "error" || sizeof($mobiles)==0){
      $mobiles = NULL;
    }
  ?>

  <head>
    <title>ChartJS - BarGraph</title>
    <style type="text/css">
      #chart-container {
        width: 1200px;
        height: auto;
        margin-left: 10%;
      }
    </style>
  </head>
  
  <div class="jumbotron jumbotron-sm" style="background-color: black;">
		<div class="container" >
			<div class="row">
				<div class="col-sm-15 col-sm-15">
					<h1 style="color: white; margin-top: 50px; margin-left: 450px;">
            Benchmarks
					</h1>
					<br>
					<h3 style="color: white; margin-top: 50px; margin-left: 325px;">
            <?php echo $DB->getPlatformById($_GET['platformID'])->Name;?> Phones Benchmark
          </h3>
				</div>
			</div>
		</div>
	</div>
  <br>

  <div id="chart-container">
    <canvas id="mycanvas"></canvas>
  </div>
  <br>

  <div id="chart-container">
    <canvas id="mycanvas2"></canvas>
  </div>
  <br>

  <div id="chart-container">
    <canvas id="mycanvas3"></canvas>
  </div>
  <br>
  
  <div id="chart-container">
    <canvas id="mycanvas4"></canvas>
  </div>
  <br>
  
  <div id="chart-container">
    <canvas id="mycanvas5"></canvas>
  </div>
  <br>

  <!-- javascript -->
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/chart.min.js"></script>
  <script type="text/javascript" src="assets/js/app.js"></script>

  </body>
  <?php
    //footer
		include ('Footer.php');
	?>
</html>