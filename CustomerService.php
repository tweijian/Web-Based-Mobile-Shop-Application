<?php
    session_start();
    include("DBConnection.php");
    if(isset($_GET["staffId"])){
        $_SESSION["staffId"] = $_GET["staffId"];
        header("location: StaffChatbox.php");
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 300px;">
                       Staff Panel - Customer Service
					</h1>
                </div>
            </div>
        </div>
    </div>
	
	<?php
        include ('StaffNav.php');
    ?>
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="margin-left: 140px;">Customer Service</h4>
            </div>
            <div class="modal-body">             
                <?php
                    $staffs = mysqli_query($connect,"SELECT * FROM staff") or die("Failed to query database" );
                    while($staff = mysqli_fetch_assoc($staffs))
                    {
                        echo '
                            
                            <a style="margin-left: 180px;" href="StaffChatbox.php?staffId='.$staff["id"].'" class="btn btn-success">Enter to chat</a>
                            
                        
                        ';
                    }
                ?>              
            </div>
        </div>
    </div>

	</body>
    <?php
        //footer
		include ('Footer.php');
	?>
</html>