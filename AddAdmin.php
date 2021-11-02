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
                    Admin Panel - Add Admin Account
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
                    <a class="btn btn-info" href="ManageAdmin.php">Back</a>
                    <br/><br/>
                    <form action="AddAdminData.php" method="post" name="form1">
                        <table width="100%" border="0" style="margin-left:400px;">
                            <tr> 
                                <td><h5>Username</h5></td>
                                <td><br/><input type="text" name="username" placeholder="Input your Username"></td>
                            </tr>
                            <tr> 
                                <td><h5>Email</h5></td>
                                <td><br/><input type="email" name="email" placeholder="Input your Email"></td>
                            </tr>
                            <tr> 
                                <td><h5>Password</h5></td>
                                <td><br/><input type="password" name="password" placeholder="Input your Password"></td>
                            </tr>
                            <tr> 
                                <td></td>
                                <td><br/><br/><input class="btn btn-success" type="submit" name="Submit" value="Add"></td>
                            </tr>
                        </table>
                    </form>
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