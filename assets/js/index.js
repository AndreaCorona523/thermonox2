window.scrollTo({ top: 0});
const offcanvas = document.querySelector(".offcanvas")
const body = document.querySelector("body");
const cover = document.getElementById("cover");
const menuButton = document.getElementById("menu-icon");

const toggleMenu = () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
  body.classList.toggle("body--offcanvas");
  offcanvas.classList.toggle("offcanvas--show");
  cover.classList.toggle("cover--show");
}

menuButton.addEventListener("click", toggleMenu);
cover.addEventListener("click",toggleMenu);
