console.log('OK modal js');
window.onload = () => {
    const modalBtnOpen = document.getElementById('menu-item-20');
    const modal = document.getElementById('contactModal');
    const modalContent = document.querySelector('.modal-content');
    // const modalBtnClose = document.getElementsByClassName('modal-content__closebtn');
    console.log(modalBtnOpen);
    console.log(modal);
    console.log(modalContent);
    

    function openModal(e) {
        e.preventDefault();
        modal.style.display = null ;
        
        setTimeout(() => {
            modal.classList.add('show');
        }, 200);
        
        console.log(modal);
    }

    function closeModal() {
        modal.style.display = "none";
        modal.classList.remove('show');
        
    }
    console.log(closeModal);
    
    modalBtnOpen.addEventListener("click", openModal);
    document.querySelector('.modal-content__closebtn').onclick = closeModal();

}




  

