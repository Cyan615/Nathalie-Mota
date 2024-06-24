'use strict';
console.log('OK modal js');

    const modalBtnOpen = document.getElementById('menu-item-20');
    const modal = document.getElementById('contactModal');
    const btnOpen = document.querySelector('.open-popup');

// fonction d'ouverture de la modale contacte
    function openModal(e) {
        e.preventDefault();
        modal.style.display = null ;
        //décalage pour l'éffet d'ouverture 
        setTimeout(() => {
            modal.classList.add('show');
        }, 200);
        // console.log(modal);
    }
// Fonction de fermeture de la modale
    function closeModal() {
        modal.style.display = "none";
        modal.classList.remove('show');
    }
  
    // Ouverture de la modale au clique sur le bouton Contact du menu 
    modalBtnOpen.addEventListener("click", openModal);
    // Fermeture de la modale au clique sur le bouton fermeture
    document.querySelector('.modal-content__closebtn').addEventListener("click", closeModal);
    
    
    if(btnOpen){
       let refPhoto = btnOpen.dataset.reference;
       let refInput = document.getElementById('refFormId');

       if(refPhoto){
        refInput.value = refPhoto;
       }
    }
    if(btnOpen) {
    // Ouverture de la modale avec la référence photo pré-remplie
        btnOpen.addEventListener("click", openModal);
    }else{
        console.log("le bouton  .open-popup n'est pas présent");
    };

    
    



// *** Ouverture du menu burger

    const links = document.querySelectorAll("#nav li");
    // console.log(links);
    icones.addEventListener("click", () => {
        nav.classList.toggle("active");
        console.log('icons listener');
    });
//   console.log(icones);
    // fermeture au clique sur item
    links.forEach((link) => {
        link.addEventListener("click", () => {
            nav.classList.remove("active");
        })
    })

  

