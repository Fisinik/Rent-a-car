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

    if(empty($_POST["user"]) && empty($_POST["password"]))  
      {  
          throw new Exception("Frontend input validation failed");
      } 
      else  
      {
            $user = trim($_POST['user']);
            $password = $_POST['password'];
            $password = md5($password);

            $sql = "SELECT * FROM users WHERE name = '$user' AND password = '$password'"; 
            $result = $conn->query($sql);

            if ($result->rowCount() > 0){
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION['username'] = $user;
                    setcookie('email',$row['email'], time() + (86400 * 30)*30, "/"); ;
                    header("location:../single-service.php");
                }
            }
            else  
           {  
                echo '<script>alert("Wrong Credentials!")</script>';
                echo '<script>location="../index.php"</script>';
           }  
      }
    }
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}