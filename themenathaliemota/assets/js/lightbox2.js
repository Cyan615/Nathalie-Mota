document.addEventListener("DOMContentLoaded", function() {
    console.log("la lightbox est lancée");

    // **** on récupèpe les éléments d'affichage de la lightbox et de l'image ****
// la lightbox overlay
    const lightbox = document.getElementById('motalightbox');
// l'emplacement de l'imge
    const box_photo = lightbox.querySelector(".lightbox__img");
    console.log(box_photo);
// l'icone fullscreen
    var open_icone = document.querySelector(".lightboxIcon");
// l'icone de fermeture 
    const close_icone = lightbox.querySelector(".lightboxContainer__close");
// Le bouton image suivante
    const next_img = lightbox.querySelector(".lightboxContainer__next");
// le bouton image précédente
    const prev_img = lightbox.querySelector(".lightboxContainer__prev");

// la référence et la cathégorie de l'image affiché
    const box_ref = document.querySelector(".lightboxContainer____refPhoto");
    const box_cat = document.querySelector(".lightboxContainer____catPhoto");


    function get_select_photo() {
        var ref_select_photo = this.getAttribute('data-boxref');
        var cat_select_photo = this.getAttribute('data-boxCat');
        //var url_select_photo = selectPhoto.getAttribute('data-boxPhotoUrl');
        // afficher les infos de la photo
        box_ref.textContent = ref_select_photo;
        box_cat.textContent = cat_select_photo;
    }


    // ouverture de la lightbox au clique sur l'icone fullscreen
    const photoGallery = document.querySelector(".column-gallery");
    photoGallery.addEventListener("click", function(event){
        lightbox.style.display = 'block';
        if (event.target.closest(".lightboxIcon")){
            event.preventDefault();
            
            box_photo.src= event.target.getAttribute('data-boxPhotoUrl');
            
            get_select_photo();
        }
    });






})