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
                    <h1 style="color: white; margin-top: 50px; margin-left: 250px;">
                    Admin Panel - Add User Account
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
                <div class="col-md-6 col-md-offset-5">
                    <a class="btn btn-info" href="ManageUser.php">Back</a>
                    <br/><br/>
                    <form action="AddUserData.php" method="post" name="form1" id="addUser-form">
                        <table width="100%" border="0" style="margin-left:400px;">
                            <tr> 
                                <td><h5>First Name &nbsp</h5></td>
                                <td><br/><input type="text" class="form-control" name="firstName" placeholder="Input your First Name" required/></td>
                            </tr>
                            <tr> 
                                <td><h5>Last Name  &nbsp</h5></td>
                                <td><br/><input type="text" class="form-control" name="lastName" placeholder="Input your Last Name" required/></td>
                            </tr>
                            <tr> 
                                <td><h5>Email  &nbsp</h5></td>
                                <td><br/><input type="email" class="form-control" name="email" placeholder="Input your Email" required/></td>
                            </tr>
                            <tr> 
                                <td><h5>Username  &nbsp</h5></td>
                                <td><br/><input type="text" class="form-control" name="username" placeholder="Input your Username" required/></td>
                            </tr>
                            <tr> 
                                <td><h5>Phone Number  &nbsp</h5></td>
                                <td><br/><input type="number" class="form-control" name="phone" placeholder="Input your Phone Number" required/></td>
                            </tr>
                            <tr> 
                                <td><h5>Deliver Address  &nbsp</h5></td>
                                <td><br/><textarea input type="text" class="form-control" name="address" placeholder="Input your Delivery Address" required></textarea></td>
                            </tr>
                            <tr> 
                                <td><h5>Password  &nbsp</h5></td>
                                <td><br/><input type="password" class="form-control" name="password" placeholder="Input your Password" required/></td>
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
    </body>

    <script>
        $("input[name='phone']").on("input", function() {
            this.setCustomValidity("");
            this.value = this.value.substr(0, 10);
        });

        $("#addUser-form").on("submit", function(e) {
            let phone = $("input[name='phone']")[0];
            if (phone.value.length != 10) {
                phone.setCustomValidity("Phone No. required 10 digits.");
                phone.reportValidity();
                e.preventDefault();
            }
        });
    </script>

    <?php
        //footer
		include ('Footer.php');
	?>
</html>