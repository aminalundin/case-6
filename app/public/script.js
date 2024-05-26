// DOMS
const menu = document.querySelector("button#menu-button");


// EVENT LISTENERS - BUTTONS

menu.addEventListener("click", function (event) {
    console.log("click");
});



// FUNCTIONS

function displayMenu() {
    let burgerMenu = document.getElementById("burger_menu");


    if (burgerMenu.style.display === "none") {
        burgerMenu.style.display = "block";

    } else {
        burgerMenu.style.display = "none";
    }
}

