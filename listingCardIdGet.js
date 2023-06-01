

  //var listingId = "<?php echo $row["listing_id"]; ?>";

  function elementAttributeVal() {
    var listing_ID = $('listingIdClass').html();
    var listing_ID_twee = element.getAttribute('listingIdClass');

    alert(listing_ID);
    alert(listing_ID_twee);

    

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





  /*
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
  */
  
  
