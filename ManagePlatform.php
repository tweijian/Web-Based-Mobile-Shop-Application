<?php
    include_once("DBConnection.php");
    $result = mysqli_query($connect, "SELECT * FROM platform ORDER BY id DESC");
?>

<html>
	<?php
        //header
        session_start();
		include ('Header.php');
	?>       
        
    <div class="jumbotron jumbotron-sm" style="background-color: black;">
        <div class="container" >
            <div class="row">
                <div class="col-sm-15 col-sm-15">
                    <h1 style="color: white; margin-top: 50px; margin-left: 200px;">
                       Admin Panel - Manage Product Platforms
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
                <a class="btn btn-success" href="AddPlatform.php">Add Product Platforms</a>
                <a class="btn btn-info" href="ManageMobile.php">Back</a>
                <br/><br/>
                <table width='100%' border=0>
                    <tr bgcolor='#a4c639'>
                        <td>ID</td>
                        <td>Platform</td>
                        <td>Update</td>
                    </tr>
                    <?php 
                        while($res = mysqli_fetch_array($result)) {         
                            echo "<tr>";
                            echo "<td>".$res['id']."</td>";
                            echo "<td>".$res['name']."</td>";
                            echo "<td><a class=\"btn btn-danger\" href=\"DeletePlatform.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
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