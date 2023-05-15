<?php
$email = $_POST["email"];
$firstName = $_POST["fName"];
$lastName = $_POST["lName"];
$username = $_POST["username"];
$userPassword1 = $_POST["password1"];
$userPassword2 = $_POST["password2"];
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

$sql = "INSERT INTO users (user_id , email, fName, lName, username, password)
Values ('' ,'$email', '$firstName', '$lastName', '$username', '$userPassword1')";
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