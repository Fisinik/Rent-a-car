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

    if(empty($_POST["id"]))  
      {  
            echo '<script>alert("ID is required")</script>';  
      }  
      else  
      {
            $id = trim($_POST['id']);

            $sql = "DELETE FROM products WHERE id = '$id'"; 
            $result = $conn->query($sql);
            header("location:../admin-page.php");
            // $sql = "DELETE FROM 'tbl_products' WHERE 'ProductID' = ProductID LIMIT 1";

      }
    }
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}