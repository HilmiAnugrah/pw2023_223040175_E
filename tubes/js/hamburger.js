// Ambil reference untuk elemen button
const button = document.querySelector("button.menu-togel");
const closes = document.querySelector("button.close");
// Ambil reference untuk elemen menu-popup
const menuPopup = document.querySelector("div.menu-popup");
const showPopup = document.querySelector("div.show-popup");

// Tambahkan event listener untuk button ketika diklik
button.addEventListener("click", () => {
  menuPopup.style.transform = "translateY(0)";
  showPopup.style.transform = "translateY(0)";
});
closes.addEventListener("click", () => {
  menuPopup.style.transform = "scale(0%)";
  showPopup.style.transform = "translateY(100%)";
  menuPopup.style.transition = "transform 0.5s ease-in-out";
});

// ketika seach focus akan ada perubahan pada style position
