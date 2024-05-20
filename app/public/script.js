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

// function displayLogInForm() {
//     let logInForm = document.getElementById("form-log-in");


//     if (logInForm.style.display === "none") {
//         logInForm.style.display = "block";
//     } else {
//         logInForm.style.display = "none";
//     }
// }


// const registerButton = document.querySelector("button#reg-button");
// const registerForm = document.querySelector("form#form-register");

// registerButton.addEventListener("click", function(event) {
//     console.log("click");

//     let regForm = registerForm.innerHTML;

//     console.log(regForm);

//     if (event.target.onClick(registerButton)) {
//         event.target.classList.toggle("form-hidden");
// ;
//     }
//   });



// const closeTab = document.querySelector(".close");
// const closeLogInTab = document.querySelector(".closeLogIn");

// closeLogInTab.addEventListener("click", function (event) {
//     console.log("click");
// });

// closeTab.addEventListener("click", function (event) {
//     console.log("click");
// });

