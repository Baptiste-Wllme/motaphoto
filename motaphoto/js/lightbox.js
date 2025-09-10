document.addEventListener("DOMContentLoaded", () => {
  const lightbox = document.getElementById("lightbox");
  const img      = lightbox.querySelector(".lightbox__img");
  const refEl    = lightbox.querySelector(".lightbox__ref");
  const catEl    = lightbox.querySelector(".lightbox__cat");

  let currentGallery = [];
  let currentIndex   = 0;

  //J'ai reconstruis une galerie photo à partir d'un conteneur
  function buildGallery(container) {
    const photos = Array.from(container.querySelectorAll(".photo-img"));
    photos.forEach((el, i) => {
      el.dataset.index = i;
    });
    return photos;
  }

  // Trouver le dossier parent qui est soit container-photos ou related-photos-list pour que ça touche la gallerie et les photos dans single-photo
  function findGalleryContainer(el) {
    return el.closest(".container-photos, .related-photos-list");
  }

  // Afficher la photo courante
  function showByIndex(index) {
    if (!currentGallery.length) return;
    const el = currentGallery[index];
    if (!el) return;

    img.src = el.getAttribute("src");
    refEl.textContent = el.dataset.ref || "Sans référence";
    if (catEl) {
      catEl.textContent = el.dataset.cat || "Aucune catégorie";
    }
  }



  
  

  //  Clic sur bouton fullscreen qui ouvre lightbox
  document.addEventListener("click", (e) => {
    const btn = e.target.closest(".btn-fullscreen");
    if (!btn) return;

    e.stopPropagation();
    const photo = btn.closest(".container-photo-block").querySelector(".photo-img");
    if (!photo) return;

    const container = findGalleryContainer(photo);
    currentGallery = buildGallery(container);
    currentIndex   = currentGallery.indexOf(photo);
    if (currentIndex === -1) currentIndex = 0;

    showByIndex(currentIndex);
    lightbox.style.display = "flex";
  });

  // Fermer lightbox
  lightbox.querySelector(".lightbox__close").addEventListener("click", () => {
    lightbox.style.display = "none";
  });
  lightbox.querySelector(".lightbox__overlay").addEventListener("click", () => {
    lightbox.style.display = "none";
  });

 // Navigation suivant
  lightbox.querySelector(".lightbox__next").addEventListener("click", () => {
    if (!currentGallery.length) return;
    currentIndex = (currentIndex + 1) % currentGallery.length;
    showByIndex(currentIndex);
  });

  //  Navigation précédent
  lightbox.querySelector(".lightbox__prev").addEventListener("click", () => {
    if (!currentGallery.length) return;
    currentIndex = (currentIndex - 1 + currentGallery.length) % currentGallery.length;
    showByIndex(currentIndex);
  });

 
});
