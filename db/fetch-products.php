<?php

if(!isset($_SESSION)){session_start();}
 

$servername = "localhost";
$username = "root";
$password = "";

try {
    // $conn = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
    $conn = new PDO("mysql:host=$servername;dbname=rent_a_car", $username, $password);
  // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    $sql = "SELECT * FROM products"; 
    $result = $conn->query($sql);

    if ($result->rowCount() > 0){
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
           echo '<div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image" style="background-color:#F3F3F3;">        
                    <img class="pic-1" src="db/upload/jpg/' . $row["photo"]  . '">
                    </a>
                    <a class="add-to-cart" href=""> + </a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">' . $row["name"] . ' </a></h3>
                    
                     <div class="price">' . $row["price"] . ' 	&euro;</div>
                </div>

                <div class="action-buttons">
                    <a class="btn btn-lg btn-primary" data-toggle="modal" data-target="#largeModal' . $row["id"] . '" >RENT CAR   </a>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="largeModal' . $row["id"] . '" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"> Rent a car </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="db/product-rent.php">
            <fieldset>
            <div class="control-group">
            <div class="controls">
              <input required="" id="id" name="id" type="text" class="form-control" value="ID: ' . $row["id"] . "  | " . $row["name"] . " " . $row["type"]  .'" class="input-medium" required="">
            </div>
          </div>

            <div class="control-group">
              <label class="control-label" for="userid">From:</label>
              <div class="controls">
                <input required="" id="from_date" name="from_date" type="date" class="form-control" class="input-medium" required="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="userid">To:</label>
              <div class="controls">
                <input required="" id="to_date" name="to_date" type="date" class="form-control"  class="input-medium" required="">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="add_product"></label>
              <div class="controls">
                <button id="add_product" name="add_product" class="btn btn-success">Rent ' . $row["name"] . " " . $row["type"]  . " | ID: " . $row["id"] .' </button>
              </div>
            </div>
            </fieldset>
            </form>

        </div>
    </div>
  </div>
</div>
';
        }
    }
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

