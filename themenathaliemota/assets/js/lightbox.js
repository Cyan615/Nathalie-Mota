


document.addEventListener("DOMContentLoaded", function(){
    console.log("la lightbox est lancée");
    // on récupere les élements->
    const container = document.getElementById('motalightbox');
    const lightboxClose = document.querySelector(".lightbox__close");
    const photo = document.querySelector(".lightbox__image");
    const photoCategorie = document.querySelector(".lightbox__catPhoto");
    // console.log(photoCategorie);
    const photoRef = document.querySelector(".lightbox__refPhoto");
    // console.log(photoRef);
    const photoPrev = document.querySelector(".lightbox__prev");
    // console.log(photoPrev);
    const photoNext = document.querySelector(".lightbox__next");
    // console.log(photoNext);
    const photoGallery = document.querySelector(".column-gallery");
    // console.log(photoGallery);
    const fullscreen = document.querySelector(".lightboxIcon");
    
    if (container &&  lightboxClose && photo && photoCategorie && photoRef && photoPrev && photoNext && photoGallery){

// on récupère les photos de la galerie->
        const photoCards = Array.from(photoGallery.querySelectorAll(".photoCard"));
        
        let indexCurrentPost;
    // fonction pour ouvrir et charger la lightbox
        function showLightbox(e) {
            const photoAffiche = e.querySelector(".lightboxIcon").getAttribute("data-photoUrl");
            // charger les élement dans la lightbox via data attribu
            photo.src = photoAffiche;
            // photo.src = e.querySelector(".lightboxIcon").getAttribute("data-photoUrl");
            
            photoRef.textContent = e.querySelector(".lightboxIcon").getAttribute("data-lightboxRef");

            photoCategorie.textContent = e.querySelector(".lightboxIcon").getAttribute("data-lightboxCat");

            // enregistré l'index de la photo en cours
            indexCurrentPost = photoCards.indexOf(e);
        };

        function photoPrecedente(){
            console.log('index de la photo: '+indexCurrentPost);
            //on décrément pour avoir l'index du post précédent
            indexCurrentPost--;
            console.log('index de la photo précedente: '+indexCurrentPost);
            // si l'index est inferieure à 0 on masque le 'précédente' 
            if (indexCurrentPost < 0) {
                photoPrev.style.display="none";
            }
            // on remplace la photo actuelle par le post précédent qu'on aura récupéré->
            let prevPostRecup = photoCards[indexCurrentPost];
            
            showLightbox(prevPostRecup);
        }
// on duplique la fonction pour l'image suivante
        function photoSuivante(){
            //on incrémente pour avoir l'index du post suivant
            indexCurrentPost++;
            // à la dernière photo on masque le "suivante" 
            if (indexCurrentPost > photoCards.length) {
                photoNext.style.display="none";
            }
            // on remplace la photo actuelle par le post suivant qu'on aura récupéré->
            let nextPostRecup = photoCards[indexCurrentPost];
            showLightbox(nextPostRecup);
            
        }
// ouverture de la lightbox
        photoGallery.addEventListener("click", function(event) {

            // rend visible la lightbox
            container.style.display = 'block';
            if (event.target.closest(".lightboxIcon")) {
                event.preventDefault();

                const selectPhoto = event.target.closest(".frame-Overlay");

                showLightbox(selectPhoto); 
            } 
            
        });

    
// fermeture au clique sur la croix 
        lightboxClose.addEventListener("click", function() {
        container.style.display = 'none';
        });

    // gestion des flèches 
        photoPrev.addEventListener("click", function () {
            alert("bouton photo précédente")
            photoPrecedente();
        });

        photoNext.addEventListener("click", function () {
            // alert("bouton photo suivante")
            photoSuivante();
        });
        
    };

 



    // function () {
    //     console.log("photo suivente");
    } );
 
    
    
