
var check = document.getElementById("res__action");
check.addEventListener("click", function () {
  document.querySelector(".form-login__action").style.display = "block";
  document.querySelector(".res__action--text").style.display = "none";
  document.querySelector(".forgot-password").style.display = "none";
  var arr = document.querySelectorAll(".login__text");
  arr.forEach(function (val) {
    val.textContent = "Đăng ký";
  });
});

var dk = document.querySelector(".submit-btn");
dk.addEventListener("click", function (e) {

  e.preventDefault(); // Ngăn chặn hành vi mặc định
  if (dk.textContent) {
    console.log(dk.textContent);
    location.reload();
  }
});
