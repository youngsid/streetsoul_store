document.addEventListener("DOMContentLoaded", function () {
    const adContainer = document.getElementById("quangcao");
    const ads = adContainer.getElementsByTagName("img");
    let currentAdIndex = 0;
    function showNextAd() {
        ads[currentAdIndex].style.display = "none";
        currentAdIndex = (currentAdIndex + 1) % ads.length;
        ads[currentAdIndex].style.display = "block";
    }
    setInterval(showNextAd, 2500); // Chuyển đổi mỗi 3 giây (3000 milliseconds)
});
