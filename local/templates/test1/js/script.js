$(document).ready(function () {
  document.querySelector("html").style.visibility = "visible";
});
$(function () {
  $("#sort-item").on("change", function () {
    var url = $(this).val(); 
    if (url) {
      window.location = url; 
    }
    return false;
  });
});
