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
            <a href="BuyBooks.php">Browse Listings</a>
        </div>
        <div>
            <a href="LatestAds.php">LatestAds</a>
        </div>
        <div>
            <a href="MyAds.php">My Ads</a>
        </div>
        <div>
            <a class="CurrentPage" href="Wishlist.php">Wishlist</a>
        </div>
        <div>
            <button onclick="location.href='RegistrationPage.html';">Register</button>

            <button onclick="location.href='LoginPage.html';">Login</button>

            <button onclick="location.href='BuyBooks.php';">Buy</button>

            <button onclick="location.href='CreateListing.html';">Sell</button>

        </div>
    </div>

    <div class="wishlist-container">
        <div class="Header2">
            <h2>Wishlist:</h2>

            <div class="wishlist-grid">

                <div class="wishlist-book-advert">
                    <span class="close">&times;</span>
                    <div class="details-container">
                        <div class="details">
                            <h3 class="book-title">Lord of the rings</h3>
                            <label>Price: </label>
                            <p id="price">R300 example</p><br />
                            <label>Pages: </label>
                            <p id="pages">567</p>
                        </div>
                        <div class="whishlistImg">
                            <img src="assets/Sample 1.jfif" alt="book">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







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