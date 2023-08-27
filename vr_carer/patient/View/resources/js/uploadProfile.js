var img = document.getElementById("photo");

function setImage() {
  let files = document.getElementById("file_input").files;

  if (files.lengeth == 0) return;

  let file = files[0];
  const reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = () => {
    img.src = reader.result;
  };
}
