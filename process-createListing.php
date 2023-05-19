<?php

$title = $_POST["title"];
$author = $_POST["author"];
$pageNum = $_POST["pageNum"];
$publisher = $_POST["publisher"];
$condition = $_POST["condition"];
$format = $_POST["format"];
$genre = $_POST["genre"];
/*
$file = $this->image["uploadPicture"];
'file_get_contents($file)', '$this->image_id',
*/

$target_dir = "uploads/";
$file = $target_dir . basename($_FILES["uploadPicture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$filename = pathinfo($file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["uploadPicture"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


$city = $_POST["city"];
$province = $_POST["province"];
$shipping = $_POST["shipping"];
$collection = $_POST["collection"];
$price = $_POST["price"];
// Creating variables to save form data from HTML

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

$sql = "INSERT INTO listings (listing_id, title, author, pageNum, publisher, bookState, format, genre, uploadPicture, imageName, city, province, shipping, collect, price) 
VALUES ('', '$title', '$author','$pageNum','$publisher','$condition','$format', '$genre', '$file', '$filename', '$city', '$province', '$shipping', '$collection', '$price')";
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

if (isset($_POST["Register-btn"])) {
    // (deal with the submitted fields here) 
    header("Location: BookStore.html");
    exit;
}


?>