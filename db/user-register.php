<?php

$servername = "localhost";
$username = "root";
$password = "";

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=rent_a_car", $username, $password);
  // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    if(empty($_POST["email"]) && empty($_POST["name"]) && empty($_POST["password"]) && empty($_POST["reenterpassword"]))  
      {  
           echo '<script>alert("All fields are required!")</script>';  
      } 
      else if (!filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Email is not valid!")</script>';
        echo '<script>location="../index.php"</script>';
        // header("location:../index.php");
      }
      else if (strlen($_POST["password"]) !== strlen($_POST["reenterpassword"]) || strlen($_POST["password"]) < 6 || strlen($_POST["password"]) > 20) {
        echo '<script>alert("Please match both password entries and make sure the password is 6-20 characters!")</script>';
        echo '<script>location="../index.php"</script>';
      }
      else if (!empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["password"]) && !empty($_POST["reenterpassword"]))
      { 
        $email = trim($_POST['email']);
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);
        $password = md5($password);

        $query = $conn->prepare("INSERT INTO Users (email, name, password)
  VALUES ('$email', '$name', '$password')");

        $result = $query->execute();
        echo '<script>alert("Registration Done! Please login")</script>';
        echo '<script>location="../index.php"</script>';
      }
    }
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>