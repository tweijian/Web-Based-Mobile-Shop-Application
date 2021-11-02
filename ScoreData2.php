<?php
  header('Content-Type: application/json');
  define('DB_HOST', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'mobileshop');
  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if(!$mysqli){
    die("Connection failed: " . $mysqli->error);
  }
  $query = sprintf("SELECT tablet.model, tablet.performanceScore, brand.name
                    FROM tablet LEFT JOIN brand
                    ON tablet.brandID = brand.id
                    where platformID=" . $_GET["platformID"] . " ORDER BY performanceScore DESC
                  ");
  $query2 = sprintf("SELECT tablet.model, tablet.mainCameraScore, brand.name
                    FROM tablet LEFT JOIN brand
                    ON tablet.brandID = brand.id 
                    where platformID=" . $_GET["platformID"] . " ORDER BY mainCameraScore DESC
                  ");
  $query3 = sprintf("SELECT tablet.model, tablet.frontCameraScore, brand.name
                    FROM tablet LEFT JOIN brand
                    ON tablet.brandID = brand.id 
                    where platformID=" . $_GET["platformID"] . " ORDER BY frontCameraScore DESC
                  ");
  $query4 = sprintf("SELECT tablet.model, tablet.displayScore, brand.name
                    FROM tablet LEFT JOIN brand
                    ON tablet.brandID = brand.id 
                    where platformID=" . $_GET["platformID"] . " ORDER BY displayScore DESC
                  ");
  $query5 = sprintf("SELECT tablet.model, tablet.batteryLifeScore, brand.name
                    FROM tablet LEFT JOIN brand
                    ON tablet.brandID = brand.id 
                    where platformID=" . $_GET["platformID"] . " ORDER BY batteryLifeScore DESC
                  ");
  $result = $mysqli->query($query);
  $result2 = $mysqli->query($query2);
  $result3 = $mysqli->query($query3);
  $result4 = $mysqli->query($query4);
  $result5 = $mysqli->query($query5);
  $data = array();
  foreach ($result as $row) {
    $data["performance"][] = $row;
  }
  foreach ($result2 as $row) {
    $data["mainCamera"][] = $row;
  }
  foreach ($result3 as $row) {
    $data["frontCamera"][] = $row;
  }
  foreach ($result4 as $row) {
    $data["display"][] = $row;
  }
  foreach ($result5 as $row) {
    $data["batteryLife"][] = $row;
  }
  $result->close();
  $mysqli->close();
  print json_encode($data);
?>