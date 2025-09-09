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


jQuery(document).ready(function ($) {
  const $container = $('.container-photos');
  const $button = $('#load-more');

  function loadPhotos(page = 1, append = false) {

    if (typeof nm_ajax === 'undefined') {
      console.error('nm_ajax non défini — vérifie wp_localize_script.');
      return;
    }

    const data = {
      action: 'filter_photos',
      categorie: $('#photo-filters select[name="categorie"]').val() || '',
      format: $('#photo-filters select[name="format"]').val() || '',
      order: $('#filter-date').val() || '',
      page: page,
    };

    console.log('Ajax request data:', data);  // j'ai vérifier dans la consol si les données étaient présente

    $.post(nm_ajax.ajax_url, data)
      .done(function (response) {
        console.log('Ajax response:', response);
        if (append) {
          $container.append(response);
        } else {
          $container.html(response);
          
          $button.data('page', 1);
        }
      })
      .fail(function (xhr, status, error) {
        console.error('Ajax error:', status, error, xhr.responseText);
      })
      .always(function () {
        $button.prop('disabled', false).text('Charger plus');
      })
      ;
  }

  $(document).on('change', '#photo-filters select, #filter-date', function () {
    $button.prop('disabled', false).text('Charger plus').data('page', 1);
    loadPhotos(1, false);
  });

 
  $button.on('click', function () {
    const page = parseInt($button.data('page')) || 1;
    $button.prop('disabled', true).text('Chargement ...');
    loadPhotos(page + 1, true);
    $button.data('page', page + 1);
  });
});




