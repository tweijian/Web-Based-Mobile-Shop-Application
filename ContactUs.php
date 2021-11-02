<?php
    session_start();
    include("DBConnection.php");
    if(isset($_GET["userId"])){
        $_SESSION["userId"] = $_GET["userId"];
        header("location: chatbox.php");
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 400px;">
                        Customer Service</h1>
                </div>
            </div>
        </div>
    </div>
	
    <div style="margin: 20px;">
        <div class='card'>
            <div class='card-body' style="text-align: center;">
                <h4>
                    Please Sign In to get further assists on your questions, problems or requests. It is our pleasure to serve you. 
                </h4>
                <br/><br/>
                <a class="btn btn-success" href="login.php">Sign In</a>
            </div>
        </div>
    </div>
	
	</body>
    <?php
        //footer
		include ('Footer.php');
	?>
</html>