console.log('OK modal js');
window.onload = () => {
    const modalBtnOpen = document.getElementById('menu-item-20');
    const modal = document.getElementById('contactModal');
     
// fonction d'ouverture de la modale
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



    // console.log(closeModal);
    // Ouverture de la modale au clique sur le bouton Contact du menu 
    modalBtnOpen.addEventListener("click", openModal);
    // Fermeture de la modale au clique sur le bouton fermeture
    document.querySelector('.modal-content__closebtn').addEventListener("click", closeModal);
    
    // Ouverture de la modale avec la référence photo pré-remplie
    const btnOpen = document.querySelector('.open-popup');
    

    btnOpen.addEventListener("click", openModal);
    
    if(btnOpen){
       let refPhoto = btnOpen.dataset.reference;
       let refInput = document.getElementById('refFormId');

       if(refPhoto){
        refInput.value = refPhoto;
       }
    }
     
}




  

