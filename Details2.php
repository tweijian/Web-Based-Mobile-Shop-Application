<?php	
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('DataBase.php');
	session_start();
	$tablet = NULL;
	$DB = NULL;
	$DB = new Database();
	$tablet = $DB->getTabletById($_POST['id']);
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
		<a class="btn btn-info" href="TabletsList.php">Back</a><br/><br/>
		<div class="row">
			<div class="col-xs-4 item-photo">
				<img style="width:600px; height:600px;" src="<?php echo $tablet->ImageUrl?>" />
			</div>   

			<img style="width:300px; height:300px;" src="<?php echo $DB->getBrandById($tablet->BrandID)->ImageUrl?>" />
			<div class="col-xs-9">
				<ul class="menu-items">
					<br/><br/><h4 class="active">Tablet Details</h4>
				</ul>

				<div style="width:100%;border-top:1px solid silver">
					<p style="padding:15px;">
						<a><?php echo $tablet->Features?></a>
					</p>

					<small>
						<table border='1'>
							<tr><td>&nbsp Brand &nbsp</td><td>&nbsp<?php echo $DB->getBrandById($tablet->BrandID)->Name?></td></tr>
							<tr><td>&nbsp Model &nbsp</td><td>&nbsp<?php echo $tablet->Model?></td></tr>
							<tr><td>&nbsp Price &nbsp</td><td>&nbspRM <?php echo $tablet->Price-($tablet->Price*$tablet->DiscountRate)/$tablet->Price?></td></tr>
							<tr><td>&nbsp Release Date &nbsp</td><td>&nbsp<?php echo $tablet->ReleaseDate?></td></tr>
							<tr><td>&nbsp Discount Rate &nbsp</td><td>&nbsp<?php echo $tablet->DiscountRate?></td></tr>
							<tr><td>&nbsp Main Camera <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $tablet->MainCameraSpecs?></td></tr>
							<tr><td>&nbsp Main Camera <br/> &nbsp Features &nbsp</td><td>&nbsp<?php echo $tablet->MainCameraFeatures?></td></tr>
							<tr><td>&nbsp Front Camera <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $tablet->FrontCameraSpecs?></td></tr>
							<tr><td>&nbsp Front Camera <br/> &nbsp Features &nbsp</td><td>&nbsp<?php echo $tablet->FrontCameraFeatures?></td></tr>
							<tr><td>&nbsp Display <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $tablet->DisplaySpecs?></td></tr>
							<tr><td>&nbsp Memory <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $tablet->MemorySpecs?></td></tr>
							<tr><td>&nbsp Network <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $tablet->NetworkSpecs?></td></tr>
							<tr><td>&nbsp Platform &nbsp</td><td>&nbsp<?php echo $DB->getPlatformById($tablet->PlatformID)->Name?></td></tr>
							<tr><td>&nbsp CPU &nbsp</td><td>&nbsp<?php echo $tablet->CPU?></td></tr>
							<tr><td>&nbsp Battery <br/> &nbsp Specification &nbsp</td><td>&nbsp<?php echo $tablet->BatterySpecs?></td></tr>
							<tr><td>&nbsp Performance <br/> &nbsp Score &nbsp</td><td>&nbsp<?php echo $tablet->PerformanceScore?></td></tr>
							<tr><td>&nbsp Main Camera <br/> &nbsp Score &nbsp</td><td>&nbsp<?php echo $tablet->MainCameraScore?></td></tr>
							<tr><td>&nbsp Front Camera <br/> &nbsp Score &nbsp</td><td>&nbsp<?php echo $tablet->FrontCameraScore?></td></tr>
							<tr><td>&nbsp Screen Display <br/> &nbsp Score &nbsp</td><td>&nbsp<?php echo $tablet->DisplayScore?></td></tr>
							<tr><td>&nbsp Battery Life Score &nbsp</td><td>&nbsp<?php echo $tablet->BatteryLifeScore?></td></tr>
						</table>
					</small>
				</div>

				<div style="margin-left: 850px;">
					<br/><br/>
					<a href="bargraph2.php?platformID=<?php echo $tablet->PlatformID; ?>&type=tablet" class="btn btn-primary">View Benchmark</a>
					&nbsp
					<a href="CartAction.php?action=addToCart&id=<?php echo $tablet->ID; ?>&type=tablet" class="btn btn-primary">Add to Cart</a>
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