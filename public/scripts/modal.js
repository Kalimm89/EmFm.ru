document.addEventListener("DOMContentLoaded", function () {
  var elems = document.querySelectorAll(".modal");
  var instances = M.Modal.init(elems, "open");

  var instance = M.Modal.getInstance(document.querySelector(".modal"));

});
