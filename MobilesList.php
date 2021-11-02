<?php
	session_start();
	//error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('DataBase.php');
	require_once('Mobile.php');
	$statement = [];
	if (isset($_GET['start_price'])){
		$statement[] = "price >= " . $_GET['start_price'];
	}
	if (isset($_GET['end_price'])){
		$statement[] = "price <= " . $_GET['end_price'];
	}
	if (isset($_GET['brands'])){
		$statement[] = "brandID IN (" . implode(", ", $_GET['brands']) . ")";
	}
	if (isset($_GET['platforms'])){
		$statement[] = "platformID IN (" . implode(", ", $_GET['platforms']) . ")";
	}
	if (isset($_GET['storages'])){
		$statement[] = "storageID IN (" . implode(", ", $_GET['storages']) . ")";
	}
	$mobiles = NULL;
	$DB = new DataBase();
	$mobiles = $DB->getMobilesAsend();
	$query = "SELECT * FROM mobile";
	if (count($statement) > 0){
		$condition = implode(" AND ", $statement);
		$query .= " WHERE " . $condition;
	}
	$con = mysqli_connect("localhost","root","","mobileshop");
	$result = mysqli_query($con, $query);	
	if($mobiles == 0 || $mobiles == "error" || sizeof($mobiles)==0){
		$mobiles = NULL;
	}
	$UserID="";
	$user = null;
	$mobiles = NULL;
	$DB = NULL;
	$DB = new DataBase();
	$mobiles = $DB->getMobilesAsend();
?>

