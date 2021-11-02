 <?php
    include_once("DBConnection.php");
    if(isset($_POST['Submit'])) { 
        $FirstName = $_POST['firstName'];
        $LastName = $_POST['lastName'];
        $Email = $_POST['email'];  
        $Username = $_POST['username'];
        $Phone = $_POST['phone'];
        $Address = $_POST['address'];
        $Password = md5($_POST['password']);
        if(empty($FirstName) || empty($LastName) || empty($Email) || empty($Username) || empty($Phone) || empty($Address) || empty($Password)) {              
            if(empty($FirstName)) {
                echo "<font color='red'>First Name field is empty.</font><br/>";
            }          
            if(empty($LastName)) {
                echo "<font color='red'>Last Name field is empty.</font><br/>";
            }           
            if(empty($Email)) {
                echo "<font color='red'>Email field is empty.</font><br/>";
            }           
            if(empty($Username)) {
                echo "<font color='red'>Username field is empty.</font><br/>";
            }
            if(empty($Phone)) {
                echo "<font color='red'>Phone number field is empty.</font><br/>";
            }           
            if(empty($Address)) {
                echo "<font color='red'>Delivery Address field is empty.</font><br/>";
            }           
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        }else{ 
            $result = mysqli_query($connect, "INSERT INTO user(firstName,lastName,email,username,phone,address,password) 
            VALUES('$FirstName','$LastName','$Email','$Username','$Phone','$Address','$Password')");
            echo"<script>alert('Registered Successfully.')</script>";
            echo "<script>window.open('login.php' , '_self')</script>";
        }
    }
?>