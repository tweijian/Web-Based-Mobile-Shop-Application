<?php
    include_once("DBConnection.php");
    $result = mysqli_query($connect, "SELECT * FROM brand ORDER BY id DESC");
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
                       Admin Panel - Manage Product Brands
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
                <a class="btn btn-success" href="AddBrand.php">Add Product Brands</a>
                <a class="btn btn-info" href="ManageMobile.php">Back</a>
                <br/><br/>
                <table width='100%' border=0>
                    <tr bgcolor='#a4c639'>
                        <td>ID</td>
                        <td>Brand</td>
                        <td>Image</td>
                        <td>Update</td>
                    </tr>
                    <?php 
                    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                    while($res = mysqli_fetch_array($result)) {         
                        echo "<tr>";
                        echo "<td>".$res['id']."</td>";
                        echo "<td>".$res['name']."</td>";
                        echo "<td>".$res['imageUrl']."</td>";
                        echo "<td><a class=\"btn btn-danger\" href=\"DeleteBrand.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
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