<?php
    include_once("DBConnection.php");
    $result = mysqli_query($connect, "SELECT * FROM user ORDER BY id DESC");
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 250px;">
                       Admin Panel - Manage User Account
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
                <a class="btn btn-success" href="AddUser.php">Add New Account</a><br/><br/>
                <table width='100%' border=1>
                    <tr bgcolor='#a4c639'>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Username</td>
                        <td>Phone Number</td>
                        <td >Address</td>
                        <td>Update</td>
                    </tr>
                    <?php 
                        while($res = mysqli_fetch_array($result)) {         
                            echo "<tr>";
                            echo "<td>".$res['firstName']."</td>";
                            echo "<td>".$res['lastName']."</td>";
                            echo "<td>".$res['email']."</td>";
                            echo "<td>".$res['username']."</td>";
                            echo "<td>".$res['phone']."</td>";
                            echo "<td>".$res['address']."</td>";
                            echo "<td><a class=\"btn btn-info\" href=\"EditUser.php?id=$res[id]\">Edit</a> | <a class=\"btn btn-danger\" href=\"DeleteUser.php?id=$res[id]\" 
                            onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

    </body>
    <?php
        //footer
		include ('Footer.php');
	?>
</html>