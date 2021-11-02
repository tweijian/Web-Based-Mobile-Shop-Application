<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Jason Gadget</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <!-- Mobilelist CSS Files -->
	<link rel="stylesheet" href="MobileList.css">
</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <?php	
       
        if(isset($_SESSION['UserID'])){
            echo '
            <div class="sub-header" style="padding-left:150px;">
                <div class="container">
                    <div class="row">
                        <div style="margin-left: 25%" >
                            <ul class="icon">
                                <!-- Searh Form -->
                                <form class="navbar-form navbar-left" method="get" action="results.php">
                                    <input type="text" style="margin-left:100px; height: 38px; width: 350px;" name="phone_query" 
                                    placeholder=" Brands / Models / Ranges ...">
                                    <button type="submit" style="height: 35px; margin-right:85px;" class="btn btn-info" name="search">Search
                                    </button>
                                </form>
                            </ul>
                        </div>
                        <div style="margin-left: 2%" >
                            <ul class="icon">
                                <li class="nav-item">
                                    <a class="nav-link" href="ViewCart.php"><img src="assets/images/AddToCart.png" width="57" height="37"></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
                                    aria-expanded="false"><img src="assets/images/UserAccount.jpg" width="37" height="35"></a>
                                    <ul class="dropdown-menu" style="z-index: 1; position:relative;">
                                        <li>
                                            <a class="dropdown-item" href="#">Choose an option:</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="UserPage.php?platformID=2">User Profile</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="logout.php?platformID=2">Sign Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> ';
        }
        else if(isset($_SESSION['AdminID'])){
            echo '
            <div class="sub-header" style="padding-left:150px;">
                <div class="container">
                    <div class="row">
                        <div style="margin-left: 25%" >
                            <ul class="icon">
                                <!-- Searh Form -->
                                <form class="navbar-form navbar-left" method="get" action="results.php">
                                    <input type="text" style="margin-left:100px; height: 38px; width: 350px;" name="phone_query" placeholder=" Brands / Models / Ranges ...">
                                    <button type="submit" style="height: 35px; margin-right:85px;" class="btn btn-info" name="search">Search</button>
                                </form>
                            </ul>
                        </div>
                        <div style="margin-left: 2%" >
                            <ul class="icon">
                                <li class="nav-item">
                                    <a class="nav-link" href="ViewCart.php"><img src="assets/images/AddToCart.png" width="57" height="37"></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="assets/images/UserAccount.jpg" width="37" height="35"></a>
                                    <ul class="dropdown-menu" style="z-index: 1; position:relative;">
                                        <li>
                                            <a class="dropdown-item" href="#">Choose an option:</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="AdminPage.php?platformID=2">Admin Panel</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="logout.php?platformID=2">Sign Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> ';
        }
        else if(isset($_SESSION['StaffID'])){
            echo '
            <div class="sub-header" style="padding-left:150px;">
                <div class="container">
                    <div class="row">
                        <div style="margin-left: 25%" >
                            <ul class="icon">
                                <!-- Searh Form -->
                                <form class="navbar-form navbar-left" method="get" action="results.php">
                                    <input type="text" style="margin-left:100px; height: 38px; width: 350px;" name="phone_query" placeholder=" Brands / Models / Ranges ...">
                                    <button type="submit" style="height: 35px; margin-right:85px;" class="btn btn-info" name="search">Search</button>
                                </form>
                            </ul>
                        </div>
                        <div style="margin-left: 2%" >
                            <ul class="icon">
                                <li class="nav-item">
                                    <a class="nav-link" href="ViewCart.php"><img src="assets/images/AddToCart.png" width="57" height="37"></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="assets/images/UserAccount.jpg" width="37" height="35"></a>
                                    <ul class="dropdown-menu" style="z-index: 1; position:relative;">
                                        <li>
                                            <a class="dropdown-item" href="#">Choose an option:</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="StaffPage.php?platformID=2">Staff Panel</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="logout.php?platformID=2">Sign Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> ';
        }
        else{
            echo '
            <div class="sub-header" style="padding-left:150px;">
                <div class="container">
                    <div class="row">
                        <div style="margin-left: 25%" >
                            <ul class="icon">
                                <!-- Searh Form -->
                                <form class="navbar-form navbar-left" method="get" action="results.php">
                                    <input type="text" style="margin-left:100px; height: 38px; width: 350px;" name="phone_query" placeholder=" Brands / Models / Ranges ...">
                                    <button type="submit" style="height: 35px; margin-right:85px;" class="btn btn-info" name="search">Search</button>
                                </form>
                            </ul>
                        </div>
                        <div style="margin-left: 2%" >
                            <ul class="icon">
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php"><img src="assets/images/AddToCart.png" width="57" height="37"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php"><img src="assets/images/UserAccount.jpg" width="37" height="35"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> ';
        }
    ?>

    

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="Home.php"><h2>Jason Gadget<em>  store</em></h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="Home.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="MobilesList.php"><img src="assets/images/MobilePhoneLogo.jpg" width="80" height="80">&nbsp Mobile Phones</a>
                                <a class="dropdown-item" href="TabletsList.php"><img src="assets/images/TabletLogo.jpg" width="80" height="80">&nbsp Tablets</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Benchmarks</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="bargraph.php?platformID=1">High End Range Phones Benchmark</a>
                                <a class="dropdown-item" href="bargraph.php?platformID=2">Gaming Range Phones Benchmark</a>
                                <a class="dropdown-item" href="bargraph.php?platformID=3">Innovative Range Phones Benchmark</a>
                                <a class="dropdown-item" href="bargraph.php?platformID=4">Middle Range Phones Benchmark</a>
                                <a class="dropdown-item" href="bargraph.php?platformID=5">Budget Range Phones Benchmark</a>
                                <a class="dropdown-item" href="bargraph2.php?platformID=1">High End Tablets Benchmark</a>
                                <a class="dropdown-item" href="bargraph2.php?platformID=4">Middle Range Tablets Benchmark</a>
                                <a class="dropdown-item" href="bargraph2.php?platformID=5">Budget Range Tablets Benchmark</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Articles.php">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="AboutUs.php">About Us</a>
                        </li>
                        <?php	
                            if(isset($_SESSION['UserID'])){
                                echo'
                                    <li class="nav-item">
                                        <a class="nav-link" href="chatbox.php?userId='.$_SESSION['UserID'].'&StaffID=1">Customer Service</a>
                                    </li>
                                    ';
                            }else{
                                echo'
                                    <li class="nav-item">
                                        <a class="nav-link" href="ContactUs.php">Customer Service</a>
                                    </li>
                                    ';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  
            t.value='';         
            t.style.color='#fff';
            }
        }
    </script>

