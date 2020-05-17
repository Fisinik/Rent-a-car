<?php

if(!isset($_SESSION)){session_start();}

$servername = "localhost";
$username = "root";
$password = "";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../PHPMailer/vendor/autoload.php';

try {
    // $conn = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
    $conn = new PDO("mysql:host=$servername;dbname=rent_a_car", $username, $password);
  // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $from_date = trim($_POST['from_date']);
    $to_date = trim($_POST['to_date']);
    $id = trim($_POST['id']);
    $id = substr($id, 4);
    $id = (explode(" ", $id));
    $id = $id[0];
    
    $sql = "SELECT * FROM products where id='$id'"; 
    $result = $conn->query($sql);

    if ($result->rowCount() > 0){
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $name = $row['name'];
            $color = $row['color'];
            $type = $row['type'];
            $price = $row['price'];
        } 
    } 

    $sql = "INSERT INTO reserved (name, type, price, color, from_date, to_date)
    VALUES ('$name', '$type', '$price', '$color', '$from_date', '$to_date')";
    $result = $conn->query($sql);

    $sql = "DELETE FROM products WHERE id = '$id'";
    $result = $conn->query($sql);





// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'anonymous@gmail.com';                     // SMTP username
    $mail->Password   = 'anynymous';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;       

    $person = $_SESSION['username'];
    $email = $_COOKIE['email'];
    //Recipients
    $mail->setFrom('rent_acar@gmail.com', 'Rent a Car');
    $mail->addAddress($email, $person);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Rent a car purchase';
    $mail->Body    = 'Hello ' . $person . ',' . "<br>You have just purchased " . $name . ' ' . $type . '!';
    // $mail->AltBody = 'This is the body in plain text fo r non-HTML mail clients';

    $mail->send();
    echo '<script>alert("Check your email for the purchase!")</script>';  
    header("location:../single-service.php");

}   
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>