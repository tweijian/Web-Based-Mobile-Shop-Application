<?php 
    include_once 'Cart.class.php'; 
    $cart = new Cart; 
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
                    <h1 style="color: white; margin-top: 50px; margin-left: 425px;">
                        Shopping Cart
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateCartItem(obj,id){
            $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
                if(data == 'ok'){
                    location.reload();
                }else{
                    alert('Cart update failed, please try again.');
                }
            });
        }
    </script>
    
    <div class="container">
        <h1 style="text-align:center;">SHOPPING CART</h1><br/>
        <div class="row" style="margin-left:150px;">
            <div class="cart">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="15%">Brand</th>
                                    <th width="25%">Model</th>
                                    <th width="20%">Price</th>
                                    <th width="15%">Quantity</th>
                                    <th class="text-right" width="20%">Sub-Total</th>
                                    <th width="5%"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if($cart->total_items() > 0){ 
                                    $cartItems = $cart->contents(); 
                                    foreach($cartItems as $item){ 
                                ?>
                                <tr>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo $item["model"]; ?></td>
                                    <td><?php echo 'RM '.$item["price"].''; ?></td>
                                    <td><input class="form-control" type="number" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/></td>
                                    <td class="text-right"><?php echo 'RM '.$item["subtotal"].''; ?></td>
                                    <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')?window.location.href='CartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;"><i class="itrash">X</i> </button> </td>
                                </tr>
                                <?php } }else{ ?>
                                <tr><td colspan="5"><p>Your cart is empty.....</p></td>
                                <?php } ?>
                                <?php if($cart->total_items() > 0){ ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Cart Total</strong></td>
                                    <td class="text-right"><strong><?php echo 'RM '.$cart->total().''; ?></strong></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-6">
                            <a href="Home.php" class="btn btn-block btn-light">Continue Shopping</a>
                        </div>

                        <div class="col-sm-12 col-md-6 text-right">
                            <?php if($cart->total_items() > 0){ ?>
                            <a href="Checkout.php" class="btn btn-lg btn-block btn-primary">Checkout</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
    <?php 
        //footer
        include ('Footer.php');
    ?>
</html>