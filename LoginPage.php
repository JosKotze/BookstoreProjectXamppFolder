<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="BookstoreIcon.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js" charset="utf-8"></script>
    <title>Bookstore</title>
</head>

<body class="short-body">
    <!-- Top Navigation Menu -->
    <div class="topbanner">
        <div class="topnav">
            <a href="BookStore.html" class="active"><img class="logo-img" src="assets/BookstoreLogo.png"
                    alt="BookstoreLogo"></a>
        </div>
        <div class="second-lv-btns">
            <div>
                <a href="BookStore.html">Home</a>
            </div>
            <div>
                <a href="CreateListing.html">Create Listing</a>
            </div>
            <div>
                <a href="BuyBooks.php">Browse Listings</a>
            </div>
            <div>
                <a href="LatestAds.php">LatestAds</a>
            </div>
            <div>
                <a href="MyAds.php">My Ads</a>
            </div>
            <div>
                <a href="Wishlist.php">Wishlist</a>
            </div>
            <div>
                <button onclick="location.href='RegistrationPage.html';">Register</button>

                <button class="CurrentPage" onclick="location.href='LoginPage.html';">Login</button>

                <button onclick="location.href='BuyBooks.php';">Buy</button>

                <button onclick="location.href='CreateListing.html';">Sell</button>
            </div>
        </div>
    </div>


    <div class="form-container">
        <form class="login-form">
            <h1>Login</h1>
            <label for="mail">Eamil:</label>
            <input type="mail" id="mail" name="mail" placeholder="Enter your email">

            <label for="pass">Password:</label>
            <input type="pass" id="pass" name="pass" placeholder="Enter your password">

            <input type="submit" value="Login">
        </form>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <p>&copy; 2023 Bookstore. All rights reserved.</p>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>
<?php

$emailUI = $_GET['mail'];
$passwordUI = $_GET['pass'];

if (!isset($_GET['mail']) && !isset($_GET['pass'])) {

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

    $sql = "SELECT * FROM users WHERE email LIKE '%$emailUI%' AND password LIKE '%$passwordUI%'";
    // saving the sql insert into statement as a variable. The values are the data we got
    // from the html form.
    $result = $mysqli->query($sql);

    $row = mysqli_fetch_assoc($result);
    // Validate password (e.g., minimum length)


    if (!filter_var($emailUI, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
}

$actualPass = $row['password'];
$actualemail = $row['email'];


// Perform authentication check
// Compare the submitted credentials with the stored credentials in your database
// You'll need to establish a database connection and execute the appropriate query
$authenticated = false; // Placeholder value, replace with actual authentication check

if ($emailUI == $actualemail && $passwordUI == $actualPass) {
    $authenticated = true;
}

if ($authenticated) {
    // Authentication successful
    // Start a session
    session_start();

    // Store the user's email in the session
    $_SESSION['email'] = $emailUI;

    // Redirect the user to a secure page or their profile page
    header("Location: Bookstore.html");
    exit();
} else {
    // Authentication failed
    echo "Invalid email or password";
}

// ======

// ======

?>