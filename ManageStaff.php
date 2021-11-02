<?php
    include_once("DBConnection.php");
    $result = mysqli_query($connect, "SELECT * FROM staff ORDER BY id DESC");
?>

<html>
	<?php
        session_start();
		include ('Header.php');
	?>       
        
    <div class="jumbotron jumbotron-sm" style="background-color: black;">
        <div class="container" >
            <div class="row">
                <div class="col-sm-15 col-sm-15">
                    <h1 style="color: white; margin-top: 50px; margin-left: 275px;">
                       Staff Panel - Manage Staff Account
					</h1>
                </div>
            </div>
        </div>
    </div>
	
	<?php
        include ('StaffNav.php');
    ?>

    <div style="margin: 10px;">
		<div class="card">
            <div class="card-body">
                <table width='100%' border=0>
                    <tr bgcolor='#a4c639'>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Password</td>
                        <td>Update</td>
                    </tr>
                    <?php 
                        while($res = mysqli_fetch_array($result)) {         
                            echo "<tr>";
                            echo "<td>".$res['username']."</td>";
                            echo "<td>".$res['email']."</td>";
                            echo "<td>".$res['password']."</td>";
                            echo "<td><a class=\"btn btn-info\" href=\"EditStaff.php?id=$res[id]\">Edit</a> </td>";       
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