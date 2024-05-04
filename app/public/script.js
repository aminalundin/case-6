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

// DOMS
const signUp = document.querySelector("button#sign-up");
const logIn = document.querySelector("button#log-in");

// EVENT LISTENERS

signUp.addEventListener("click", function (event) {
    console.log("click");
});

logIn.addEventListener("click", function (event) {
    console.log("click");
});

function displayRegForm() {
    let regForm = document.getElementById("form-register");


    if (regForm.style.display === "none") {
        regForm.style.display = "block";
    } else {
        regForm.style.display = "none";
    }
}

function displayLogInForm() {
    let logInForm = document.getElementById("form-log-in");


    if (logInForm.style.display === "none") {
        logInForm.style.display = "block";
    } else {
        logInForm.style.display = "none";
    }
}


