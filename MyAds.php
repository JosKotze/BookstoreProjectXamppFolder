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
/*
$sql = "SELECT * FROM listings WHERE 1=1";
if (!empty($keyword)) {
    $sql .= " AND (title LIKE '%$keyword%')";
}
if (!empty($format) || !empty($genre)) {
    $sql .= " AND (title LIKE '%$format%' OR genre LIKE '%$genre%')";
}
*/
$sql = "SELECT * FROM listings WHERE 1=1";
if (!empty($keyword)) {
    $sql .= " AND (title LIKE '%$keyword%')";
}
if (!empty($format)) {
    $sql .= " AND (title LIKE '%$keyword%' OR genre LIKE '%$format%')";
}
if (!empty($genre)) {
    $sql .= " AND (title LIKE '%$keyword%' OR format LIKE '%$format%' OR genre LIKE '%$genre%')";
}
if (!empty($genre) || !empty($format)) {
    $sql .= " AND (format LIKE '%$format%' AND genre LIKE '%$genre%')";
}
if (!empty($genre) || !empty($format) || !empty($keyword)) {
    $sql .= " AND (title LIKE '%$keyword%' AND format LIKE '%$format%' AND genre LIKE '%$genre%')";
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
    <link rel="shortcut icon" type="image/x-icon" href="BookstoreIcon.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js" charset="utf-8"></script>
    <title>Bookstore</title>
</head>

<body>
    <!-- Top Navigation Menu -->
    <div class="topbanner">
        <div class="topnav">
            <a href="BookStore.html" class="active"><img class="logo-img" src="assets/BookstoreLogo.png" alt="BookstoreLogo"></a>
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
            <a href="BuyBooks.php">Browse Listings</a>
        </div>
        <div>
            <a href="LatestAds.php">LatestAds</a>
        </div>
        <div>
            <a class="CurrentPage" href="MyAds.php">My Ads</a>
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


    <div class="listings-container">
        <div class="books-grid">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="book-advert">
                    <?php
                    $data = $row["encodeImgData"];
                    echo '<img src="data:image/gif;base64,' . $data . '" />';
                    ?>
                    <h3 class="book-title">
                        <?php echo $row["title"]; ?>
                    </h3>
                    <div class="details">
                        <label>Price: </label>
                        <p id="price">
                            <?php echo $row["price"]; ?>
                        </p><br />
                        <label>Pages: </label>
                        <p id="pages">
                            <?php echo $row["pageNum"]; ?>
                        </p>
                    </div>
                    <a href="#" class="view-add-btn">View Add</a>
                </div>
                <?php
            }
            ?>
        </div>
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