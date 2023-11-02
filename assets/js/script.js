const body = document.querySelector("body"),
  nav = document.querySelector("nav"),
  modeToggle = document.querySelector(".dark-light"),
  searchToggle = document.querySelector(".search-toogle"),
  sidebarOpen = document.querySelector(".sidebar-open"),
  sidebarClose = document.querySelector(".sidebar-close");

let getMode = localStorage.getItem("mode");
if (getMode && getMode === "dark-mode") {
  body.classList.add("dark")
}
// modeToggle.addEventListener("click", () => {
//   modeToggle.classList.toggle("active");
//   body.classList.toggle("dark");

//   if (!body.classList.contains("dark")) {
//     localStorage.setItem("mode", "light-mode");
//   } else {
//     localStorage.setItem("mode", "dark-mode")
//   }
// });

searchToggle.addEventListener("click", () => {
  searchToggle.classList.toggle("active")
});

sidebarOpen.addEventListener("click", () => {
  nav.classList.add("active");
});

body.addEventListener("click", e => {
  let elementOnclick = e.target;

  if (!elementOnclick.classList.contains("sidebar-open") && !elementOnclick.classList.contains("menu")) {
    nav.classList.remove("active");
  }
})

// let category = document.querySelectorAll('.category a')
let link = document.querySelectorAll('.link-category')

for (let i = 0; i < link.length; i++) {
  let element = link[i];
  element.addEventListener('click', function (e) {
    // e.preventDefault()
    let current = document.getElementsByClassName('active')
    if (current.length > 0) {
      current[0].className = current[0].className.replace('active', '')
      this.className += ' active'
    }
  })
}
