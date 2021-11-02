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
	$result = mysqli_query($connect, "SELECT * FROM user WHERE id='$UserID'");
	while($res = mysqli_fetch_array($result))
	{
		$FirstName = $res['firstName'];
        $LastName = $res['lastName'];
        $Email = $res['email'];
        $Username = $res['username'];
        $Phone = $res['phone'];
        $Address = $res['address'];
	}
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 325px;">
                       User Profile - User Information
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
                <table width='100%' border=0>
                    <tr bgcolor='#a4c639'>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Username</td>
                        <td>Phone Number</td>
                        <td>Delivery Address</td>
                        <td>Update</td>
                    </tr>
                    <?php 
                    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                        echo "<tr>";
                        echo "<td>$FirstName</td>";
                        echo "<td>$LastName</td>";
                        echo "<td>$Email</td>";
                        echo "<td>$Username </td>";
                        echo "<td>$Phone </td>";
                        echo "<td> $Address</td>";
                        echo "<td><a class=\"btn btn-info\" href=\"UserInfoEdit.php?id=$UserID\">Edit</a></td>";       
                    
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