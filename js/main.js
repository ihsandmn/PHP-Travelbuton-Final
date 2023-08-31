// Toggle class Active
const navbarNav = document.querySelector(".navbar-nav");

// Ketika Hamburger Menu di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// Klik diluar sidebar utuk menghilangkan nav
const hamburger = document.querySelector("#hamburger-menu");

document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

// Klik untuk mengubah tema website
var theme = document.getElementById("light-dark");
var logo = document.querySelector(".navbar-logo");

theme.onclick = function () {
  document.body.classList.toggle("dark-theme");
};

// Ubah Logo Travel IMG (--scrapt--)
//   if (document.body.classList.contains("dark-theme")) {
//     logo.src = "../asset/logo2.png";
//   } else {
//     logo.src = "../asset/logo1.png";
//   }
// };
