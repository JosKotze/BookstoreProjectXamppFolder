<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

$mysqli = new mysqli($host, $username, $password, $dbname, 3307);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$title = $_POST["title"];
$author = $_POST["author"];
$pageNum = $_POST["pageNum"];
$publisher = $_POST["publisher"];
$condition = $_POST["condition"];
$format = $_POST["format"];
$genre = $_POST["genre"];
$city = $_POST["city"];
$province = $_POST["province"];
$shipping = $_POST["shipping"];
$collection = $_POST["collection"];
$price = $_POST["price"];

$filePath = $_FILES['uploadPicture']['tmp_name'];
$image = file_get_contents($filePath);
$encodeImgData = base64_encode($image);

$email = $_POST["email"];
$firstName = $_POST["fName"];
$lastName = $_POST["lName"];
$cellNum = $_POST["cellNum"];
$contactMeth = $_POST["contactMeth"];

//unique id generate
$more_entropy = false; // false only returns 13 characters
$id = uniqid($firstName, $more_entropy);

$sql1 = "INSERT INTO listings (listing_id, contact_id, title, author, pageNum, publisher, bookState, format, genre, encodeImgData, city, province, shipping, collect, price) 
VALUES ('', '$id', '$title', '$author','$pageNum','$publisher','$condition','$format', '$genre', '$encodeImgData', '$city', '$province', '$shipping', '$collection', '$price')";

$sql2 = "INSERT INTO contactInfo (contactInfo_ID, email, fName, lName, cellNum, contactMeth) 
VALUES ('$id', '$email', '$firstName','$lastName','$cellNum','$contactMeth')";

$mysqli->query($sql1);
$mysqli->query($sql2);

$mysqli->close();

echo "<html>";
echo "<head>";
echo "<style>";
echo "button{";
echo "background-color: #ddd;
color: #333;
padding: 10px;
border: none;
border-radius: 5px;
cursor: pointer;
margin-top: 6px;
margin-bottom: 4px;
margin-left: 4px;";
echo "}";
echo "button:hover{
    color: white;
    background-color: rgb(3, 180, 250);
  }
  
  button:active{
    color: white;
    background-color: rgb(3, 180, 250);
  }";
echo "";
echo "";
echo "</style>";
echo "<title>Thank You</title>";
echo "</head>";
echo "<body style='background-color: #f5f5f5; font-family: Arial, sans-serif;'>";
echo "<div style='text-align: center; margin-top: 100px;'>";
echo "<h1 style='color: #333333; font-size: 32px;'>You have successfully posted a listing!</h1>";
echo "<p style='color: #666666; font-size: 18px;'>Please use our website to find and sell more books.</p>";
//echo "<button onclick='location.href='BookStore.html';'>Return to home</button>";
echo '<button onclick="window.location.href = \'BookStore.html\';">Return to Homepage</button>';
echo "</div>";
echo "</body>";
echo "</html>";
?>