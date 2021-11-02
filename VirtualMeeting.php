<html>
    <head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://meet.jit.si/external_api.js"></script>
		<script>
			$(document).ready(function(){
				var domain = "meet.jit.si";
				var options = {
					roomName: "JitsiMeetAPI",
					width: 700,
					height: 700,
					parentNode: document.querySelector('#meet')
				}
				var api = new JitsiMeetExternalAPI(domain, options);
			});
		</script>
	</head>

	<?php
		session_start();
		//header
		include ('Header.php');
	?>

	<div class="jumbotron jumbotron-sm" style="background-color: black;">
        <div class="container" >
            <div class="row">
                <div class="col-sm-15 col-sm-15">
                    <h1 style="color: white; margin-top: 50px; margin-left: 125px;">
                       Staff Panel - Customers Service Virtual Meeting
					</h1>
                </div>
            </div>
        </div>
    </div>
	
	<?php
        include ('StaffNav.php');
    ?>

    <div class="container" style="margin-left:450px;">
	    <div class="row">
	        <div class="col-md-8">
				<h1 style="text-align:center;">Customers Service</h1>
                <div id="meet">
                    <br>
                    <h2 style="text-align:center;">Virtual Meeting</h2>
                </div>
	        </div>
	    </div>
	</div>
	
    <br>

	<?php
		//footer
		include ('Footer.php');
	?>
	</body>
</html>