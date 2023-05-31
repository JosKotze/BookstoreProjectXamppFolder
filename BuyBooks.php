<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

$conn = new mysqli($host, $username, $password, $dbname, 3307);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve search parameters from the form
$keyword = $_GET['query'];
$format = $_GET['format'];
$genre = $_GET['genre'];

// Construct the SQL query based on the search parameters
$sql = "SELECT * FROM listings WHERE 1=1";
if (!empty($keyword)) {
    $sql .= " AND (title LIKE '%$keyword%')";
}
if (!empty($format)) {
    $sql .= " AND format = '$format'";
}
if (!empty($genre)) {
    $sql .= " AND genre = '$genre'";
}
/*
if (!empty($keyword)) {
    $sql .= " AND (title LIKE '%$keyword%' OR description LIKE '%$keyword%')";
}
*/

// Execute the query and fetch the results
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/BookstoreIcon.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js" charset="utf-8"></script>
    <title>Bookstore</title>
</head>

<body>
    <!-- Top Navigation Menu -->
    <div class="topbanner">
        <div class="topnav">
            <a href="" class="active"><img class="logo-img" src="assets/BookstoreLogo.png" alt="BookstoreLogo"></a>
        </div>
    </div>

    <div class="second-lv-btns">
        <div>
            <a href="BookStore.html">Home</a>
        </div>
        <div>
            <a href="CreateListing.html">Create Listing</a>
        </div>
        <div>
            <a class="CurrentPage" href="BuyBooks.php">Browse Listings</a>
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

            <button onclick="location.href='LoginPage.html';">Login</button>

            <button onclick="location.href='BuyBooks.php';">Buy</button>

            <button onclick="location.href='CreateListing.html';">Sell</button>

        </div>
    </div>

    <h1>Search for a book</h1>
    <form method="GET" action="BuyBooks.php">
        <input type="text" name="query" placeholder="Search by keyword">

        <select id="format" name="format">
            <option value="">Any format</option>
            <option value="PDF">PDF</option>
            <option value="Hardcover">Hardcover</option>
            <option value="Paperbacks">Paperback</option>
        </select>

        <select class="select-scrollbar" id="genre" name="genre">
            <option value="">Any Genre</option>
            <option value="Action">Action</option>
            <option value="Academic">Academic (for the students)</option>
            <option value="Adventure">Adventure</option>
            <option value="Autobiography">Autobiography</option>
            <option value="Biography">Biography</option>
            <option value="Business">Business</option>
            <option value="Children's">Children's</option>
            <option value="Comedy">Comedy</option>
            <option value="Crime">Crime</option>
            <option value="Drama">Drama</option>
            <option value="Dystopian">Dystopian</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Fiction">Fiction</option>
            <option value="Historical Fiction">Historical Fiction</option>
            <option value="Horror">Horror</option>
            <option value="Memoir">Memoir</option>
            <option value="Mystery">Mystery</option>
            <option value="Non-fiction">Non-fiction</option>
            <option value="Paranormal">Paranormal</option>
            <option value="Philosophy">Philosophy</option>
            <option value="Poetry">Poetry</option>
            <option value="Religion/Spirituality">Religion/Spirituality</option>
            <option value="Romance">Romance</option>
            <option value="Science">Science</option>
            <option value="Science Fiction">Science Fiction</option>
            <option value="Self-help">Self-help</option>
            <option value="Suspense">Suspense</option>
            <option value="Thriller">Thriller</option>
            <option value="Travel">Travel</option>
            <option value="Western">Western</option>
            <option value="Young Adult">Young Adult</option>
        </select>

        <input type="submit" value="Search">
    </form>


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