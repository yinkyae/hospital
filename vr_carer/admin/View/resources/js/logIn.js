let eye = document.getElementById("eye");
let pw = document.getElementById("pw");
eye.addEventListener("click", () => {
  pw.type == "password" ? (pw.type = "text") : (pw.type = "password");
  eye.classList == "fa-solid fa-eye"
    ? (eye.classList = "fa-solid fa-eye-slash")
    : (eye.classList = "fa-solid fa-eye");
});
