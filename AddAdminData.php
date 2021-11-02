<?php
    include_once("DBConnection.php");

    if(isset($_POST['Submit'])){   
        $Username = $_POST['username'];
        $Password = md5($_POST['password']);
        $Email = $_POST['email'];
        if(empty($Username) || empty($Password) || empty($Email)){              
            if(empty($Username)){
                echo "<font color='red'>Username field is empty.</font><br/>";
            }
            if(empty($Password)){
                echo "<font color='red'>Password field is empty.</font><br/>";
            }
            if(empty($Email)){
                echo "<font color='red'>Email field is empty.</font><br/>";
            }
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        }else{ 
            $result = mysqli_query($connect, "INSERT INTO admin(username,password,email) VALUES('$Username','$Password','$Email')");
            header('Location: ManageAdmin.php');
        }
    }
?>