<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('Tablet.php');
	require_once('DataBase.php');
	session_start();
	$AdminID="";
	$admin = NULL;
	$tablets = NULL;
	$brands = NULL;
	if(isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID'])) {
		$UserID=$_SESSION['AdminID'];
		$DB = new DataBase();
		$admin = $DB->getAdminById($UserID);
		$tablets = $DB->getTabletsAsend();
		$brands = $DB->getBrands();
		if($brands == 0 || $brands == "error" || sizeof($brands) == 0){
			$brands = NULL;
		}
		if($tablets == 0 || $tablets == "error" || sizeof($tablets)==0){
			$tablets = NULL;
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 175px;">
                       Admin Panel - Manage Tablet Products
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
		<a class="btn btn-success" href="AddTablet.php">Add Tablet Product</a>		
		<br></br>		
		<div class='card'>
			<div class='card-body'>
				<div class='row'>
					<?php 
						if($tablets != NULL){
							foreach ($tablets as $tablet){
								echo "										
										<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
											<div class='my-list'>
													<img style='max-width:100%;' src='".$tablet->ImageUrl."' alt='dsadas' />
													<h3>".$DB->getBrandById($tablet->BrandID)->Name." ".$tablet->Model."</h3>
													<span class='pull-right'>".$DB->getPlatformById($tablet->PlatformID)->Name."</span>
													<div class='offer'>RM ".$tablet->Price."</div>
												<form action='EditTablet.php' method='post'>
													<input type='hidden' value='".$tablet->ID."' name='ID' id='ID' >
													<center><input type='submit' value='Edit' class='btn btn-info'></center>
												</form>
												<form action='DeleteTablet.php' method='post'>
													<input type='hidden' value='".$tablet->ID."' name='ID' id='ID' >
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