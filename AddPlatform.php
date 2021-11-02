<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('Platform.php');
	require_once('DataBase.php');
	session_start();
	if((isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID'])) && (isset($_POST['name']) 
			&& !empty($_POST['name'])) ) {
                $platformName = $_POST['name'];
                $DB = new Database();
                $platform = new Platform(0, $platformName);
                $DB->addPlatform($platform);
				header('Location: ManagePlatform.php');
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 250px;">
                       Admin Panel - Add Product Platforms
					</h1>
                </div>
            </div>
        </div>
    </div>
	
	<?php
        include ('AdminNav.php');
    ?>

	<div style="margin: 10px;">
		<div class="card">
			<div class="card-body">
				<a class="btn btn-info" href="ManageBrand.php">Back</a>
				<br/><br/>
				<form class="form-horizontal" action="AddPlatform.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>Add Platform</legend>
						
						<div class="form-group">
							<label class="col-md-4 control-label" >Name</label>  
							<div class="col-md-4">
							<input name="name" type="text" placeholder="Name" class="form-control input-md" required="">
							
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="anmelden"></label>
							<div class="col-md-8">
							<input type="submit" value="Add" name="submit" class="btn btn-success">
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

	</body>
	<?php
		//footer
		include ('Footer.php');
	?>
</html>