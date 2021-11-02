<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('Brand.php');
	require_once('Platform.php');
	require_once('Storage.php');
	require_once('DataBase.php');
	require_once('Mobile.php');
	session_start();
	$mobile = null;
	$DB = new DataBase();
	$brands = $DB->getBrands();
	$platforms = $DB->getPlatforms();
	$storages = $DB->getStorages();
	if(!empty($_POST["save"])){
		$id = $_POST["id"];		
		$model = $_POST["model"];
		$brand = $_POST["brand"];
		$price = $_POST["price"];
		$releaseDate = $_POST["releaseDate"];
		$discountRate = $_POST["discountRate"];
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
		$mobile = new Mobile($id, $model, $brand, $price, $releaseDate, $discountRate, NULL,
				$mainCameraSpecs, $mainCameraFeatures, $frontCameraSpecs, $frontCameraFeatures, 
				$displaySpecs, $memorySpecs, $networkSpecs, $platform, $storage, $cpu, $features,
				$batterySpecs, $performanceScore, $mainCameraScore, $frontCameraScore, $displayScore, $batteryLifeScore);
		
		$location = "MobilesPictures/";
		$DB->editMobile($mobile);
		header('Location: ManageMobile.php');
	}
	elseif((isset($_SESSION['AdminID']) && !empty($_SESSION['AdminID'])) && (isset($_POST['ID']) && !empty($_POST['ID']))) {
		$DB = new DataBase();
		$id = $_POST['ID'];
		$mobile = $DB->getMobileById($id);
	}else{
		header('Location: ManageMobile.php');
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 200px;">
                       Admin Panel - Edit Mobile Phone Product
					</h1>
                </div>
            </div>
        </div>
    </div>

	<?php
        include ('AdminNav.php');
    ?>

	<body>
		<form class="form-horizontal" action="EditMobile.php" method="post">
			<fieldset style="margin: 20px;">
				<h2><center>Edit Mobile</center></h2>
				<input type="hidden" value="<?php echo $mobile->ID?>" name="id">

				<div class='card'>
					<div class='card-body'>
						<div class="form-group">
						<label class="col-md-4 control-label" for="name">Model</label>  
							<div class="col-md-4">
								<input name="model" type="text" placeholder="Model" class="form-control input-md" value="<?php echo $mobile->Model?>" required="">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="name">Brand</label>  
							<div class="col-md-4">
								<select name="brand" class="form-control">
									<?php 
										foreach ($brands as $b){
											if($mobile->BrandID==$b->ID){
											echo "<option value='$b->ID' selected >$b->Name</option>";
											}
											else{
											echo "<option value='$b->ID'>$b->Name</option>";
											}
										}
									?>
								</select>
							</div>
						</div>
						<br/>
						
						<div class="form-group">
						<label class="col-md-4 control-label">Price</label>  
							<div class="col-md-4">
								<input name="price" type="number" placeholder="Price" class="form-control input-md" value="<?php echo $mobile->Price?>" required="">
							</div>
						</div>
						
						<div class="form-group">
						<label class="col-md-4 control-label" >Release Date</label>  
							<div class="col-md-4">
								<input name="releaseDate" type="date" class="form-control" value="<?php echo $mobile->ReleaseDate?>" required="" >
							</div>
						</div>
						
						<div class="form-group">
						<label class="col-md-4 control-label" >Discount Rate</label>  
							<div class="col-md-4">
								<input name="discountRate" type="number" placeholder="Discount Rate" value="<?php echo $mobile->DiscountRate?>" class="form-control input-md" required="">
							</div>
						</div>

						<div class="form-group">
						<label class="col-md-4 control-label" >Memory Specification</label>  
							<div class="col-md-4">
								<input name="memorySpecs" type="text" placeholder="Memory Specification" value="<?php echo $mobile->MemorySpecs?>" class="form-control input-md" required="">
							</div>
						</div>
						
						<div class="form-group">
						<label class="col-md-4 control-label" >Network Specification</label>  
							<div class="col-md-4">
								<input name="networkSpecs" type="text" placeholder="Network Specification" value="<?php echo $mobile->NetworkSpecs?>" class="form-control input-md" required="">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="name">Platform</label>  
							<div class="col-md-4">
								<select name="platform" class="form-control">
									<?php 
										foreach ($platforms as $p){
											if($mobile->PlatformID==$p->ID){
											echo "<option value='$p->ID' selected >$p->Name</option>";
											}
											else{
											echo "<option value='$p->ID'>$p->Name</option>";
											}
										}
									?>
								</select>
							</div>
						</div>
						<br/>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="name">Storage</label>  
							<div class="col-md-4">
								<select name="storage" class="form-control">
									<?php 
										foreach ($storages as $s){
											if($mobile->StorageID==$s->ID){
											echo "<option value='$s->ID' selected >$s->Name</option>";
											}
											else{
											echo "<option value='$s->ID'>$s->Name</option>";
											}
										}
									?>
								</select>
							</div>
						</div>
						<br/>
						
						<div class="form-group">
						<label class="col-md-4 control-label" >Main Camera Specification</label>  
							<div class="col-xl-12">
								<textarea input name="mainCameraSpecs" type="text" placeholder="Main Camera Specification" value="" class="form-control input-md" required=""><?php echo $mobile->MainCameraSpecs?></textarea>
							</div>
						</div>
	
						<div class="form-group">
						<label class="col-md-4 control-label" >Main Camera Features</label>  
							<div class="col-xl-12">
								<textarea input name="mainCameraFeatures" type="text" placeholder="Main Camera Features" value="" class="form-control input-md" required=""><?php echo $mobile->MainCameraFeatures?></textarea>
							</div>
						</div>
							
						<div class="form-group">
						<label class="col-md-4 control-label" >Front Camera Specification</label>  
							<div class="col-xl-12">
								<textarea input name="frontCameraSpecs" type="text" placeholder="Front Camera Specification" value="" class="form-control input-md" required=""><?php echo $mobile->FrontCameraSpecs?></textarea>
							</div>
						</div>
	
						<div class="form-group">
						<label class="col-md-4 control-label" >Front Camera Features</label>  
							<div class="col-xl-12">
								<textarea input name="frontCameraFeatures" type="text" placeholder="Front Camera Features" value="" class="form-control input-md" required=""><?php echo $mobile->FrontCameraFeatures?></textarea>
							</div>
						</div>
		
						<div class="form-group">
						<label class="col-md-4 control-label" >Dsiplay Specification</label>  
							<div class="col-xl-12">
								<textarea input name="displaySpecs" type="text" placeholder="Dsiplay Specification" value="" class="form-control input-md" required=""><?php echo $mobile->DisplaySpecs?></textarea>
							</div>
						</div>
			
						<div class="form-group">
						<label class="col-md-4 control-label" >CPU</label>  
							<div class="col-xl-12">
								<textarea input name="cpu" type="text" placeholder="CPU" value="" class="form-control input-md" required=""><?php echo $mobile->CPU?></textarea>
							</div>
						</div>
											
						<div class="form-group">
						<label class="col-md-4 control-label" >Features</label>
							<div class="col-xl-12">                     
								<textarea input name="features" type="text" placeholder="Features"  value="" class="form-control input-md" required=""><?php echo $mobile->Features?></textarea>
							</div>
						</div>
					
						<div class="form-group">
						<label class="col-md-4 control-label" >Battery Specification</label>  
							<div class="col-xl-12">
								<textarea input name="batterySpecs" type="text" placeholder="Battery Specification" value="" class="form-control input-md" required=""><?php echo $mobile->BatterySpecs?></textarea>
							</div>
						</div>
					
						<div class="form-group">
						<label class="col-md-4 control-label" >Performance Score</label>  
							<div class="col-md-4">
								<input name="performanceScore" type="number" placeholder="Performance Score" value="<?php echo $mobile->PerformanceScore?>" class="form-control input-md" required="">
							</div>
						</div>
											
						<div class="form-group">
						<label class="col-md-4 control-label" >Main Camera Score</label>  
							<div class="col-md-4">
								<input name="mainCameraScore" type="number" placeholder="Main Camera Score" value="<?php echo $mobile->MainCameraScore?>" class="form-control input-md" required="">
							</div>
						</div>
					
						<div class="form-group">
						<label class="col-md-4 control-label" >Front Camera Score</label>  
							<div class="col-md-4">
								<input name="frontCameraScore" type="number" placeholder="Front Camera Score" value="<?php echo $mobile->FrontCameraScore?>" class="form-control input-md" required="">
							</div>
						</div>
					
						<div class="form-group">
						<label class="col-md-4 control-label" >Display Score</label>  
							<div class="col-md-4">
								<input name="displayScore" type="number" placeholder="Display Score" value="<?php echo $mobile->DisplayScore?>" class="form-control input-md" required="">
							</div>
						</div>
					
						<div class="form-group">
						<label class="col-md-4 control-label" >Battery Life Score</label>  
							<div class="col-md-4">
								<input name="batteryLifeScore" type="number" placeholder="Battery Life Score" value="<?php echo $mobile->BatteryLifeScore?>" class="form-control input-md" required="" >
							</div>
						</div>
					
						<div class="form-group">
							<div class="col-md-8">
								<input type="submit" name="save" value="Save" class="btn btn-success">
								<a class="btn btn-info" href="ManageMobile.php">Back</a>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>

	</body>
	<?php
		//footer
		include ('Footer.php');
	?>
</html>