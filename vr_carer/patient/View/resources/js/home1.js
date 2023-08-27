document.addEventListener("DOMContentLoaded", function () {
  new Splide("#carousel", {
    type: "loop",
    perPage: 1,
    autoplay: true,
  }).mount();
});