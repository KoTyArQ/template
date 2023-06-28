// Get the modal
var modal = document.getElementById("myModal");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
function add2basket(ID) {
  $.ajax({
    type: "POST",
    url: "/local/php_interface/divier/add2basket__ajax.php",
    data: {
      PRODUCT_ID: ID,
    },
    success: function (msg) {
      modal.style.display = "block";
    },
  });
}
