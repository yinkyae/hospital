var img = document.getElementById("image");

function setImage() {
    let files = document.getElementById("uploadFile").files;
    if (files.length == 0)
        return;
    let file = files[0];
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
        img.src = reader.result;
    }
}