<html>
	<?php	
		//header
		include ('Header.php');
	?>
	
	<div class="jumbotron jumbotron-sm" style="background-color: black;">
		<div class="container" >
			<div class="row">
				<div class="col-sm-15 col-sm-15">
					<h1 style="color: white; margin-top: 50px; margin-left: 500px;">
						Products
					</h1>
					<br>
					<span style="color: white; margin-top: 50px; margin-left: 525px;">
						Mobile Phones
					</span>
				</div>
			</div>
		</div>
	</div>
				
	<div style = "width: 100%;">
		<div style= "width: 30%; float: left; margin-left: 10px; margin-right: 10px;">
			<form action="" method="GET">
				<div class="card shadow mt-3">
					<div class="card-body">
						<h6>Filter Product by Price</h6>
						<hr>
						<form action="" method="GET">
							<div class="row">
								<div class="col-md-4">
									<label for="">Min. Price</label>
									<input type="text" name="start_price" value="<?php if(isset($_GET['start_price']))
									{echo $_GET['start_price']; }else{echo "300";} ?>" class="form-control">
								</div>
								<div class="col-md-4">
									<label for="">Max. Price</label>
									<input type="text" name="end_price" value="<?php if(isset($_GET['end_price']))
									{echo $_GET['end_price']; }else{echo "15000";} ?>" class="form-control">
								</div>
								<div class="col-md-4">
									<br/>
									<button type="submit" class="btn btn-primary px-4">Filter</button>
								</div>
							</div>
						</form>
					</div>

					<div class="card-body">
						<h6>Brand List</h6>
						<hr>
						<?php
							$con = mysqli_connect("localhost","root","","mobileshop");

							$brand_query = "SELECT * FROM brand";
							$brand_query_run = mysqli_query($con, $brand_query);
							if(mysqli_num_rows($brand_query_run) > 0){
								foreach($brand_query_run as $brandlist){
									$checked = [];
									if(isset($_GET['brands'])){
										$checked = $_GET['brands'];
									}
									?>
										<div>
											<input type="checkbox" name="brands[]" value="<?php echo $brandlist['id']; ?>"
											<?php
												if(in_array($brandlist['id'], $checked)){echo "checked";}
											?>
											/>
											<?php echo $brandlist['name']; ?>
										</div>
									<?php
								}
							}
							else{
								echo "No Brands Found";
							}
						?>
					</div>

					<div class="card-body">
						<h6>Platform List</h6>
						<hr>
						<?php
							$con = mysqli_connect("localhost","root","","mobileshop");
							$platform_query = "SELECT * FROM platform";
							$platform_query_run = mysqli_query($con, $platform_query);
							if(mysqli_num_rows($platform_query_run) > 0){
								foreach($platform_query_run as $platformlist){
									$checked = [];
									if(isset($_GET['platforms'])){
										$checked = $_GET['platforms'];
									}
									?>
										<div>
											<input type="checkbox" name="platforms[]" value="<?php echo $platformlist['id']; ?>"
											<?php
												if(in_array($platformlist['id'], $checked)){echo "checked";}
											?>
											/>
											<?php echo $platformlist['name']; ?>
										</div>
									<?php
								}
							}
							else{
								echo "No Platform Found";
							}
						?>
					</div>

					<div class="card-body">
						<h6>Storage List</h6>
						<hr>
						<?php
							$con = mysqli_connect("localhost","root","","mobileshop");
							$storage_query = "SELECT * FROM storage";
							$storage_query_run = mysqli_query($con, $storage_query);
							if(mysqli_num_rows($storage_query_run) > 0){
								foreach($storage_query_run as $storagelist){
									$checked = [];
									if(isset($_GET['storages'])){
										$checked = $_GET['storages'];
									}
									?>
										<div>
											<input type="checkbox" name="storages[]" value="<?php echo $storagelist['id']; ?>"
											<?php
												if(in_array($storagelist['id'], $checked)){echo "checked";}
											?>
											/>
											<?php echo $storagelist['name']; ?>
										</div>
									<?php
								}
							}
							else{
								echo "No Storage Found";
							}
						?>
					</div>
				</div>
			</form> 
		</div>
		<br>
		<div style="margin-left: 30%; margin-right: 10px;">
			<div class="card">
				<div class="card-header">
					<h5>Product Details</h5>
				</div>

				<div class="card-body">
					<div class="row">
						<?php  
						$con = mysqli_connect("localhost","root","","mobileshop");

						if(isset($_GET['start_price']) && isset($_GET['end_price'])){
							$startprice = $_GET['start_price'];
							$endprice = $_GET['end_price'];

							$query = "SELECT * FROM mobile WHERE price BETWEEN $startprice AND $endprice ";
						}
						else{
							$query = "SELECT * FROM mobile";
						}						
						$query_run = mysqli_query($con, $query);
						if(mysqli_num_rows($query_run) > 0){
							foreach($result as $proditems){
								?>									
									<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
										<div class='my-list'>
											<img style='max-width:100%;' src='<?php echo $proditems['mobileUrl']?>' alt='dsadas' />
											<h3><?php echo $DB->getBrandById($proditems['brandID'])->Name . " " . $proditems['model'];?></h3>
											<span class='pull-right'><?php echo $DB->getPlatformById($proditems['platformID'])->Name;?></span>
											<div class='offer'>RM <?php echo $proditems['price']?></div>
											<div class='detail'>
												<p>Click 'Details' for more info</p>
												<img style='max-width:100%;' src='<?php echo $proditems['mobileUrl']?>' alt='dsadas' />
												<form action='Details.php' method='post'>
													<input type='hidden' value='<?php echo $proditems['id']?>' id='id' name='id'>
													<input type='submit' value='Details' class='btn btn-info'>
												</form>
											</div>
										</div>
									</div>									
							<?php
							}
						}
						else{
							echo "No Record Found";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	</body>
	<!-- footer -->
	<footer style="margin-top:60%">
		<div class="row">
			<div style="margin-left: 38%">
				<p style="text-align:center;">Information</p><br>
				<a class="nav-link" href="AboutUs.php" style="text-align:center;">About Us</a><br>
				<a class="nav-link" href="ContactUs.php" style="text-align:center;">Contact Us</a>
			</div>
			<div style="margin-left: 10%">
				<p style="text-align:center;">Contact Us</p><br>
				<a><img src="assets/images/email.png" width="45" height="45">&nbsp online@jasongadget.com.my</a><br><br>
				<a><img src="assets/images/phone.png" width="40" height="40">&nbsp +6012 345 6789</a>
			</div>
				
		</div>
		<br><p class="copyright" style="text-align:center;">© JasonGadget 2021</p>
	</footer>
	<!-- end footer -->
</html>