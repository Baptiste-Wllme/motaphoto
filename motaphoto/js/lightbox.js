document.addEventListener("DOMContentLoaded", () => {
  const lightbox = document.getElementById("lightbox");
  const img      = lightbox.querySelector(".lightbox__img");
  const refEl    = lightbox.querySelector(".lightbox__ref");
  const catEl    = lightbox.querySelector(".lightbox__cat");
  const gallery  = document.querySelectorAll(".photo-block img");

  let photos = [];
  let currentIndex = 0;

  // tableau des photos // 
  gallery.forEach((el, i) => {
    photos.push({
      src: el.getAttribute("src"),
      ref: el.dataset.ref || "Sans référence",
      cat: el.dataset.cat || "Sans catégorie"
    });
    el.dataset.index = i;
  });

  //  lightbox au clic //
  gallery.forEach(el => {
    el.addEventListener("click", () => {
      currentIndex = parseInt(el.dataset.index);
      showPhoto(currentIndex);
      lightbox.style.display = "flex";
    });
  });

  
  lightbox.querySelector(".lightbox__close").addEventListener("click", () => {
    lightbox.style.display = "none";
  });
  lightbox.querySelector(".lightbox__overlay").addEventListener("click", () => {
    lightbox.style.display = "none";
  });

  lightbox.querySelector(".lightbox__next").addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % photos.length;
    showPhoto(currentIndex);
  });
  lightbox.querySelector(".lightbox__prev").addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + photos.length) % photos.length;
    showPhoto(currentIndex);
  });

  function showPhoto(index) {
    img.src = photos[index].src;
    refEl.textContent = photos[index].ref;
    catEl.textContent = photos[index].cat;
  }
});
