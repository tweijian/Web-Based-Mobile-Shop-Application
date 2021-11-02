<?php 
	require_once('User.php');
	require_once('Mobile.php');
	require_once('Tablet.php');
	require_once('Admin.php');
	require_once('Staff.php');
	require_once('Brand.php');
	require_once('Platform.php');
	require_once('Storage.php');
	class Database{
		private $db_host;
		private $db_user;
		private $db_pass;
		private $db_name;
		function __construct(){
			//init
			$this->db_host = 'localhost';
			$this->db_user = 'root';
			$this->db_pass = '';
			$this->db_name = 'mobileshop';
		}
		
		function loginAsUser($email,$password){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;     
			}
			$sql = "SELECT * FROM `user` WHERE email='$email' AND password='$password'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$conn->close();
					return $ID;
				}
			}else{
				$conn->close();
				return "invalid";
			}
		}
		
		function loginAsAdmin($email,$password){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `admin` WHERE email='$email' AND password='$password'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$conn->close();
					return $ID;
				}
			}else{
				$conn->close();
				return "invalid";
			}
		}

		function loginAsStaff($email,$password){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `staff` WHERE email='$email' AND password='$password'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$conn->close();
					return $ID;
				}
			}else{
				$conn->close();
				return "invalid";
			}
		}
		
		function registerUser(User $User){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$FirstName = $User->FirstName;
			$LastName = $User->LastName;
			$ImageUrl = $User->ImageURL;
			$Email = $User->EMail;
			$Username = $User->Username;
			$Password = $User->Password;
			
			$sql = "SELECT * FROM `user` WHERE email='$Email'";
			$result = $conn->query($sql);
			//if there are one or more results then user exists
			if ($result->num_rows > 0) {
				$conn->close();
				return "exist";
			}else{
				$sql = "INSERT INTO user (firstName,lastName,imageUrl,email,username,password)
				VALUES ('$FirstName','$LastName','$ImageUrl','$Email','$Username','$Password')";
				if($conn->query($sql)){
					$conn->close();
					return "valid";
				}else{
					$conn->close();
					return "error";
				}
			}
		}
		
		function getUserById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `user` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$FirstName = $row["firstName"];
					$LastName = $row["lastName"];
					$Email = $row["email"];
					$Username = $row["username"];
					$Password = $row["password"];
					$user = new User($ID, $FirstName, $LastName, $Email, $Username, $Password);
					$conn->close();
					return $user;
				}
			}else{
				$conn->close();
				return "invalid";
			}
		}		
		
		function getAdminById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `admin` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Username = $row["username"];
					$Password = $row["password"];
					$Email = $row["email"];
					$admin = new Admin($ID, $Password, $Username, $Email);
					$conn->close();
					return $admin;
				}
			}else{
				$conn->close();
				return "invalid";
			}
		}

		function getStaffById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `staff` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Username = $row["username"];
					$Password = $row["password"];
					$Email = $row["email"];
					$staff = new Staff($ID, $Password, $Username, $Email);
					$conn->close();
					return $staff;
				}
			}else{
				$conn->close();
				return "invalid";
			}
		}
				
		function editMobile(Mobile $mobile){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			
			$id = $mobile->ID;
			$model = $mobile->Model;
			$brandID = $mobile->BrandID;
			$price = $mobile->Price;
			$releaseDate = $mobile->ReleaseDate;
			$discountRate = $mobile->DiscountRate;
			$mainCameraSpecs = $mobile->MainCameraSpecs;
			$mainCameraFeatures = $mobile->MainCameraFeatures;
			$frontCameraSpecs = $mobile->FrontCameraSpecs;
			$frontCameraFeatures = $mobile->FrontCameraFeatures;
			$displaySpecs = $mobile->DisplaySpecs;
			$memorySpecs = $mobile->MemorySpecs;
			$networkSpecs = $mobile->NetworkSpecs;
			$platformID = $mobile->PlatformID;
			$cpu = $mobile->CPU;
			$features = $mobile->Features;
			$storageID = $mobile->StorageID;
			$batterySpecs = $mobile->BatterySpecs;
			$performanceScore = $mobile->PerformanceScore;
			$mainCameraScore = $mobile->MainCameraScore;
			$frontCameraScore = $mobile->FrontCameraScore;
			$displayScore = $mobile->DisplayScore;
			$batteryLifeScore = $mobile->BatteryLifeScore;
			
			$sql = "UPDATE mobile SET model='$model',brandID='$brandID',price='$price',releaseDate='$releaseDate',
			discountRate='$discountRate',mainCameraSpecs='$mainCameraSpecs',mainCameraFeatures='$mainCameraFeatures',
			frontCameraSpecs='$frontCameraSpecs',frontCameraFeatures='$frontCameraFeatures',displaySpecs='$displaySpecs',
			memorySpecs='$memorySpecs',networkSpecs='$networkSpecs',platformID='$platformID', storageID='$storageID',cpu='$cpu',features='$features',
			batterySpecs='$batterySpecs',performanceScore='$performanceScore',mainCameraScore='$mainCameraScore',
			frontCameraScore = '$frontCameraScore',displayScore='$displayScore',batteryLifeScore='$batteryLifeScore' WHERE id=$id";
			if($conn->query($sql)){
				$conn->close();
				return "valid";
			}else{
				$error = mysqli_error($conn);
				$conn->close();
				return $error;
			}
		}
		
		function addBrand(Brand $brand){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$name = $brand->Name;
			$image = $brand->ImageUrl;
			$sql = "INSERT INTO brand (name,imageUrl) VALUES ('$name','$image')";
			if($conn->query($sql)){
				$conn->close();
				return "valid";
			}else{
				$conn->close();
				return "error";
			}
		}
		
		function getBrands(){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `brand`";
			$brands = array();
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Name = $row["name"];
					$ImageUrl = $row["imageUrl"];
					$brand = new Brand($ID, $Name,$ImageUrl);
					array_push($brands,$brand);
				}
				return $brands;
			}
			return 0;
		}
		
		function getBrandById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `brand` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Name = $row["name"];
					$ImageUrl = $row["imageUrl"];
					$brand = new Brand($ID, $Name,$ImageUrl);
				}
				return $brand;
			}
			return 0;
		}

		function addStorage(Storage $storage){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$name = $storage->Name;
			$sql = "INSERT INTO storage (name) VALUES ('$name')";
			if($conn->query($sql)){
				$conn->close();
				return "valid";
			}else{
				$conn->close();
				return "error";
			}
		}
		
		function getStorages(){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `storage`";
			$storages = array();
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Name = $row["name"];
					$storage = new Storage($ID, $Name);
					array_push($storages,$storage);
				}
				return $storages;
			}
			return 0;
		}
		
		function getStorageById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `storage` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Name = $row["name"];
					$storage = new Storage($ID, $Name);
				}
				return $storage;
			}
			return 0;
		}

		function addPlatform(Platform $platform){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$name = $platform->Name;
			$sql = "INSERT INTO platform (name) VALUES ('$name')";
			if($conn->query($sql)){
				$conn->close();
				return "valid";
			}else{
				$conn->close();
				return "error";
			}
		}
		
		function getPlatforms(){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `platform`";
			$platforms = array();
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Name = $row["name"];
					$platform = new Platform($ID, $Name);
					array_push($platforms,$platform);
				}
				return $platforms;
			}
			return 0;
		}
		
		function getPlatformById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `platform` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$Name = $row["name"];
					$platform = new Platform($ID, $Name);
				}
				return $platform;
			}
			return 0;
		}
		
		function addMobile(Mobile $mobile){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$id = $mobile->ID;
			$model = $mobile->Model;
			$brandID = $mobile->BrandID;
			$price = $mobile->Price;
			$releaseDate = $mobile->ReleaseDate;
			$discountRate = $mobile->DiscountRate;
			$imageUrl = $mobile->ImageUrl;
			$mainCameraSpecs = $mobile->MainCameraSpecs;
			$mainCameraFeatures = $mobile->MainCameraFeatures;
			$frontCameraSpecs = $mobile->FrontCameraSpecs;
			$frontCameraFeatures = $mobile->FrontCameraFeatures;
			$displaySpecs = $mobile->DisplaySpecs;
			$memorySpecs = $mobile->MemorySpecs;
			$networkSpecs = $mobile->NetworkSpecs;
			$platformID = $mobile->PlatformID;
			$cpu = $mobile->CPU;
			$features = $mobile->Features;
			$storageID = $mobile->StorageID;
			$batterySpecs = $mobile->BatterySpecs;
			$performanceScore = $mobile->PerformanceScore;
			$mainCameraScore = $mobile->MainCameraScore;
			$frontCameraScore = $mobile->FrontCameraScore;
			$displayScore = $mobile->DisplayScore;
			$batteryLifeScore = $mobile->BatteryLifeScore;
			
			$sql = "INSERT INTO mobile (model, brandID, price, releaseDate, discountRate, mobileUrl, mainCameraSpecs, 
					memorySpecs, networkSpecs, platformID, cpu, features, storageID, mainCameraFeatures, frontCameraSpecs, frontCameraFeatures, 
					displaySpecs, batterySpecs, performanceScore, mainCameraScore, frontCameraScore, displayScore, batteryLifeScore)
				VALUES ('$model', '$brandID', '$price', '$releaseDate', '$discountRate', '$imageUrl', '$mainCameraSpecs', 
					'$memorySpecs', '$networkSpecs', '$platformID', '$cpu', '$features', '$storageID', '$mainCameraFeatures', '$frontCameraSpecs', '$frontCameraFeatures', 
					'$displaySpecs', '$batterySpecs', '$performanceScore', '$mainCameraScore', '$frontCameraScore', '$displayScore', '$batteryLifeScore')";
			
			if($conn->query($sql)){
				$conn->close();
				return "valid";
			}else{
				$error = mysqli_error($conn);
				$conn->close();
				return $error;
			}
		}

		
		
		function getMobileById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `mobile` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$model = $row["model"];
					$brandID = $row["brandID"];
					$price = $row["price"];
					$releaseDate = $row["releaseDate"];
					$discountRate = $row["discountRate"];
					$imageUrl = $row["mobileUrl"];
					$mainCameraSpecs = $row["mainCameraSpecs"];
					$mainCameraFeatures = $row["mainCameraFeatures"];
					$frontCameraSpecs = $row["frontCameraSpecs"];
					$frontCameraFeatures = $row["frontCameraFeatures"];
					$displaySpecs = $row["displaySpecs"];
					$memorySpecs = $row["memorySpecs"];
					$networkSpecs = $row["networkSpecs"];
					$platformID = $row["platformID"];
					$storageID = $row["storageID"];
					$cpu = $row["cpu"];
					$features = $row["features"];
					$batterySpecs = $row["batterySpecs"];
					$performanceScore = $row["performanceScore"];
					$mainCameraScore = $row["mainCameraScore"];
					$frontCameraScore = $row["frontCameraScore"];
					$displayScore = $row["displayScore"];
					$batteryLifeScore = $row["batteryLifeScore"];
					$mobile = new Mobile($ID, $model, $brandID, $price, $releaseDate, $discountRate, $imageUrl,
							$mainCameraSpecs, $mainCameraFeatures, $frontCameraSpecs, $frontCameraFeatures, 
							$displaySpecs, $memorySpecs, $networkSpecs, $platformID, $storageID, $cpu, $features,
							$batterySpecs, $performanceScore, $mainCameraScore, $frontCameraScore, $displayScore, $batteryLifeScore);
				}
				return $mobile;
			}
			return 0;
		}
		
		function getMobilesAsend(){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `mobile`";
			$Mobiles = array();
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$model = $row["model"];
					$brandID = $row["brandID"];
					$price = $row["price"];
					$releaseDate = $row["releaseDate"];
					$discountRate = $row["discountRate"];
					$imageUrl = $row["mobileUrl"];
					$mainCameraSpecs = $row["mainCameraSpecs"];
					$mainCameraFeatures = $row["mainCameraFeatures"];
					$frontCameraSpecs = $row["frontCameraSpecs"];
					$frontCameraFeatures = $row["frontCameraFeatures"];
					$displaySpecs = $row["displaySpecs"];
					$memorySpecs = $row["memorySpecs"];
					$networkSpecs = $row["networkSpecs"];
					$platformID = $row["platformID"];
					$storageID = $row["storageID"];
					$cpu = $row["cpu"];
					$features = $row["features"];
					$batterySpecs = $row["batterySpecs"];
					$performanceScore = $row["performanceScore"];
					$mainCameraScore = $row["mainCameraScore"];
					$frontCameraScore = $row["frontCameraScore"];
					$displayScore = $row["displayScore"];
					$batteryLifeScore = $row["batteryLifeScore"];
					$mobile = new Mobile($ID, $model, $brandID, $price, $releaseDate, $discountRate, $imageUrl,
							$mainCameraSpecs, $mainCameraFeatures, $frontCameraSpecs, $frontCameraFeatures, 
							$displaySpecs, $memorySpecs, $networkSpecs, $platformID, $storageID, $cpu, $features,
							$batterySpecs, $performanceScore, $mainCameraScore, $frontCameraScore, $displayScore, $batteryLifeScore);
					
					array_push($Mobiles,$mobile);
				}
				return $Mobiles;
			}
			return 0;
		}
		
		function editTablet(Tablet $tablet){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			
			$id = $tablet->ID;
			$model = $tablet->Model;
			$brandID = $tablet->BrandID;
			$price = $tablet->Price;
			$releaseDate = $tablet->ReleaseDate;
			$discountRate = $tablet->DiscountRate;
			$mainCameraSpecs = $tablet->MainCameraSpecs;
			$mainCameraFeatures = $tablet->MainCameraFeatures;
			$frontCameraSpecs = $tablet->FrontCameraSpecs;
			$frontCameraFeatures = $tablet->FrontCameraFeatures;
			$displaySpecs = $tablet->DisplaySpecs;
			$memorySpecs = $tablet->MemorySpecs;
			$networkSpecs = $tablet->NetworkSpecs;
			$platformID = $tablet->PlatformID;
			$cpu = $tablet->CPU;
			$features = $tablet->Features;
			$storageID = $tablet->StorageID;
			$batterySpecs = $tablet->BatterySpecs;
			$performanceScore = $tablet->PerformanceScore;
			$mainCameraScore = $tablet->MainCameraScore;
			$frontCameraScore = $tablet->FrontCameraScore;
			$displayScore = $tablet->DisplayScore;
			$batteryLifeScore = $tablet->BatteryLifeScore;
			
			$sql = "UPDATE tablet SET model='$model',brandID='$brandID',price='$price',releaseDate='$releaseDate',
			discountRate='$discountRate',mainCameraSpecs='$mainCameraSpecs',mainCameraFeatures='$mainCameraFeatures',
			frontCameraSpecs='$frontCameraSpecs',frontCameraFeatures='$frontCameraFeatures',displaySpecs='$displaySpecs',
			memorySpecs='$memorySpecs',networkSpecs='$networkSpecs',platformID='$platformID', storageID='$storageID',cpu='$cpu',features='$features',
			batterySpecs='$batterySpecs',performanceScore='$performanceScore',mainCameraScore='$mainCameraScore',
			frontCameraScore = '$frontCameraScore',displayScore='$displayScore',batteryLifeScore='$batteryLifeScore' WHERE id=$id";
			if($conn->query($sql)){
				$conn->close();
				return "valid";
			}else{
				$error = mysqli_error($conn);
				$conn->close();
				return $error;
			}
		}

		function addTablet(Tablet $tablet){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$id = $tablet->ID;
			$model = $tablet->Model;
			$brandID = $tablet->BrandID;
			$price = $tablet->Price;
			$releaseDate = $tablet->ReleaseDate;
			$discountRate = $tablet->DiscountRate;
			$imageUrl = $tablet->ImageUrl;
			$mainCameraSpecs = $tablet->MainCameraSpecs;
			$mainCameraFeatures = $tablet->MainCameraFeatures;
			$frontCameraSpecs = $tablet->FrontCameraSpecs;
			$frontCameraFeatures = $tablet->FrontCameraFeatures;
			$displaySpecs = $tablet->DisplaySpecs;
			$memorySpecs = $tablet->MemorySpecs;
			$networkSpecs = $tablet->NetworkSpecs;
			$platformID = $tablet->PlatformID;
			$cpu = $tablet->CPU;
			$features = $tablet->Features;
			$storageID = $tablet->StorageID;
			$batterySpecs = $tablet->BatterySpecs;
			$performanceScore = $tablet->PerformanceScore;
			$mainCameraScore = $tablet->MainCameraScore;
			$frontCameraScore = $tablet->FrontCameraScore;
			$displayScore = $tablet->DisplayScore;
			$batteryLifeScore = $tablet->BatteryLifeScore;
			
			$sql = "INSERT INTO tablet (model, brandID, price, releaseDate, discountRate, tabletUrl, mainCameraSpecs, 
					memorySpecs, networkSpecs, platformID, cpu, features, storageID, mainCameraFeatures, frontCameraSpecs, frontCameraFeatures, 
					displaySpecs, batterySpecs, performanceScore, mainCameraScore, frontCameraScore, displayScore, batteryLifeScore)
				VALUES ('$model', '$brandID', '$price', '$releaseDate', '$discountRate', '$imageUrl', '$mainCameraSpecs', 
					'$memorySpecs', '$networkSpecs', '$platformID', '$cpu', '$features', '$storageID', '$mainCameraFeatures', '$frontCameraSpecs', '$frontCameraFeatures', 
					'$displaySpecs', '$batterySpecs', '$performanceScore', '$mainCameraScore', '$frontCameraScore', '$displayScore', '$batteryLifeScore')";
			
			if($conn->query($sql)){
				$conn->close();
				return "valid";
			}else{
				$conn->close();
				return "error";
			}
		}

		
		
		function getTabletById($id){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `tablet` WHERE id='$id'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$model = $row["model"];
					$brandID = $row["brandID"];
					$price = $row["price"];
					$releaseDate = $row["releaseDate"];
					$discountRate = $row["discountRate"];
					$imageUrl = $row["tabletUrl"];
					$mainCameraSpecs = $row["mainCameraSpecs"];
					$mainCameraFeatures = $row["mainCameraFeatures"];
					$frontCameraSpecs = $row["frontCameraSpecs"];
					$frontCameraFeatures = $row["frontCameraFeatures"];
					$displaySpecs = $row["displaySpecs"];
					$memorySpecs = $row["memorySpecs"];
					$networkSpecs = $row["networkSpecs"];
					$platformID = $row["platformID"];
					$storageID = $row["storageID"];
					$cpu = $row["cpu"];
					$features = $row["features"];
					$batterySpecs = $row["batterySpecs"];
					$performanceScore = $row["performanceScore"];
					$mainCameraScore = $row["mainCameraScore"];
					$frontCameraScore = $row["frontCameraScore"];
					$displayScore = $row["displayScore"];
					$batteryLifeScore = $row["batteryLifeScore"];
					$tablet = new Tablet($ID, $model, $brandID, $price, $releaseDate, $discountRate, $imageUrl,
							$mainCameraSpecs, $mainCameraFeatures, $frontCameraSpecs, $frontCameraFeatures, 
							$displaySpecs, $memorySpecs, $networkSpecs, $platformID, $storageID, $cpu, $features,
							$batterySpecs, $performanceScore, $mainCameraScore, $frontCameraScore, $displayScore, $batteryLifeScore);
				}
				return $tablet;
			}
			return 0;
		}
		
		function getTabletsAsend(){
			$conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
			if (mysqli_connect_errno()){
				return "error" ;
			}
			$sql = "SELECT * FROM `tablet`";
			$Tablets = array();
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$ID = $row["id"];
					$model = $row["model"];
					$brandID = $row["brandID"];
					$price = $row["price"];
					$releaseDate = $row["releaseDate"];
					$discountRate = $row["discountRate"];
					$imageUrl = $row["tabletUrl"];
					$mainCameraSpecs = $row["mainCameraSpecs"];
					$mainCameraFeatures = $row["mainCameraFeatures"];
					$frontCameraSpecs = $row["frontCameraSpecs"];
					$frontCameraFeatures = $row["frontCameraFeatures"];
					$displaySpecs = $row["displaySpecs"];
					$memorySpecs = $row["memorySpecs"];
					$networkSpecs = $row["networkSpecs"];
					$platformID = $row["platformID"];
					$storageID = $row["storageID"];
					$cpu = $row["cpu"];
					$features = $row["features"];
					$batterySpecs = $row["batterySpecs"];
					$performanceScore = $row["performanceScore"];
					$mainCameraScore = $row["mainCameraScore"];
					$frontCameraScore = $row["frontCameraScore"];
					$displayScore = $row["displayScore"];
					$batteryLifeScore = $row["batteryLifeScore"];
					$tablet = new Tablet($ID, $model, $brandID, $price, $releaseDate, $discountRate, $imageUrl,
							$mainCameraSpecs, $mainCameraFeatures, $frontCameraSpecs, $frontCameraFeatures, 
							$displaySpecs, $memorySpecs, $networkSpecs, $platformID, $storageID, $cpu, $features,
							$batterySpecs, $performanceScore, $mainCameraScore, $frontCameraScore, $displayScore, $batteryLifeScore);
					
					array_push($Tablets,$tablet);
				}
				return $Tablets;
			}
			return 0;
		}
	}
?>