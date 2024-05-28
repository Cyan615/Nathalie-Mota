'use strict';
console.log("OK charger plus");
let morepage = 1;
jQuery(document).ready(function ($){
    
    let categorie = "";
    let format = "";
    let order = "";
    $("#loadMore").on("click", function () {

        
    morepage++;

    // requète Ajax
    $.ajax({
        url: load_params.ajaxurl,
        type: "POST",
        dataType: 'html',
        data: {
            action: "mota_load_more",
            categorie: categorie,
            format: format,
            order: order,
            paged: morepage,
            
        },
    
        success: function (response) {
            if (response) {
                console.log(response); 
                $(".collumn-gallery").append(response);

            }
        },
    });console.log($.ajax());

    })
})



// ** Filtres de la page accueil **











