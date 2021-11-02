<?php
    include_once("DBConnection.php");
    if(isset($_POST['update'])){   
        $ID = $_POST['id'];
        $FirstName = $_POST['firstName'];
        $LastName = $_POST['lastName'];
        $Email = $_POST['email'];  
        $Username = $_POST['username'];
        $Phone = $_POST['phone'];
        $Address = $_POST['address'];
        $Password = md5($_POST['password']);
        if(empty($FirstName) || empty($LastName) || empty($Email) || empty($Username) || empty($Phone) || empty($Address) || empty($Password)){          
            if(empty($FirstName)){
                echo "<font color='red'>First Name field is empty.</font><br/>";
            }
            
            if(empty($LastName)){
                echo "<font color='red'>Last Name field is empty.</font><br/>";
            }
            
            if(empty($Email)){
                echo "<font color='red'>Email field is empty.</font><br/>";
            }
            
            if(empty($Username)){
                echo "<font color='red'>Username field is empty.</font><br/>";
            }

            if(empty($Phone)){
                echo "<font color='red'>Phone Number field is empty.</font><br/>";
            }

            if(empty($Address)){
                echo "<font color='red'>Delivery Address field is empty.</font><br/>";
            }
            
            if(empty($Password)){
                echo "<font color='red'>Password field is empty.</font><br/>";
            }  
        }else{    
            $result = mysqli_query($connect, "UPDATE user SET firstName='$FirstName',lastName='$LastName',
            email='$Email',username='$Username',phone='$Phone',address='$Address',password='$Password' WHERE id=$ID");
            header("Location: ManageUser.php");
        }
    }
?>

<?php
    $ID = $_GET['id'];
    $result = mysqli_query($connect, "SELECT * FROM user WHERE id=$ID");
    while($res = mysqli_fetch_array($result)){
        $FirstName = $res['firstName'];
        $LastName = $res['lastName'];
        $Email = $res['email'];
        $Username = $res['username'];
        $Phone = $res['phone'];
        $Address = $res['address'];
        $Password = $res['password'];
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 200px;">
                       Admin Panel - Edit User Account
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
                <a class="btn btn-info" href="ManageUser.php">Back</a>
                <br/><br/>
                <form name="form1" method="post" action="EditUser.php" id="editUser-form">
                    <table  width='100%' border="0">
                        <tr> 
                            <td><h5>First Name</h5></td>
                            <td><br/><input type="text" name="firstName" value="<?php echo $FirstName;?>"></td>
                        </tr>
                        <tr> 
                            <td><h5>Last Name</h5></td>
                            <td><br/><input type="text" name="lastName" value="<?php echo $LastName;?>"></td>
                        </tr>
                        <tr> 
                            <td><h5>Email</h5></td>
                            <td><br/><input type="email" name="email" value="<?php echo $Email;?>"></td>
                        </tr>
                        <tr> 
                            <td><h5>Username</h5></td>
                            <td><br/><input type="text" name="username" value="<?php echo $Username;?>"></td>
                        </tr>
                        <tr> 
                            <td><h5>Phone Number</h5></td>
                            <td><br/><input type="number" name="phone" value="<?php echo $Phone;?>"></td>
                        </tr>
                        <tr> 
                            <td><h5>Deliver Address</h5></td>
                            <td><br/><textarea input type="text" name="address" value=""><?php echo $Address;?></textarea></td>
                        </tr>
                        <tr> 
                            <td><h5>Password</h5></td>
                            <td><br/><input type="password" name="password" value="<?php echo $Password;?>"></td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                            <td><br/><br/><input class="btn btn-success" type="submit" name="update" value="Update"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    </body>

    <script>
        $("input[name='phone']").on("input", function() {
            this.setCustomValidity("");
            this.value = this.value.substr(0, 10);
        });

        $("#editUser-form").on("submit", function(e) {
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