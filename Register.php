<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('DataBase.php');
	if((isset($_POST['email'])&& isset($_POST['password'])&& isset($_POST['password'])&& isset($_POST['password'])
			&& isset($_POST['password'])&& isset($_POST['password'])) 
			&& (!empty($_POST['email']) && !empty($_POST['password']))
			&& !empty($_POST['firstName'])&& !empty($_POST['lastName'])
			&& !empty($_POST['username'])&& !empty($_POST['phone'])
			&& !empty($_POST['address'])){
				$Email =($_POST['email']);
				$Password =md5($_POST['password']);
				$FirstName =($_POST['firstName']);
				$Lastname=($_POST['lastName']);
				$Username=($_POST['username']);
				$Phone=($_POST['phone']);
				$Address=($_POST['address']);
	}
?>

<html>
	<?php
		session_start();
		//header
		include ('Header.php');
	?>

	<div class="jumbotron jumbotron-sm" style="background-color: black;">
        <div class="container" >
            <div class="row">
                <div class="col-sm-15 col-sm-15">
                    <h1 style="color: white; margin-top: 50px; margin-left: 500px;">
                       Register
					</h1>
                </div>
            </div>
        </div>
    </div>

	<br/>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-5">
				<div class="panel panel-default">
					<div class="panel-body">
						<a class="btn btn-info" href="login.php">Back</a><br/><br/>
						<form action="RegisterData.php" method="post" name="form1" id="register-form">
							<table width="100%" border="0" style="margin-left:350px;">
								<tr> 
									<td><h5>First Name &nbsp</h5></td>
									<td><br/><input type="text" class="form-control" name="firstName" 
									placeholder="Input your First Name" required/></td>
								</tr>
								<tr> 
									<td><h5>Last Name  &nbsp</h5></td>
									<td><br/><input type="text" class="form-control" name="lastName" 
									placeholder="Input your Last Name" required/></td>
								</tr>
								<tr> 
									<td><h5>Email  &nbsp</h5></td>
									<td><br/><input type="email" class="form-control" name="email" 
									placeholder="Input your Email" required/></td>
								</tr>
								<tr> 
									<td><h5>Username  &nbsp</h5></td>
									<td><br/><input type="text" class="form-control" name="username" 
									placeholder="Input your Username" required/></td>
								</tr>
								<tr> 
									<td><h5>Phone Number  &nbsp</h5></td>
									<td><br/><input type="number" class="form-control" name="phone" 
									placeholder="Input your Phone Number" required/></td>
								</tr>
								<tr> 
									<td><h5>Deliver Address  &nbsp</h5></td>
									<td><br/><textarea input type="text" class="form-control" name="address" 
									placeholder="Input your Delivery Address" required></textarea></td>
								</tr>
								<tr> 
									<td><h5>Password  &nbsp</h5></td>
									<td><br/><input type="password" class="form-control" name="password" 
									placeholder="Input your Password" required/></td>
								</tr>
								<tr> 
									<td></td>
									<td><br/><br/><input class="btn btn-success" type="submit" name="Submit" value="Register"></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br/>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script>
        $("input[name='phone']").on("input", function() {
            this.setCustomValidity("");
            this.value = this.value.substr(0, 10);
        });

        $("#register-form").on("submit", function(e) {
            let phone = $("input[name='phone']")[0];
            if (phone.value.length != 10) {
                phone.setCustomValidity("Phone No. required 10 digits.");
                phone.reportValidity();
                e.preventDefault();
            }
        });
    </script>

	</body>
	<?php
		//footer
		include ('Footer.php');
	?>
</html>