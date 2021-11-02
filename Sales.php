<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('DataBase.php');
	include_once("DBConnection.php");
	session_start();
	$result = mysqli_query($connect, "SELECT * FROM orders");
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 350px;">
                       Admin Panel - Sales
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
                <table width='100%' border=1>
                    <tr bgcolor='#a4c639'>
                        <td>Order ID</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Phone No.</td>
                        <td>Delivery Address</td>
                        <td>Products / Quantity</td>
                        <td>Total</td>
                        <td>Date Placed Order</td>
                        <td>Status</td>
                        <td>Update</td>
                    </tr>

                    <?php 
                        while($row = mysqli_fetch_assoc($result)){
                            $row4 = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM user WHERE id=" . $row["customer_id"]));
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>"; // order id
                            echo "<td>".$row4["username"]."</td>"; // order id
                            echo "<td>".$row4["email"]."</td>"; // order id
                            echo "<td>".$row4["phone"]."</td>"; // order id
                            echo "<td>".$row4["address"]."</td>"; // order id
                            echo "<td>";
                            $result2 = mysqli_query($connect, "SELECT * FROM order_items WHERE order_id=".$row['id']);
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                if ($row2["mobile_id"] > 0) {
                                    $result3 = mysqli_query($connect, "SELECT * FROM mobile inner join brand on brand.id = mobile.brandID WHERE mobile.id=".$row2['mobile_id']);
                                }
                                else {
                                    $result3 = mysqli_query($connect, "SELECT * FROM tablet inner join brand on brand.id = tablet.brandID WHERE tablet.id=".$row2['tablet_id']);
                                }
                                $row3 = mysqli_fetch_assoc($result3);
                                echo $row3["name"] . "&nbsp" . $row3["model"] . "&nbsp" . " x" . $row2["quantity"] . "<br>";
                            }
                            echo "</td>";
                            echo "<td>".$row["grand_total"]."</td>";
                            echo "<td>".$row["created"]."</td>";
                            echo "<td>".$row["status"]."</td>";
                            if($row["status"]=="Pending"){
                                echo "<td> <br> &nbsp &nbsp &nbsp <a class=\"btn btn-info\" href=\"Delivered.php?id=$row[id]\">Delivered</a> <br><br> 
                                &nbsp <a class=\"btn btn-danger\" href=\"DeleteSales.php?id=$row[id]\"onClick=\"return confirm('Are you sure you want to cancel?')\">Cancel Order</a> <br><br> </td>"; 
                            }else{
                                echo "<td> <br> &nbsp &nbsp &nbsp <a style='background-color: #d3d3d3;' class=\"btn btn-info\">Delivered</a> <br><br> 
                                &nbsp <a style='background-color: #d3d3d3;' class=\"btn btn-info\">Cancel Order</a> <br><br> </td>"; 
                            } 
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