<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once('User.php');
	require_once('DataBase.php');
	include_once("DBConnection.php");
	session_start();
	$UserID="";
	$user = NULL;
	if(isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) {
		$UserID=$_SESSION['UserID'];
		$DB = new DataBase();
		$user = $DB->getUserById($UserID);
	}
	$result = mysqli_query($connect, "SELECT * FROM orders WHERE customer_id=$UserID");
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
                       User Profile - View Orders
					</h1>
                </div>
            </div>
        </div>
    </div>
	
	<?php
        include ('UserNav.php');
    ?>
    
	<div style="margin: 10px;">
		<div class="card">
            <div class="card-body">
                <table width='100%' border=1>
                    <tr bgcolor='#a4c639'>
                        <td>ID</td>
                        <td>Products / Quantity</td>
                        <td>Total</td>
                        <td>Date Placed Order</td>
                        <td>Status</td>
                        <td>Update</td>
                    </tr>
                    <?php 
                    while($row = mysqli_fetch_assoc($result)) { 
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>"; 
                        echo "<td>";
                        $result2 = mysqli_query($connect, "SELECT * FROM order_items WHERE order_id=".$row['id']);
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            if ($row2["mobile_id"] > 0) {
                                $result3 = mysqli_query($connect, "SELECT * FROM mobile inner join brand on brand.id = mobile.brandID 
                                        WHERE mobile.id=".$row2['mobile_id']);
                            }
                            else {
                                $result3 = mysqli_query($connect, "SELECT * FROM tablet inner join brand on brand.id = tablet.brandID 
                                        WHERE tablet.id=".$row2['tablet_id']);
                            }
                            $row3 = mysqli_fetch_assoc($result3);
                            echo $row3["name"] . "&nbsp" . $row3["model"] . "&nbsp" . " x" . $row2["quantity"] . "<br>";
                        }
                        echo "</td>";
                        echo "<td>".$row["grand_total"]."</td>";
                        echo "<td>".$row["created"]."</td>";
                        echo "<td>".$row["status"]."</td>";
                        if($row["status"]=="Pending"){
                            echo "<td> <br> &nbsp <a class=\"btn btn-danger\" href=\"DeleteOrder.php?id=$row[id]\"onClick=\"return confirm
                            ('Are you sure you want to cancel?')\">Cancel Order</a> <br><br> </td>";  
                        }else{
                            echo "<td> <br> &nbsp &nbsp &nbsp <a style='background-color: #d3d3d3;' class=\"btn btn-info\">Cancel Order</a> 
                            <br><br> </td>";
                        }         
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

	<?php
        //footer
		include ('Footer.php');
	?>
	</body>
</html>