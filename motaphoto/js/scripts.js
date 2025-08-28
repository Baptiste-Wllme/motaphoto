document.addEventListener("DOMContentLoaded", function() {
  const openBtn = document.querySelector('btn-contact');
  const modal   = document.getElementById('modal-contact');
  const closeEls = document.querySelectorAll('[data-close-modal], .modal__overlay');

  if (openBtn && modal) {
    openBtn.addEventListener('click', () => {
      modal.style.display = 'flex';
    });
  }
});
