document.addEventListener("DOMContentLoaded", function() {
  const btnsContact = document.querySelectorAll('.btn__contact'); 
  const modal       = document.querySelector('.modal');
  const overlay     = document.querySelector('.modal__overlay');

  if (btnsContact.length && modal) {
    btnsContact.forEach(btn => {
      btn.addEventListener('click', () => {
        
        const ref = btn.dataset.ref;
        const refField = modal.querySelector('input[name="your-subject"]');
        if(refField) {
          if (ref) {
            refField.value = ref; 
          } else {
            refField.value = "";  
          }
        }

        modal.style.display = 'flex';
        console.log('Modal ouverte pour la photo :', ref);
      });
    });

    overlay.addEventListener('click', () => {
      modal.style.display = 'none';
    });
  }
});


