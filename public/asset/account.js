let updateButton = document.getElementById("edit-button");
let username = document.getElementById("username");
let email = document.getElementById("email");

// submit button
let submitBtn = document.getElementById("submit-button");

// cancel button
let cancelBtn = document.getElementById("cancel-button");

updateButton.onclick = function () {
    updateButton.remove();
    username.removeAttribute("disabled");
    email.removeAttribute("disabled");

    submitBtn.classList.add("show-submit");
    submitBtn.classList.remove("submit");

    cancelBtn.classList.add("show-cancel");
    cancelBtn.classList.remove("cancel");
};

cancelBtn.onclick = function () {
    window.location.reload();
};

submitBtn.onclick = function () {
    confirm("Yakin ingin mengubah username?");
};
