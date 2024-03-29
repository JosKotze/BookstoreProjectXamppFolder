
import mysql from 'mysql';

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "bookstore_db"
});

con.connect(function(err) {
  if (err) throw err;
  // if connection is successful
  con.query("SELECT * FROM listings", function (err, result, fields) {
    // if any error while executing above query, throw error
    if (err) throw err;
    // if there is no error, you have the result
    // iterate for all the rows in result
    Object.keys(result).forEach(function(key) {
      var row = result[key];
      console.log(row.name)
    });
  });
});

const Listing = [];



const createListingCard = () => {
  listings.forEach((listing) => {
    let bookListing = document.createElement("div");
    bookListing.classList.add("book-advert");

    let coverpage = document.createElement("img");
    image.src = listing.image;

    let title = document.createElement("h3");
    title.innerHTML = listing.title;
    title.classList.add("book-title");

    let details = document.createElement("div");
    details.innerHTML = listing.details;
    details.classList.add("details");

        let t1 = document.createElement("label");
        details.innerHTML = "Price: ";

        let price = document.createElement("p");
        price.innerHTML = listing.price;
        price.classList.add("price");

        let t2 = document.createElement("label");
        details.innerHTML = "Pages: ";

        let pages = document.createElement("p");
        pages.innerHTML = listing.pages;
        pages.classList.add("pages");
    
    let viewAddBtn = document.createElement("a");
    viewAddBtn.href = listing.link; // Moet nog link add na n listing page
    viewAddBtn.innerHTML = "View Add";
    viewAddBtn.classList.add("viewAddBtn");

    bookListing.appendChild("coverpage");
    bookListing.appendChild("title");
    bookListing.appendChild("details");
    bookListing.appendChild("viewAddBtn");

    listingsContainer.appendChild(bookListing);
    window.alert("Everything appended");
  })
}

/*
function showListing(str) {
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    }

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
    xhttp.open("GET", "process-LatestAds.php?q="+str);
    xhttp.send();
  }

function getBookCover() {
  var isbn = $('.book').data('isbn');

  $.ajax({
    dataType: 'json',
    url: 'https://www.googleapis.com/books/v1/volumes?q=isbn:' + isbn,
    success: handleResponse
  });

  function handleResponse( response ) {
    $.each( response.items, function( i, item ) {
      
      var title    = item.volumeInfo.title,
          author   = item.volumeInfo.authors[0],        
          thumb    = item.volumeInfo.imageLinks.thumbnail;
      
      $('.title').text( title );
      $('.author').text( author );
      $('.thumbnail').attr('src', thumb);
    });
  }
}
  
function CreateListingObj() {

    var mysql = require('mysql');
    var con = mysql.createConnection({
      host: "localhost",
      user: "root",
      password: "",
      database: "bookstore_db"
    });
    con.connect(function(err) {
      if (err) throw err;
      con.query("SELECT * FROM listings", function (err, result, fields) {
        if (err) throw err;
        console.log(result);
      });
    });

}
*/
