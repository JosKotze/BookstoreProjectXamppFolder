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
$keyword = isset($_GET['query']) ? $_GET['query'] : '';
$format = isset($_GET['format']) ? $_GET['format'] : '';
$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
// isset helps avoid the warming "Undefined array key" if you don't search anything

$sqlSearch = "SELECT * FROM listings WHERE 1=1";
if (!empty($keyword)) {
    $sqlSearch .= " AND (title LIKE '%$keyword%')";
}
if (!empty($format)) {
    $sqlSearch .= " AND (title LIKE '%$keyword%' OR genre LIKE '%$format%')";
}
if (!empty($genre)) {
    $sqlSearch .= " AND (title LIKE '%$keyword%' OR format LIKE '%$format%' OR genre LIKE '%$genre%')";
}
if (!empty($genre) || !empty($format)) {
    $sqlSearch .= " AND (format LIKE '%$format%' AND genre LIKE '%$genre%')";
}
if (!empty($genre) || !empty($format) || !empty($keyword)) {
    $sqlSearch .= " AND (title LIKE '%$keyword%' AND format LIKE '%$format%' AND genre LIKE '%$genre%')";
}
$result = $conn->query($sqlSearch);

//$sql = "SELECT * FROM listings";

//$all_listings = $conn->query($sql);

// Execute the query and fetch the results


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
            <a href="BookStore.html" class="active"><img class="logo-img" src="assets/BookstoreLogo.png"
                    alt="BookstoreLogo"></a>
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



    <div class="listings-container">

        <div class="books-grid">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {

                $listingTablecontactID = $row["contact_id"];
                //echo $listingTablecontactID;
                //if ($listingTBcontactID != null) {
                $specificListingQuery = "SELECT * FROM contactinfo WHERE contactInfo_ID = '$listingTablecontactID'";
                $contact_info = $conn->query($specificListingQuery);
                $contact_row = mysqli_fetch_assoc($contact_info);
                //echo $contact_row["contactInfo_ID"];
                //}
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
                        <label>Price: R</label>
                        <p id="price">
                            <?php echo $row["price"]; ?>
                        </p><br />
                        <label>Pages: </label>
                        <p id="pages">
                            <?php echo $row["pageNum"]; ?>
                        </p><br />

                        <label>Genre: </label>
                        <p id="genre">
                            <?php echo $row["genre"]; ?>
                        </p><br />

                        <label>Author: </label>
                        <p id="author">
                            <?php echo $row["author"]; ?>
                        </p><br />

                        <label>Format: </label>
                        <p id="format">
                            <?php echo $row["format"]; ?>
                        </p><br />

                        <label>Condition: </label>
                        <p id="condition">
                            <?php echo $row["bookState"]; ?>
                        </p><br />
                        <label>Shipping: </label>
                        <p id="shipping">
                            <?php echo $row["shipping"]; ?>
                        </p><br />
                        <label>Collection: </label>
                        <p id="collection">
                            <?php echo $row["collect"]; ?>
                        </p><br />
                        <div class="show-seller-details">
                            <button onclick="showDiv('toggle<?php echo $row['listing_id']; ?>')">Show contact
                                details</button>
                            <button onclick="hideDiv('toggle<?php echo $row['listing_id']; ?>')">Hide
                                details</button>
                        </div>
                        <div id="toggle<?php echo $row["listing_id"]; ?>" style="display:none" class="sub-menu-wrap">
                            <div class="sub-menu">
                                <div class="user-info">
                                    <h2>
                                        <?php
                                        echo $contact_row["fName"];
                                        ?>
                                        <?php
                                        echo $contact_row["lName"];
                                        ?>
                                    </h2>
                                    <hr>
                                    <h3>Details:</h3>
                                </div>
                                <label>Cell number: </label>
                                <p id="cellNum">
                                    <?php
                                    echo $contact_row["cellNum"];
                                    ?>
                                </p><br />
                                <label>Email: </label>
                                <p id="email">
                                    <?php
                                    echo $contact_row["email"];
                                    ?>
                                </p><br />
                                <label>Contact Preference: </label>
                                <p id="contactMeth">
                                    <?php
                                    echo $contact_row["contactMeth"];
                                    ?>
                                </p><br />
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
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

        <script>
            function showDiv(toggleID) {
                document.getElementById(toggleID).style.display = 'block';
            }

            function hideDiv(toggleID) {
                document.getElementById(toggleID).style.display = 'none';
            }
        </script>
</body>

</html>