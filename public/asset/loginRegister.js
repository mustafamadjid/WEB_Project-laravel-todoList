let signUpBtn = document.getElementById("signUpBtn");
let signInBtn = document.getElementById("signInBtn");
let nameField = document.getElementById("nameField");
let title = document.getElementById("title");
let action = document.getElementById("form");

signInBtn.onclick = function () {
    nameField.style.maxHeight = "0";
    title.innerHTML = "Sign In";
    signUpBtn.classList.add("disable");
    signInBtn.classList.remove("disable");

    action.setAttribute("action", "http://127.0.0.1:8000/session/login");
};

signUpBtn.onclick = function () {
    nameField.style.maxHeight = "65px";
    title.innerHTML = "Sign Up";
    signInBtn.classList.add("disable");
    signUpBtn.classList.remove("disable");

    action.setAttribute("action", "http://127.0.0.1:8000/session/register");
};
