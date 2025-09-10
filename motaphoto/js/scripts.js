jQuery(document).ready(function ($) {
  const $container = $('.container-photos');
  const $button    = $('#load-more');

  let activeFilters = {
    categorie: "",
    format: "",
    order: ""
  };


  function loadPhotos(page = 1, append = false) {
    if (typeof nm_ajax === 'undefined') {
      console.error('nm_ajax non défini');
      return;
    }

    const data = {
      action: 'filter_photos',
      categorie: activeFilters.categorie,
      format: activeFilters.format,
      order: activeFilters.order,
      page: page,
    };

    console.log(' Données envoyées :', data);

    $.post(nm_ajax.ajax_url, data)
      .done(response => {
        console.log('Réponse AJAX :', response);
        if (append) {
          $container.append(response);
        } else {
          $container.html(response);
          $button.data('page', 1);
        }
      })

      .always(() => {
        $button.prop('disabled', false).text('Charger plus');
      });
  }


  $button.on('click', function () {
    const page = parseInt($button.data('page')) || 1;
    $button.prop('disabled', true).text('Chargement ...');
    loadPhotos(page + 1, true);
    $button.data('page', page + 1);
  });

  document.querySelectorAll(".dropdown").forEach(drop => {
    const toggle = drop.querySelector(".dropdown-toggle");
    const menu   = drop.querySelector(".dropdown-content");

    toggle.addEventListener("click", (e) => {
      e.stopPropagation();
      menu.classList.toggle("show");
    });

    menu.querySelectorAll("li").forEach(item => {
      item.addEventListener("click", () => {
        toggle.textContent = item.textContent;
        menu.classList.remove("show");

        
        activeFilters[drop.dataset.filter] = item.dataset.value;
        loadPhotos(1, false);
      });
    });
  });

  document.addEventListener("click", () => {
    document.querySelectorAll(".dropdown-content").forEach(menu => {
      menu.classList.remove("show");
    });
  });
});
