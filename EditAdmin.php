<?php
    include_once("DBConnection.php");
    if(isset($_POST['update'])){   
        $ID = $_POST['id'];
        $Username=$_POST['username'];
        $Password=md5($_POST['password']);
        $Email=$_POST['email']; 
        if(empty($Username) || empty($Password) || empty($Email)) {          
            if(empty($Username)) {
                echo "<font color='red'>Name field is empty.</font><br/>";
            }           
            if(empty($Password)) {
                echo "<font color='red'>Password field is empty.</font><br/>";
            }           
            if(empty($Email)) {
                echo "<font color='red'>Email field is empty.</font><br/>";
            }       
        }else{    
            $result = mysqli_query($connect, "UPDATE admin SET username='$Username',password='$Password',email='$Email' WHERE id=$ID");
            header("Location: ManageAdmin.php");
        }
    }
?>

<?php
    $ID = $_GET['id'];
    $result = mysqli_query($connect, "SELECT * FROM admin WHERE id=$ID");
    while($res = mysqli_fetch_array($result)){
        $Username = $res['username'];
        $Password = $res['password'];
        $Email = $res['email'];
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
                       Admin Panel - Edit Admin Account
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
                <a class="btn btn-info" href="ManageAdmin.php">Back</a>
                <br/><br/>
                <form name="form1" method="post" action="EditAdmin.php">
                    <table  width='100%' border="0">
                        <tr> 
                            <td><h5>Username</h5></td>
                            <td><br/><input type="text" name="username" value="<?php echo $Username;?>"></td>
                        </tr>
                        <tr> 
                            <td><h5>Email</h5></td>
                            <td><br/><input type="email" name="email" value="<?php echo $Email;?>"></td>
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
    <?php
        //footer
		include ('Footer.php');
	?>
</html>