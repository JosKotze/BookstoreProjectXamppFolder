
const listings = [
  {
    title: title,
    author: author,
    pageNum: pageNum,
    publisher: publisher,
    condition: condition,
    format: format,
    genre: genre,
    coverpage: coverpage,
    city: city,
    province: province,
    shipping: shipping,
    collection: collection,
    price: price
  },
];



const listingsContainer = document.querySelector(".listings-container .books-grid");

function createListingArray(listings) {
  var title = document.getElementById('title').innerHTML;
  var author = document.getElementById('author').innerHTML;
  var pageNum = document.getElementById('pageNum').innerHTML;
  var publisher = document.getElementById('publisher').innerHTML;
  var condition = document.getElementById('condition').innerHTML;
  var format = document.getElementById('format').innerHTML;
  var genre = document.getElementById('genre').innerHTML;
  var coverpage = document.getElementById('uploadPicture').innerHTML;
  var city = document.getElementById('city').innerHTML;
  var province = document.getElementById('province').innerHTML;
  var shipping = document.getElementById('shipping').innerHTML;
  var collection = document.getElementById('collection').innerHTML;
  var price = document.getElementById('price').innerHTML;

  const listingObject = {
    title: title,
    author: author,
    pageNum: pageNum,
    publisher: publisher,
    condition: condition,
    format: format,
    genre: genre,
    coverpage: coverpage,
    city: city,
    province: province,
    shipping: shipping,
    collection: collection,
    price: price
  };

  listings.unshift(listingObject); // add object to the start of array for latest posts

  createListingCard();
  alert("Listing created");
}


function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function redirectToHomepage()
{
  window.location.href = "BookStore.html";
}

function CompareAndValidatePassword() {
  var pass1 = document.getElementById("password1").value;
  var pass2 = document.getElementById("password2").value;
  let UserPassBool = false;

  if (pass1.length < 8){
    alert("password too short");
    UserPassBool = false;
  }
  
  if (!/[A-Z]/.test(pass1) || !/[a-z]/.test(pass1) || !/[0-9]/.test(pass1) || !/[!@#$%^&*()\-=_+[\]{}|\\:;"'<>,.?]/.test(pass1))
  {
    alert("Your password needs at least one uppercase letter, one lowercase letter, one number, and one special character.")
    UserPassBool = false;
  }

  if(pass1 !== pass2)
  {
    alert("Your passwords do not match.");
    UserPassBool = false;
  }
  else{
    alert("You may proceed.");
    UserPassBool = true;
  } 

  if(UserPassBool == true){
    redirectToHomepage();
  }
}

let popup = document.getElementById("popup");

function displayPopup() {
  popup.classList.add("display-popup");
}

function closePopup() {
  popup.classList.remove("close-popup");
}