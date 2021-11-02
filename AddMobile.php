<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('Brand.php');
	require_once('Mobile.php');
	require_once('DataBase.php');
	session_start();
	$AdminID="";
	$admin = NULL;
	$mobiles = NULL;
	$brands = NULL;
	if(isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID'])){
		$UserID=$_SESSION['AdminID'];
		$DB = new DataBase();
		$admin = $DB->getAdminById($UserID);
		$mobiles = $DB->getMobilesAsend();
		$brands = $DB->getBrands();
		$platforms = $DB->getPlatforms();
		$storages = $DB->getStorages();
		if($brands == 0 || $brands == "error" || sizeof($brands) == 0){
			$brands = NULL;
		}
		if($mobiles == 0 || $mobiles == "error" || sizeof($mobiles)==0){
			$mobiles = NULL;
		}
	}
	if(!empty($_POST)) {
		$model = $_POST["model"];
		$brand = $_POST["brand"];
		$price = $_POST["price"];
		$releaseDate = $_POST["releaseDate"];
		$discountRate = $_POST["discountRate"];
		$tmp_name = $_FILES['imageUpload']['tmp_name']; // error
		$mainCameraSpecs = $_POST["mainCameraSpecs"];
		$mainCameraFeatures = $_POST["mainCameraFeatures"];
		$frontCameraSpecs = $_POST["frontCameraSpecs"];
		$frontCameraFeatures = $_POST["frontCameraFeatures"];
		$displaySpecs = $_POST["displaySpecs"];
		$memorySpecs = $_POST["memorySpecs"];
		$networkSpecs = $_POST["networkSpecs"];
		$platform = $_POST["platform"];
		$storage = $_POST["storage"];
		$cpu = $_POST["cpu"];
		$features = $_POST["features"];
		$batterySpecs = $_POST["batterySpecs"];
		$performanceScore = $_POST["performanceScore"];
		$mainCameraScore = $_POST["mainCameraScore"];
		$frontCameraScore = $_POST["frontCameraScore"];
		$displayScore = $_POST["displayScore"];
		$batteryLifeScore = $_POST["batteryLifeScore"];
		$location = "MobilesPictures/";
		header('Location: ManageMobile.php');
		if(move_uploaded_file($tmp_name,$location.$model.".jpg")){
			$imageUrl =$location.$model.".jpg";
			$DB = new Database();
			$mobile = new Mobile(0, $model, $brand, $price, $releaseDate, $discountRate, $imageUrl,
					$mainCameraSpecs, $mainCameraFeatures, $frontCameraSpecs, $frontCameraFeatures, 
					$displaySpecs, $memorySpecs, $networkSpecs, $platform, $storage, $cpu, $features,
					$batterySpecs, $performanceScore, $mainCameraScore, $frontCameraScore, $displayScore, 
					$batteryLifeScore);
			$error = $DB->addMobile($mobile);
			echo($error);
		}
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
                       Admin Panel - Add Mobile Phone Products
					</h1>
                </div>
            </div>
        </div>
    </div>
	
	<?php
        include ('AdminNav.php');
    ?>

	<form class="form-horizontal" action="AddMobile.php" method="post" enctype="multipart/form-data">
		<a class="btn btn-info" href="ManageMobile.php" style="margin-left: 25px;">Back</a>
		<fieldset style="margin: 20px;">
			<legend><center>Add Mobile Phone</center></legend>
			<div class='card'>
				<div class='card-body'>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="name">Model</label>  
						<div class="col-md-4">
							<input name="model" type="text" placeholder="Model" class="form-control input-md" required="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="name">Brand</label>  
						<div class="col-md-4">
						<select name="brand" class="form-control">
							<?php 
								foreach ($brands as $b){
									echo "<option value='$b->ID'>$b->Name</option>";
								}
							?>
						</select>
						</div>
					</div>
					<br/>
					
					<div class="form-group">
						<label class="col-md-4 control-label">Price</label>  
						<div class="col-md-4">
							<input name="price" type="number" placeholder="Price" class="form-control input-md" required="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" >Release Date</label>  
						<div class="col-md-4">
						<input name="releaseDate" type="date" class="form-control  required="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" >Discount Rate</label>  
						<div class="col-md-4">
						<input name="discountRate" type="number" placeholder="Discount Rate" class="form-control input-md" required="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" >Image</label>  
						<div class="col-md-4">
							<input id="imageUpload" name="imageUpload" type="file" class="form-control" required="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" >Memory Specification</label>  
						<div class="col-md-4">
						<input name="memorySpecs" type="text" placeholder="Memory Specification" class="form-control input-md" required="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" >Network Specification</label>  
						<div class="col-md-4">
						<input name="networkSpecs" type="text" placeholder="Network Specification" class="form-control input-md" required="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="name">Platform</label>  
						<div class="col-md-4">
						<select name="platform" class="form-control">
							<?php 
								foreach ($platforms as $p){
									echo "<option value='$p->ID'>$p->Name</option>";
								}
							?>
						</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="name">Storage</label>  
						<div class="col-md-4">
						<select name="storage" class="form-control">
							<?php 
								foreach ($storages as $s){
									echo "<option value='$s->ID'>$s->Name</option>";
								}
							?>
						</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" >Main Camera Specification</label>
						<div class="col-xl-12">                     
						<textarea input name="mainCameraSpecs" type="text" placeholder="Main Camera Specification" class="form-control input-md" required=""></textarea> 
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >Main Camera Features</label>
						<div class="col-xl-12">                     
						<textarea input name="mainCameraFeatures" type="text" placeholder="Main Camera Features" class="form-control input-md" required=""></textarea> 
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >Front Camera Specification</label>
						<div class="col-xl-12">                     
						<textarea input name="frontCameraSpecs" type="text" placeholder="Front Camera Specification" class="form-control input-md" required=""></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >Front Camera Features</label>
						<div class="col-xl-12">                     
						<textarea input name="frontCameraFeatures" type="text" placeholder="Front Camera Features" class="form-control input-md" required=""></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >Display Specification</label>
						<div class="col-xl-12">                     
						<textarea input name="displaySpecs" type="text" placeholder="Display Specification" class="form-control input-md" required=""></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >CPU</label>  
						<div class="col-xl-12">
						<textarea input name="cpu" type="text" placeholder="CPU" class="form-control input-md" required=""></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" >Features</label>
						<div class="col-xl-12">                     
						<textarea input name="features" type="text" placeholder="Features" class="form-control input-md" required=""></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >Battery Specification</label>
						<div class="col-xl-12">                     
						<textarea input name="batterySpecs" type="text" placeholder="Battery Specification" class="form-control input-md" required=""></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >Performance Score</label>  
						<div class="col-md-6">
						<input name="performanceScore" type="number" placeholder="Performance Score" class="form-control input-md" required="">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >Main Camera Score</label>  
						<div class="col-md-6">
						<input name="mainCameraScore" type="number" placeholder="Main Camera Score" class="form-control input-md" required="">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >Front Camera Score</label>  
						<div class="col-md-6">
						<input name="frontCameraScore" type="number" placeholder="Front Camera Score" class="form-control input-md" required="">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >Display Score</label>  
						<div class="col-md-6">
						<input name="displayScore" type="number" placeholder="Display Score" class="form-control input-md" required="">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" >Battery Life Score</label>  
						<div class="col-md-6">
						<input name="batteryLifeScore" type="number" placeholder="Battery Life Score" class="form-control input-md" required="">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="anmelden"></label>
						<div class="col-md-8">
						<input type="submit" name="Submit" value="Add" class="btn btn-success">
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</form>
	</body>

	<?php
		//footer
		include ('Footer.php');
	?>
</html>