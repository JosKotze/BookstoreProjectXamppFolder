<?php
$title = $_POST["title"];
$author = $_POST["author"];
$pageNum = $_POST["pageNum"];
$publisher = $_POST["publisher"];
$condition = $_POST["condition"];
$format = $_POST["format"];
$genre = $_POST["genre"];
$filename = $_FILES["uploadPicture"]["name"];
$city = $_POST["city"];
$province = $_POST["province"];
$shipping = $_POST["shipping"];
$collection = $_POST["collection"];
$price = $_POST["price"];
$id = 2;
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

$sql = "Select listing_id, title, author, pageNum, publisher, bookSate, format, genre, uploadPicture, city, province, shipping, bookState, price
From listings"
// saving the sql insert into statement as a variable. The values are the data we got
// from the html form.

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $title, $author, $pageNum, $publisher, $condition, $format, $genre, $filename, $city, $province, $shipping, $collection, $price);
$stmt->fetch();
$stmt->close();

echo "<div class='book-advert'>";
echo "<img src="$filename" alt='book'>";
echo "<h3 class='book-title'> $title </h3>";
echo "<div class='details'>";
echo "<label>Price: </label><p id="$price">R300 example</p><br/>";
echo "<label>Pages: </label><p id="$pageNum">567</p>";
echo "</div>";
echo "<a href="" class='view-add-btn'>View Add</a>";
echo "</div>";          
        

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
    // $mysqli->query($sql) returned true. The data is succesfully inserted.
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    // Else some sort of error to be described.
}

// If we reach this point the record is saved and promted to the user.

$mysqli->close(); // Close connection
/*
if (isset($_POST["Register-btn"])) {
    // (deal with the submitted fields here) 
    header("Location: BookStore.html");
    exit;
}
*/
?>