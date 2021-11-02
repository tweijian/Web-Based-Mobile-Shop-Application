<?php
    session_start();
    include("DBConnection.php");
    $staffs = mysqli_query($connect,"SELECT * FROM staff WHERE id = '".$_SESSION["StaffID"]."'") or die("Failed to query database");
    $staff = mysqli_fetch_assoc($staffs);
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
                       Staff Profile - Customer Service
					</h1>
                </div>
            </div>
        </div>
    </div>
	
	<?php
        include ('StaffNav.php');
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h2 style="text-align: center;">Welcome Back, <?php echo $staff["username"]; ?> </h2><br/>
                <input type="text" id="fromUser" value=<?php echo $staff["id"]; ?> hidden />
                <div class='card-header'><h5>List of Customer Chats: </h5></div>
                <div class='card'>
                    <div class='card-body'>
                    <h5>
                        <?php
                            $msgs = mysqli_query($connect,"SELECT * FROM user") or die("Failed to query database");
                            while($msg = mysqli_fetch_assoc($msgs))
                            {
                                echo '<li><a href="?toUser='.$msg["id"].'&userId='.$msg["id"].'">'.$msg["username"].'</a></li><br/>';
                            }
                        ?>
                    </h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>
                                <?php
                                    if(isset($_GET["toUser"]))
                                    {
                                        $userName = mysqli_query($connect,"SELECT * FROM user WHERE id='".$_GET["toUser"]."'") or die("Failed to query database");
                                        $uName = mysqli_fetch_assoc($userName);
                                        echo '<input type="text" value='.$_GET["toUser"].' id="toUser" hidden/>';
                                        echo $uName["username"];
                                        
                                    }else
                                    {
                                        $userName = mysqli_query($connect," SELECT * FROM user ") or die("Failed to query database");
                                        $uName = mysqli_fetch_assoc($userName);
                                        $_SESSION["toUser"] = $uName["id"];
                                        echo '<input type="text" value='.$_SESSION["toUser"].' id="toUser" hidden/>';
                                        echo $uName["username"];
                                    }

                                ?>
                            </h4>
                        </div>

                        <div class="modal-body" id="msgBody" style="height: 400px; overflow-y:scroll; overflow-x:hidden;">
                            <?php
                                if(isset($_GET["toUser"])){
                                    $chats = mysqli_query($connect,"SELECT * FROM messages WHERE (FromUser = '".$_SESSION["StaffID"]."' AND ToUser = '".$_GET["toUser"]."') OR (FromUser = '".$_GET["toUser"]."' AND ToUser = '".$_SESSION["StaffID"]."')") 
                                    or die("Failed to query database");
                                    $chat = mysqli_fetch_assoc($chats);

                                }else{
                                    $chats = mysqli_query($connect,"SELECT * FROM messages WHERE (FromUser = '".$_SESSION["StaffID"]."' AND ToUser = '".$_SESSION["toUser"]."') 
                                    OR (FromUser = '".$_SESSION["toUser"]."' AND ToUser = '".$_SESSION["StaffID"]."')  ") 
                                    or die("Failed to query database");
                                    while($chat = mysqli_fetch_assoc($chats))
                                    {
                                        if($chat["FromUser"] == $_SESSION["StaffID"]){
                                        echo "<div style='text-align:right;'>
                                        <p style='background-color:lightblue; word-wrap:break-word; display:inline-block; padding:5px; border-radius:10px; max-width:70%;'>
                                            ".$chat["Message"]."
                                        </p>
                                        </div>";
                                        }else{
                                        echo "<div style='text-align:left;'>
                                        <p style='background-color:yellow; word-wrap:break-word; display:inline-block; padding:5px; border-radius:10px; max-width:70%;'>
                                            ".$chat["Message"]."
                                        </p>
                                        </div>";
                                        }
                                    }
                                }
                            ?>
                        </div>
                        
                        <div class="modal-footer">
                            <textarea id="message" class="form-control" style="height: 70px;"></textarea>
                            <button id="send" class="btn btn-primary" style="height:70px;">Send</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <a class="btn btn-info" href="CustomerService.php">Back</a>
            </div>
        </div>
    </div>

    </body>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#send").on("click",function(){
                $.ajax({
                url:"insertMessage.php",
                method:"POST",
                data:{
                    fromUser: $("#fromUser").val(),
                    toUser: $("#toUser").val(),
                    message: $("#message").val()
                },
                dataType:"text",
                success:function(data)
                {
                    $("#message").val("");
                }
                });
            });

            setInterval(function(){
                $.ajax({
                url:"realTimeChat.php",
                method:"POST",
                data:{
                    fromUser:$("#fromUser").val(),
                    toUser:$("#toUser").val()
                },
                dataType:"text",
                success:function(data) 
                {
                    $("#msgBody").html(data);
                }
                });
            }, 700);
        });
    </script>

	<?php
        //footer
		include ('Footer.php');
	?>
	</body>
</html>