<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

$mySQLconn = new mysqli($host, $username, $password, $dbname, 3307);

$sql = "SELECT * FROM listings";
$all_listings = $mySQLconn->query($sql);

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
  <title>Bookstore</title>
</head>

<body class="short-body">
  <!-- Top Navigation Menu -->
  <div class="topbanner">
    <div class="topnav">
      <a href="" class="active"><img class="logo-img" src="assets/BookstoreLogo.png" alt="BookstoreLogo"></a>
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
        <a class="CurrentPage" href="LatestAds.php">LatestAds</a>
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
  </div>


  <div class="listings-container">
    <div class="books-grid">
      <?php
      while ($row = mysqli_fetch_assoc($all_listings)) {
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

            <label>Genre: </label>
            <p id="genre">
              <?php echo $row["genre"]; ?>
            </p>

            <label>Author: </label>
            <p id="author">
              <?php echo $row["author"]; ?>
            </p>

            <label>Format: </label>
            <p id="format">
              <?php echo $row["format"]; ?>
            </p>

            <label>Condition: </label>
            <p id="condition">
              <?php echo $row["bookState"]; ?>
            </p>

          </div>
          <button class="" id="myBtn">See more info</button>
          <a href="#" class="view-add-btn">View Add</a>
        </div>
        <?php
      }
      ?>
    </div>
  </div>

  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>Some text in the Modal..</p>
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