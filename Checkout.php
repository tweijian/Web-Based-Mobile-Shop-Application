<?php 
    require_once 'DBConnection.php'; 
    include_once 'Cart.class.php'; 
    $cart = new Cart; 
    if($cart->total_items() <= 0){ 
        header("Location: Home.php"); 
    } 
    $postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array(); 
    unset($_SESSION['postData']); 
?>

<html>
    <?php 
        //header
        include ('Header.php');
    ?>

    <!-- Page Content -->
    <div class="jumbotron jumbotron-sm" style="background-color: black;">
        <div class="container" >
            <div class="row">
                <div class="col-sm-15 col-sm-15">
                    <h1 style="color: white; margin-top: 50px; margin-left: 475px;">
                        Checkout
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <a class="btn btn-info" href="ViewCart.php">Back</a>
        <h1><center>Payment</center></h1><br/>
        <div class="col-12">
            <div class="checkout">
                <div class="row">
                    <?php 
                        if(!empty($statusMsg) && ($statusMsgType == 'success')){ 
                    ?>

                    <div class="col-md-12">
                        <div class="alert alert-success"><?php echo $statusMsg; ?></div>
                    </div>

                    <?php 
                        }else if(!empty($statusMsg) && ($statusMsgType == 'error')){ 
                    ?>

                    <div class="col-md-12">
                        <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
                    </div>

                    <?php } ?>
                    
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your Cart</span>
                            <span class="badge badge-secondary badge-pill"><?php echo $cart->total_items(); ?></span>
                        </h4>

                        <ul class="list-group mb-3">
                            <?php 
                                if($cart->total_items() > 0){ 
                                    //get cart items from session 
                                    $cartItems = $cart->contents(); 
                                    foreach($cartItems as $item){ 
                            ?>

                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?php echo $item["model"]; ?></h6>
                                    <small class="text-muted"><?php echo 'RM'.$item["price"]; ?>(<?php echo $item["qty"]; ?>)</small>
                                </div>
                                <span class="text-muted"><?php echo 'RM'.$item["subtotal"]; ?></span>
                            </li>

                            <?php 
                                } } 
                            ?>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (RM)</span>
                                <strong><?php echo $cart->total(); ?></strong>
                            </li>
                        </ul>
                        <a href="Home.php" class="btn btn-block btn-info">Add Items</a>
                    </div>

                    <div class="col-md-8 order-md-1">
                        <form method="post" id="payment-form" action="CartAction.php">
                            <div class="mb-3">
                                <label for="paymentMethod">Payment Method</label>
                                <br/>
                                <select name="paymentMethod" id="paymentMethod">
                                    <option value="creditCard">Credit Card</option>
                                    <option value="debitCard">Debit Card</option>
                                </select>
                                <br/><br/>
                            </div>

                            <div class="mb-3">
                                <label for="cardNo">Card No.</label>
                                <input type="number" class="form-control" name="cardNo" value="" required>
                            </div>

                            <div class="mb-3">
                                <label for="pinNumber">CVV</label>
                                <input type="number" class="form-control" name="cvv" value="" required>
                            </div>

                            <input type="hidden" name="action" value="placeOrder"/>
                            <input class="btn btn-success btn-lg btn-block" type="submit" name="checkoutSubmit" value="Place Order">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("input[name='cardNo']").on("input", function() {
            this.setCustomValidity("");
            this.value = this.value.substr(0, 16);
        });

        $("input[name='cvv']").on("input", function() {
            this.setCustomValidity("");
            this.value = this.value.substr(0, 3);
        });

        $("#payment-form").on("submit", function(e) {
            let cvv = $("input[name='cvv']")[0];
            let cardNo = $("input[name='cardNo']")[0];
            if (cvv.value.length != 3) {
                cvv.setCustomValidity("CCV required 3 digits.");
                cvv.reportValidity();
                e.preventDefault();
            }
            if (cardNo.value.length != 16) {
                cardNo.setCustomValidity("Card No. required 16 digits.");
                cardNo.reportValidity();
                e.preventDefault();
            }
        });
    </script>

    </body>
    <?php 
        //footer
        include ('Footer.php');
    ?>
</html>