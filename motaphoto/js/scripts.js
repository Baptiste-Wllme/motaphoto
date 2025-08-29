document.addEventListener("DOMContentLoaded", function() {
  const openBtn = document.querySelector('.btn__contact');
  const modal   = document.querySelector('.modal');
  const overlay = document.querySelector('.modal__overlay');

  if (openBtn && modal) {
    openBtn.addEventListener('click', () => {
      modal.style.display = 'flex';
      console.log('ça marche');
    });

    overlay.addEventListener('click', () => {
      modal.style.display = 'none';
    });
  }
});
