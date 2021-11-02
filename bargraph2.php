<html>
  <?php	
    session_start();
    //header
    include ('Header.php');
    require_once('DataBase.php');
    require_once('Tablet.php');
    $tablets = NULL;
    $DB = new DataBase();
    $tablets = $DB->getTabletsAsend();
    $query = "SELECT * FROM tablet"; 
    $con = mysqli_connect("localhost","root","","mobileshop");
    $result = mysqli_query($con, $query);
    if($tablets == 0 || $tablets == "error" || sizeof($tablets)==0){
      $tablets = NULL;
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
					<h3 style="color: white; margin-top: 50px; margin-left: 350px;">
            <?php echo $DB->getPlatformById($_GET['platformID'])->Name;?> Tablets Benchmark
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
  <script type="text/javascript" src="assets/js/app2.js"></script>
  
  </body>
  <?php
    //footer
		include ('Footer.php');
	?>
</html>