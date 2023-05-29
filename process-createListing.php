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
echo ($filePath);
$image = file_get_contents($filePath);
$encodeImgData = base64_encode($image);

/*
$filename = $_FILES["uploadPicture"]["name"];
$tempname = $_FILES["uploadPicture"]["tmp_name"];
$folder = "C:\xampp\htdocs\BookstoreProjectXamppFolder/ListingImages/" . $filename;
*/
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

/*
// Now let's move the uploaded image into the folder: image
if (move_uploaded_file($tempname, $folder)) {
    echo "<h3>  Image uploaded successfully!</h3>";
} else {
    echo "<h3>  Failed to upload image!</h3>";
}
*/

// saving the sql insert into statement as a variable. The values are the data we got
// from the html form.

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
    // $mysqli->query($sql) returned true. The data is succesfully inserted.
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // Else some sort of error to be described.
}

// If we reach this point the record is saved and promted to the user.

$mysqli->close(); // Close connection

?>