const userImg = document.getElementById("user-img");
const userList = document.querySelector(".users-list");

userImg.addEventListener("click", () => {
     location.href = "";
});

window.addEventListener("load", async () => {
     navigator.sendBeacon("php/onload.php", new Blob());
});

window.addEventListener("beforeunload", (event) => {
     navigator.sendBeacon("php/unload.php", new Blob());
});

setInterval(async () => {
     try {
          const response = await fetch("php/users.php",
               {
                    method: "GET"
               }
          );

          const data = await response.text();
          userList.innerHTML = data;
     }
     catch(error) {
          console.error(`HTTP error: ${error}`);
     }
}, 500);