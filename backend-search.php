<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=rent_a_car", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt search query execution
try{
    if(isset($_REQUEST["name"])){
        // create prepared statement
        $sql = "SELECT * FROM products WHERE name LIKE :name";
        $stmt = $pdo->prepare($sql);
        $name = $_REQUEST["name"] . '%';
        // bind parameters to statement
        $stmt->bindParam(":name", $name);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Type</th><th>Price</th></tr>";
            while($row = $stmt->fetch()){
                echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['type']."</td><td>".$row['price']."</td></tr>";
            }
            echo '</table>';
        } else{
            echo "<p>No matches found</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close statement
unset($stmt);
 
// Close connection
unset($pdo);
?>