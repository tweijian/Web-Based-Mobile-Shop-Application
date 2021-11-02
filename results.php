<?php
    session_start();
    $con = mysqli_connect("localhost","root","","mobileshop") 
    or die("Connection was not established");
    //header
    include ('Header.php');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Results</title>
    </head>

    <body>
        <div class="jumbotron jumbotron-sm" style="background-color: black;">
            <div class="container" >
                <div class="row">
                    <div class="col-sm-15 col-sm-15">
                        <h1 style="color: white; margin-top: 50px; margin-left: 450px;">
                            Search Results</h1>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin: 10px;">
            <div class='card'>
                <div class='card-body'>
                    <div class="row">
                        <?php 
                            global $con;
                            if(isset($_GET['search'])){
                                $search_query = htmlentities($_GET['phone_query']);
                            }
                            $get_posts = "SELECT mobile.id AS mid, mobile.model, mobile.mobileUrl, 
                                        mobile.platformID, mobile.price, brand.name, platform.name AS pname
                                        FROM mobile LEFT JOIN brand ON mobile.brandID = brand.id 
                                        Left JOIN platform ON mobile.platformID = platform.id 
                                        where model like '%$search_query%' 
                                        OR platform.name like '%$search_query%'
                                        OR brand.name like '%$search_query%'";
                            $run_posts = mysqli_query($con,$get_posts);
                            while($row_posts = mysqli_fetch_array($run_posts)){
                                $id = $row_posts['name'];
                                $model = $row_posts['model'];
                                $mobileUrl = $row_posts['mobileUrl'];
                                $platformID = $row_posts["pname"];
                                $price = $row_posts["price"];
                                $mobileID = $row_posts["mid"];
                                echo "
                                    <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                                        <div class='my-list'>
                                            <img style='max-width:100%;' src=$mobileUrl alt='dsadas' />
                                            <h3>$id $model</h3>
                                            <span class='pull-right'>$platformID</span>
                                            <div class='offer'>RM $price </div>
                                            <div class='detail'>
                                                <p>Click 'Details' for more info</p>
                                                <img style='max-width:100%;' src=$mobileUrl alt='dsadas' />
                                                <form action='Details.php' method='post'>
                                                    <input type='hidden' value='$mobileID' id='id' name='id'>
                                                    <input type='submit' value='Details' class='btn btn-info'>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }

                            $get_posts2 = "SELECT tablet.id AS tid, tablet.model, tablet.tabletUrl, 
                                        tablet.platformID, tablet.price, brand.name, platform.name AS pname
                                        FROM tablet LEFT JOIN brand ON tablet.brandID = brand.id 
                                        Left JOIN platform ON tablet.platformID = platform.id 
                                        where model like '%$search_query%' 
                                        OR platform.name like '%$search_query%'
                                        OR brand.name like '%$search_query%'";
                            $run_posts2 = mysqli_query($con,$get_posts2);
                            while($row_posts = mysqli_fetch_array($run_posts2)){
                                $id = $row_posts['name'];
                                $model = $row_posts['model'];
                                $tabletUrl = $row_posts['tabletUrl'];
                                $platformID = $row_posts["pname"];
                                $price = $row_posts["price"];
                                $tabletID = $row_posts["tid"];
                                echo "
                                    <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                                        <div class='my-list'>
                                            <img style='max-width:100%;' src=$tabletUrl alt='dsadas' />
                                            <h3>$id $model</h3>
                                            <span class='pull-right'>$platformID</span>
                                            <div class='offer'>RM $price </div>
                                            <div class='detail'>
                                                <p>Click 'Details' for more info</p>
                                                <img style='max-width:100%;' src=$tabletUrl alt='dsadas' />
                                                <form action='Details2.php' method='post'>
                                                    <input type='hidden' value='$tabletID' id='id' name='id'>
                                                    <input type='submit' value='Details' class='btn btn-info'>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        ?>
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