<?php

//include 'dbConfig.php';

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
// Creating variables to save form data from HTML

$filePath = $_FILES['uploadPicture']['tmp_name'];
//echo ($filePath);
$image = file_get_contents($filePath);
$encodeImgData = base64_encode($image);
// convert image to base64

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";
// Saving database information into variables for easy access

$mysqli = new mysqli($host, $username, $password, $dbname, 3307);
// Creating new mysqli object to open a new connnection to mySQL server

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    // the die() function prints a message and exits the current script
    // connection_error returns a description of last connection error
}

$sql = "INSERT into listings (listing_id, title, author, pageNum, publisher, bookState, format, genre, encodeImgData, city, province, shipping, collect, price) 
VALUES ('', '$title', '$author','$pageNum','$publisher','$condition','$format', '$genre', '$encodeImgData', '$city', '$province', '$shipping', '$collection', '$price')";

// Execute query
mysqli_query($mysqli, $sql);

$mysqli->close(); // Close connection


echo "<html>";
echo "<head>";
echo "<title>Thank You</title>";
echo "</head>";
echo "<body style='background-color: #f5f5f5; font-family: Arial, sans-serif;'>";
echo "<div style='text-align: center; margin-top: 100px;'>";
echo "<h1 style='color: #333333; font-size: 32px;'>You have succesfully posted a listing!</h1>";
echo "<p style='color: #666666; font-size: 18px;'>Please use our website to find and sell more books.</p>";
echo "</div>";
echo "</body>";
echo "</html>";
// thank you message

?>