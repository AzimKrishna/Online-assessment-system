let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");

// Check if the sidebar state is stored in local storage
const isSidebarActive = localStorage.getItem("isSidebarActive") === "true";
if (isSidebarActive) {
  sidebar.classList.add("active");
  sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
}

sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if (sidebar.classList.contains("active")) {
    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    // Save the sidebar state to local storage
    localStorage.setItem("isSidebarActive", "true");
  } else {
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    // Save the sidebar state to local storage
    localStorage.setItem("isSidebarActive", "false");
  }
};
