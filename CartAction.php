<?php 
    require_once 'Cart.class.php'; 
    $cart = new Cart; 
    require_once 'DBConnection.php'; 
    $redirectLoc = 'login.php'; 
    $userId=$_SESSION["UserID"];
    if(isset($_SESSION['UserID'])){
        if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ 
            if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){ 
                $mobileID = $_REQUEST['id']; 
                $tabletID = $_REQUEST['id']; 
                $productType = $_REQUEST['type'];
                if($productType == 'mobile'){
                    $result = $connect->query("SELECT * FROM mobile inner join brand on brand.id = mobile.brandID WHERE mobile.id = ".$mobileID); 
                }else{
                    $result = $connect->query("SELECT * FROM tablet inner join brand on brand.id = tablet.brandID WHERE tablet.id = ".$tabletID); 
                }
                $itemData = null;           
                while ($row = mysqli_fetch_assoc($result)){
                    $itemData = $row;
                    $itemData ['type'] = $productType;
                }
                $insertItem = $cart->insert($itemData); 
                $redirectLoc = $insertItem?'viewCart.php':'Home.php'; 
            }else if($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){ 
                $itemData = array( 
                    'rowid' => $_REQUEST['id'], 
                    'qty' => $_REQUEST['qty'] 
                ); 
                $updateItem = $cart->update($itemData); 
                echo $updateItem?'ok':'err';die; 
            }else if($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){ 
                $deleteItem = $cart->remove($_REQUEST['id']);              
                $redirectLoc = 'viewCart.php'; 
            }else if($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0){ 
                $redirectLoc = 'Checkout.php'; 
                $_SESSION['postData'] = $_POST; 
                if(empty($errorMsg)){ 
                    $insertOrder = $connect->query("INSERT INTO orders (customer_id, grand_total, created, status) 
                    VALUES ($userId, '".$cart->total()."', NOW(), 'Pending')");                    
                    if($insertOrder){ 
                        $orderID = $connect->insert_id; 
                        $cartItems = $cart->contents(); 
                        $sql = ''; 
                        foreach($cartItems as $item){ 
                            $mobileID=NULL;
                            $tabletID=NULL;
                            if($item ['type']=='mobile'){
                                $mobileID=$item ['id'];
                            }else{
                                $tabletID=$item ['id'];
                            }
                            $sql .= "INSERT INTO order_items (order_id, mobile_id, tablet_id, quantity) 
                            VALUES ('".$orderID."', '".$mobileID."', '".$tabletID."','".$item['qty']."');"; 
                        } 
                        $insertOrderItems = $connect->multi_query($sql);                                                    
                        if($insertOrderItems){                               
                            $cart->destroy(); 
                        }                           
                    }                   
                }               
            } 
        } 
    }
    if($_REQUEST['action'] == 'placeOrder'){
        echo"<script>alert('Placed Order Successfully.')</script>";
    }
    echo "<script>window.open('$redirectLoc' , '_self')</script>";
    exit();
?>