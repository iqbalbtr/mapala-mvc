const tutup = document.getElementById("close-notif");
const pesanContainer = document.querySelector(".content-pesan");
const notif = document.querySelector(".notif");

if (pesanContainer.textContent.length >= 1) {
    notif.style.display = "block";
    setTimeout(() => notif.style.display = "none", 2500);
}

tutup.addEventListener("click", () => {
    console.log("ok");
    notif.style.display = "none";
    pesan = "";
});