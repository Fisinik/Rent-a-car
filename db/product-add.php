<?php

$servername = "localhost";
$username = "root";
$password = "";

include ("upload-img.php");

try {
    $conn = new PDO("mysql:host=$servername;dbname=rent_a_car", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    
if(isset($_POST['fupload']))
{
    $dirpath="upload";
    $uploader   =   new Uploader();

    $uploader->setExtensions(array('jpg','jpeg','png','gif','doc','docx'));  //allowed extensions list//

    $uploader->setMaxSize(1);                          //set max file size to be allowed in MB//

    $uploader->setDir($dirpath);

    if($uploader->uploadFile('fileToUpload'))          //txtFile is the filebrowse element name //
    {   
        $suc_file  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
        echo $suc_file." successfully uploaded";
        $photo = $suc_file;
    }
    else                    //upload failed
        echo $uploader->getMessage(); //get upload error message
}

    if(empty($_POST["name"]) && empty($_POST["type"]) && empty($_POST["price"]) && empty($_POST["color"]))  
      {  
           echo '<script>alert("All fields are required!")</script>';  
      }  
      else  
      {     
        $name = trim($_POST['name']);
        $type = trim($_POST['type']);
        $price = trim($_POST['price']);
        $color = trim($_POST['color']);
        echo $photo;
        echo $uploader->getUploadName();

        $query = $conn->prepare("INSERT INTO Products (name, type, price, color, photo)
  VALUES ('$name', '$type', '$price', '$color', '$suc_file')");

        $result = $query->execute();  
        echo '<script>alert("Product Added!")</script>';
        header("location:../admin-page.php");
      }
    }
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>