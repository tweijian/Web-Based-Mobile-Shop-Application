<html lang="en">
    <?php
    session_start();
    include ('Header.php');
    ?>

    <!-- Page Content -->
    <div class="jumbotron jumbotron-sm" style="background-color: black;">
		<div class="container" >
			<div class="row">
				<div class="col-sm-15 col-sm-15">
					<h1 style="color: white; margin-top: 50px; margin-left: 500px;">
						Articles
					</h1>
					<br>
					<h3 style="color: white; margin-top: 50px; margin-left: 400;">
						Latest Technology News
                    </h3>
				</div>
			</div>
		</div>
	</div>
    
    <?php
        $url = 'https://newsapi.org/v2/top-headlines?country=my&category=technology&apiKey=79ab5646caa54a64a6afa7d893ce3f1c';
        $response = file_get_contents($url);
        $NewsData = json_decode($response);
    ?>
    
    <div class="container-fluid" style="width=90%">
        <?php
            foreach($NewsData->articles as $News)
            {
        ?>
        
        <div class="row NewsGrid" style=" margin: 10px;border: 1px solid lightgray;padding: 10px;">
            <div class="col-md-3">
                <img style="width: calc(100% - 20px);height: 250px;margin: 10px;" src="<?php echo $News->urlToImage?>" 
                alt="News thumbnail" class="rounded";>
            </div>
            <div class="col-md-9">
                <h2>Title: <?php echo $News->title ?></h2>
                <h5>Description <?php echo $News->description?></h5>
                <p>Content: <?php echo $News->content?></p>
                <h6>Author: <?php echo $News->author?></h6>
                <h6>Published <?php echo $News->publishedAt?> </h6>
                <h6>Url to News: <?php echo "<a href = '$News->url'>Links</a>";?></h6>
            </div>
        </div>
    
        <?php
            }
        ?>
    </div>

    <?php
		include ('Footer.php');
	?>
    </body>
</html>