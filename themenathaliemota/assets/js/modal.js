console.log('OK modal js');

let popup = document.getElementById('contactModal');

let open = document.getElementById('menu-item-20');

let close = document.getElementsByClassName('closebtn');

open.onclick = function(){
    popup.style.display = "flex";
    document.querySelector('.modal-content').classList.add('modal-content--open');
}

function closeModal() {
    popup.style.display = "none";
    document.querySelector('.modal-content').classList.remove('modal-content--open');
}
  

console.log(closeModal());