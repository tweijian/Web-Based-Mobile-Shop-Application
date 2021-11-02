<?php	
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('DataBase.php');
	session_start();
	$mobile = NULL;
	$DB = NULL;
	$DB = new Database();
	$mobile = $DB->getMobileById($_POST['id']);
	include_once 'Cart.class.php'; 
	$cart = new Cart; 
	require_once 'DBConnection.php'; 	
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
                        Product Details</h1>
                </div>
            </div>
        </div>
    </div>

	<div class="container">
		<a class="btn btn-info" href="MobilesList.php">Back</a><br/><br/>
		<div class="row">
			<div class="col-xs-4 item-photo">
				<img style="width:600px; height:600px;" src="<?php echo $mobile->ImageUrl?>" />
			</div>  

			<img style="width:300px; height:300px;" src="<?php echo $DB->getBrandById($mobile->BrandID)->ImageUrl?>" />
			<div class="col-xs-9">
				<ul class="menu-items">
					<br/><br/><h4 class="active">Mobile Details</h4>
				</ul>

				<div style="width:100%;border-top:1px solid silver">
					<p style="padding:15px;">
						<a><?php echo $mobile->Features?></a>
					</p>

					<small>
						<table border='1'>
							<tr><td>&nbsp Brand &nbsp</td><td>&nbsp<?php echo $DB->getBrandById($mobile->BrandID)->Name?></td></tr>
							<tr><td>&nbsp Model &nbsp</td><td>&nbsp<?php echo $mobile->Model?></td></tr>
							<tr><td>&nbsp Price &nbsp</td><td>&nbspRM <?php echo $mobile->Price-($mobile->Price*$mobile->DiscountRate)/$mobile->Price?></td></tr>
							<tr><td>&nbsp Release Date &nbsp</td><td>&nbsp<?php echo $mobile->ReleaseDate?></td></tr>
							<tr><td>&nbsp Discount Rate &nbsp</td><td>&nbsp<?php echo $mobile->DiscountRate?></td></tr>
							<tr><td>&nbsp Main Camera <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $mobile->MainCameraSpecs?></td></tr>
							<tr><td>&nbsp Main Camera <br/> &nbsp Features &nbsp</td><td>&nbsp<?php echo $mobile->MainCameraFeatures?></td></tr>
							<tr><td>&nbsp Front Camera <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $mobile->FrontCameraSpecs?></td></tr>
							<tr><td>&nbsp Front Camera <br/> &nbsp Features &nbsp</td><td>&nbsp<?php echo $mobile->FrontCameraFeatures?></td></tr>
							<tr><td>&nbsp Display <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $mobile->DisplaySpecs?></td></tr>
							<tr><td>&nbsp Memory <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $mobile->MemorySpecs?></td></tr>
							<tr><td>&nbsp Network <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $mobile->NetworkSpecs?></td></tr>
							<tr><td>&nbsp Platform &nbsp</td><td>&nbsp<?php echo $DB->getPlatformById($mobile->PlatformID)->Name?></td></tr>
							<tr><td>&nbsp CPU &nbsp</td><td>&nbsp<?php echo $mobile->CPU?></td></tr>
							<tr><td>&nbsp Battery <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $mobile->BatterySpecs?></td></tr>
							<tr><td>&nbsp Performance <br/> &nbsp Score &nbsp</td><td>&nbsp<?php echo $mobile->PerformanceScore?></td></tr>
							<tr><td>&nbsp Main Camera <br/> &nbsp Score &nbsp</td><td>&nbsp<?php echo $mobile->MainCameraScore?></td></tr>
							<tr><td>&nbsp Front Camera <br/> &nbsp Score &nbsp</td><td>&nbsp<?php echo $mobile->FrontCameraScore?></td></tr>
							<tr><td>&nbsp Screen Display <br/> &nbsp Score &nbsp</td><td>&nbsp<?php echo $mobile->DisplayScore?></td></tr>
							<tr><td>&nbsp Battery Life Score &nbsp</td><td>&nbsp<?php echo $mobile->BatteryLifeScore?></td></tr>
						</table>
					</small>
				</div>

				<div style="margin-left: 850px;">
					<br/><br/>
					<a href="bargraph.php?platformID=<?php echo $mobile->PlatformID; ?>&type=mobile" class="btn btn-primary">View Benchmark</a>
					&nbsp
					<a href="CartAction.php?action=addToCart&id=<?php echo $mobile->ID; ?>&type=mobile" class="btn btn-primary">Add to Cart</a>
				</div>
			</div>		
		</div>
	</div>
	<br/>

	</body>
	<?php
		//footer
		include ('Footer.php');
	?>
</html>