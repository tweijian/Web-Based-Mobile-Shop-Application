<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('DataBase.php');
	include_once("DBConnection.php");
	session_start();
	$UserID="";
	$user = NULL;
	if(isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) {
		$UserID=$_SESSION['UserID'];
		$DB = new DataBase();
		$user = $DB->getUserById($UserID);
	}
	$result = mysqli_query($connect, "SELECT * FROM user WHERE id='$UserID'");
	while($res = mysqli_fetch_array($result)){
		$Username = $res['username'];
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 350px;">
                       User Profile - Homepage
					</h1>
                </div>
            </div>
        </div>
    </div>
	
	<?php
        include ('UserNav.php');
    ?>
    
	<div style="margin: 10px;">
		<div class="card">
            <div class="card-body">
				<h1 style="text-align: center;">
					Welcome Back, <?php echo $Username;?>
				</h1>
			</div>
		</div>
	</div>	

	<?php
		//footer
		include ('Footer.php');
	?>
	</body>
</html>