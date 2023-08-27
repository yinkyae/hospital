let eye = document.getElementById("currentEye");
let pw = document.getElementById("currentPwd");
eye.addEventListener("click", () => {
  pw.type == "password" ? (pw.type = "text") : (pw.type = "password");
  eye.classList == "fa-solid fa-eye icon"
    ? (eye.classList = "fa-solid fa-eye-slash icon")
    : (eye.classList = "fa-solid fa-eye icon");
});

let eye1 = document.getElementById("changeEye");
let pw1 = document.getElementById("changePwdBox");
eye1.addEventListener("click", () => {
  pw1.type == "password" ? (pw1.type = "text") : (pw1.type = "password");
  eye1.classList == "fa-solid fa-eye icon"
    ? (eye1.classList = "fa-solid fa-eye-slash icon")
    : (eye1.classList = "fa-solid fa-eye icon");
});