<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

$mySQLconn = new mysqli($host, $username, $password, $dbname, 3307);

$sql = "SELECT * FROM listings";
$all_listings = $mySQLconn->query($sql);

$listing_id = $_COOKIE["listingId"];

$specificListingQuery = "SELECT * FROM listings WHERE listing_id LIKE '%$listing_id%'";
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

            <label>listing id: </label>
            <p id="listing_id">
              <?php
              echo $row["listing_id"];
              ?>
            </p><br />
          </div>
          <button onclick="displayPopup()" id="myBtn">Open Modal</button>
          <a href="#" class="view-add-btn">View Add</a>
        </div>
        <?php
      }
      ?>
    </div>
  </div>

  <!-- The Modal -->
  <div id="myModal" class="modal">
    <?php
    $sqlconnection = $mySQLconn->query($specificListingQuery);
    $field = mysqli_fetch_assoc($sqlconnection)
      ?>
    <!-- Modal content -->
    <div class="modal-content">

      <div class="modal-header">
        <span class="close">&times;</span>
        <div>
          <h1>book-title</h1>
        </div>
      </div>
      <div class="modal-body">
        <h2>Seller Contact details</h2>
        <p class="listingIdClass">
          <?php $field["listing_id"] ?>
        </p>
        <p>Some other text...</p>
      </div>
      <div class="modal-footer">
        <h2>Book details</h2>
        <img src="assets/Sample 7.png" alt="BookstoreLogo">
      </div>
    </div>
    <?php

    ?>
  </div>

  <script>

    //var listingId = "<?php echo $row["listing_id"]; ?>";

    var listing_ID = $('listingIdClass').html();

    // Creating a cookie after the document is ready
    $(document).ready(function () {
      createCookie("listingId", listing_ID, "10");
    });

    // Function to create the cookie
    function createCookie(name, value, days) {
      var expires;

      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
      }
      else {
        expires = "";
      }

      document.cookie = escape(name) + "=" +
        escape(value) + expires + "; path=/";
    }

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    function displayPopup() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

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