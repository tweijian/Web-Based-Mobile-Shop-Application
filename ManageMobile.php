<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('Mobile.php');
	require_once('DataBase.php');
	session_start();
	$AdminID="";
	$admin = NULL;
	$mobiles = NULL;
	$brands = NULL;
	if(isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID'])) {
		$UserID=$_SESSION['AdminID'];
		$DB = new DataBase();
		$admin = $DB->getAdminById($UserID);
		$mobiles = $DB->getMobilesAsend();
		$brands = $DB->getBrands();
		if($brands == 0 || $brands == "error" || sizeof($brands) == 0){
			$brands = NULL;
		}
		if($mobiles == 0 || $mobiles == "error" || sizeof($mobiles)==0){
			$mobiles = NULL;
		}
	}else{
		header('Location: LoginAsAdmin.php');
	}
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 100px;">
                       Admin Panel - Manage Mobile Phone Products
					</h1>
                </div>
            </div>
        </div>
    </div>
	
	<?php
        include ('AdminNav.php');
    ?>

	<div style="margin: 10px;">
		<a class="btn btn-success" href="ManageBrand.php">Add Brand</a>
		<a class="btn btn-success" href="ManagePlatform.php">Add Platform</a>
		<a class="btn btn-success" href="ManageStorage.php">Add Storage</a>
		<a class="btn btn-success" href="AddMobile.php">Add Mobile Phone Product</a>	
		<br></br>		
		<div class='card'>
			<div class='card-body'>
				<div class='row'>
					<?php 
						if($mobiles != NULL){
							foreach ($mobiles as $mobile){
								echo "									
										<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
											<div class='my-list'>
													<img style='max-width:100%;' src='".$mobile->ImageUrl."' alt='dsadas' />
													<h3>".$DB->getBrandById($mobile->BrandID)->Name." ".$mobile->Model."</h3>
													<span class='pull-right'>".$DB->getPlatformById($mobile->PlatformID)->Name."</span>
													<div class='offer'>RM ".$mobile->Price."</div>
												<form action='EditMobile.php' method='post'>
													<input type='hidden' value='".$mobile->ID."' name='ID' id='ID' >
													<center><input type='submit' value='Edit' class='btn btn-info'></center>
												</form>
												<form action='DeleteMobile.php' method='post'>
													<input type='hidden' value='".$mobile->ID."' name='ID' id='ID' >
													<center><input type='submit' value='Delete' class='btn btn-danger' onClick=\"return confirm('Are you sure you want to delete?')\"></center>
												</form>
											</div>
										</div>											
									";
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>

	</body>
	<?php
		//footer
		include ('Footer.php');
	?>
</html>