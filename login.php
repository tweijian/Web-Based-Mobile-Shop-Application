<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('DataBase.php');
	if((isset($_POST['email'])&& isset($_POST['password'])) && (!empty($_POST['email'])&& !empty($_POST['password']))){
		$Email =($_POST['email']);
		$Password =md5($_POST['password']);
		$DB = new Database();
		$validation = $DB->loginAsUser($Email, $Password);
		if($validation == "error"){
			echo "<script>alert('Database Connection Failed')</script>";
            echo "<script>window.open('login.php' , '_self')</script>";
		}elseif ($validation == "invalid"){
			echo "<script>alert('Email or Password is invalid. Please try again.')</script>";
			echo "<script>window.open('login.php' , '_self')</script>";
		}else{
			session_start();
			$_SESSION["UserID"] = $validation;
			header('Location: Home.php');
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 500px;">
                       User Login
					</h1>
                </div>
            </div>
        </div>
    </div>

	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Login</h3><br/>
					</div>
					<div class="panel-body">
						<form accept-charset="UTF-8" role="form" action="login.php" method="post">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="yourmail@example.com" name="email" type="email" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" id="mypassword" required>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" onclick="show_password()"><strong>&nbsp Show Password &nbsp &nbsp</strong>
									</label>
									<label>
										<a href="LoginAsAdmin.php">Login as Admin &nbsp &nbsp</a>
									</label>
									<label>
										<a href="Register.php">Register</a>
									</label>
								</div>
								<input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="Login">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	</body>

	<script>
		function show_password(){
			var x = document.getElementById("mypassword");
			if(x.type === "password"){
				x.type = "text";
			}else{
				x.type = "password";
			}
		}
	</script>

	<?php
		//footer
		include ('Footer.php');
	?>
</html>