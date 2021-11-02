<html lang="en">
  <?php
    session_start();
    //header
    include ('Header.php');
	  require_once('DataBase.php');   
    $DB = new DataBase();  
    $con = mysqli_connect("localhost","root","","mobileshop");
  ?>

  <!-- Banner Starts Here -->
  <div class="main-banner header-text" id="top">
    <div class="Modern-Slider">
      <!-- Item -->
      <div class="item item-1">
        <div class="img-fill">
            <div class="text-content">
              <h6>Welcome to Jason Gadget Store !</h6>
              <h4>We provide customers with <br> Great Deals and Services</h4>
              <p>Check out more about mobile devices on sales in our store with irresistible deals and services</p>
              <a href="MobilesList.php" class="filled-button">> View Mobile Phones</a><br><br>
              <a href="TabletsList.php" class="filled-button">> View Tablets</a>
            </div>
        </div>
      </div>
      <!-- // Item -->

      <!-- Item -->
      <div class="item item-2">
        <div class="img-fill">
            <div class="text-content">
              <h6>Jason Gadget Store</h6>
              <h4>Want to know more <br> about us ?</h4>
              <p>Jason Gadget Store provides customers with excellent services and attractive deals</p>
              <a href="AboutUs.php" class="filled-button">About Us</a>
            </div>
        </div>
      </div>
      <!-- // Item -->

      <!-- Item -->
      <div class="item item-3">
        <div class="img-fill">
            <div class="text-content">
              <h6>Jason Gadget Store</h6>
              <h4>Satisfied <br> Customer Service <br> From Us</h4>
              <p>Worried about after sales service? No worries. Chat with us through customer service.</p>
              <a href="ContactUs.php" class="filled-button">Customer Service</a>
            </div>
        </div>
      </div>
      <!-- // Item -->
    </div>
  </div>
  <!-- Banner Ends Here -->

  <div class="card">
    <div class="card-header">
      <h3><center>New Arrivals</center></h3>
    </div>

    <div class="card-body">
      <div class="row">
        <?php  
          $con = mysqli_connect("localhost","root","","mobileshop");
          $query = "SELECT * FROM mobile ORDER BY releaseDate DESC LIMIT 4 ";
          $query_run = mysqli_query($con, $query);
          $result = mysqli_query($con, $query);
          if(mysqli_num_rows($query_run) > 0){
            foreach($result as $proditems){
              ?>              
                  <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                    <div class='my-list'>
                      <img style='max-width:100%;' src='<?php echo $proditems['mobileUrl']?>' alt='dsadas' />
                      <h3><?php echo $DB->getBrandById($proditems['brandID'])->Name . " " . $proditems['model'];?></h3>
                      <span class='pull-right'><?php echo $DB->getPlatformById($proditems['platformID'])->Name;?></span>
                      <div class='offer'>RM <?php echo $proditems['price']?></div>
                      <div class='detail'>
                        <p>Click 'Details' for more info</p>
                        <img style='max-width:100%;' src='<?php echo $proditems['mobileUrl']?>' alt='dsadas' />
                        <form action='Details.php' method='post'>
                          <input type='hidden' value='<?php echo $proditems['id']?>' id='id' name='id'>
                          <input type='submit' value='Details' class='btn btn-info'>
                        </form>
                      </div>
                    </div>
                  </div>            
              <?php
            }
          }
          else{
            echo "No Record Found";
          }
        ?>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
        <?php  
        $con = mysqli_connect("localhost","root","","mobileshop");
        $query = "SELECT * FROM tablet ORDER BY releaseDate DESC LIMIT 4 ";
        $query_run = mysqli_query($con, $query);
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($query_run) > 0)
        {
          foreach($result as $proditems)
          {
            ?>
              
                <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                  <div class='my-list'>
                    <img style='max-width:100%;' src='<?php echo $proditems['tabletUrl']?>' alt='dsadas' />
                    <h3><?php echo $DB->getBrandById($proditems['brandID'])->Name . " " . $proditems['model'];?></h3>
                    <span class='pull-right'><?php echo $DB->getPlatformById($proditems['platformID'])->Name;?></span>
                    <div class='offer'>RM <?php echo $proditems['price']?></div>
                    <div class='detail'>
                      <p>Click 'Details' for more info</p>
                      <img style='max-width:100%;' src='<?php echo $proditems['tabletUrl']?>' alt='dsadas' />
                      <form action='Details2.php' method='post'>
                        <input type='hidden' value='<?php echo $proditems['id']?>' id='id' name='id'>
                        <input type='submit' value='Details' class='btn btn-info'>
                      </form>
                    </div>
                  </div>
                </div>
              
          <?php
          }
        }
        else
        {
          echo "No Record Found";
        }
        ?>
      </div>
    </div>
  </div>

  </body>
  <?php
    //footer
		include ('Footer.php');
	?>
</html>