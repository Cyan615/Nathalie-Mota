console.log("fichier filtres photo");



        
jQuery(document).ready(function ($) {

    $('#filterCategorie, #filterFormat, #filterDate').change(function () {
      let categorie = $('#filterCategorie').val();
      let formats = $('#filterFormat').val();
      let order = $('#filterDate').val(); // Récupérer la valeur de tri 
      $.ajax({
        url: ajax_url,
        type: 'POST',
        data: {
          action: 'mota_load_photo',
          categorie: categorie,
          formats: formats,
          order: order, // Envoyer la valeur de tri
        },
        success: function (response) {
          $('#galleryPhoto').html(response);
        },
      });
    });
  });  
  
  jQuery(document).ready(function ($) {
    let currentCategorie = $('#filterCategorie').val();
    let currentFormats = $('#filterFormat').val();
    let currentOrder = $('#filterDate').val();    

    function loadMorePhotos(page) {
      $.ajax({
        url: ajaxurl,
        type: 'POST',
        data: {
          action: 'mota_load_photo',
          categorie: currentCategorie,
          formats: currentFormats,
          order: currentOrder,
          page: page,
        },
        success: function (response) {
          console.log('page', page);
          console.log('response', response);
          if (page === 1) {
            $('#galleryPhoto').html(response);
          } else {
            $('#galleryPhoto').append(response);
          } if (
            $('#no-more-posts').length > 0 ||
            $(response).filter('.photo-item').length < 8
          ) {
            $('#loadMore').hide();
          } else {
            $('#loadMore').show().data('page', page);
          }
        },
      });
    }    
    $('#filterCategorie, #filterFormat, #filterDate').change(function () {
      currentCategorie = $('#filterCategorie').val();
      currentFormats = $('#filterFormat').val();
      currentOrder = $('#filterDate').val();     
      loadMorePhotos(1); // Réinitialiser et charger la première page
    });    
    
    $('#loadMore').click(function () {
      let page = $(this).data('page') + 1;
      loadMorePhotos(page);
    });
  });












