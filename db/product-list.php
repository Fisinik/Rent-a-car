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
        echo '<h5> Products for sale </h5>';
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Type</th><th>Price</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['type']."</td><td>".$row['price']."</td></tr>";
        }
        echo "</table>";
    }
    else  
    {  
        echo '<script>alert("Wrong Product Details")</script>';  
    } 

    $sql = "SELECT * FROM reserved"; 
    $result = $conn->query($sql);

    if ($result->rowCount() > 0){
        echo '<h5> Products reserved </h5>';
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Type</th><th>From Date</th><th>To Date</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['type']."</td><td>".$row['from_date']."</td><td>" .$row['to_date']."</td></tr>";
        }
        echo "</table>";
    }
    else  
    {  
        echo '<script>alert("Wrong Product Details")</script>';  
    }  
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

