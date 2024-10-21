if(!sessionStorage.getItem("pageLoaded")) {
     sessionStorage.setItem("pageLoaded", "true"); // Mark the page as loaded
     navigator.sendBeacon("php/onload.php", new Blob()); // Send "Active" status
}

window.addEventListener("load", () => {
     navigator.sendBeacon("php/onload.php", new Blob()); // Send "Active" status  
});