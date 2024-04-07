console.log('OK single js');
window.onload = () => {

    let leftArrow = document.getElementsByClassName('arrowLeft');
    let rightArrow = document.getElementsByClassName('arrowRight');
    let prev_picture = document.getElementById('prev-miniature');
    let next_picture = document.getElementById('next-miniature');
    console.log(leftArrow);
    console.log(rightArrow);
    console.log(prev_picture);
    console.log(next_picture);

    function showLeft() {
        prev_picture.classList.remove('hide-miniature');
        alert('c es la fonction');
    }
    
    if( prev_picture != null && leftArrow != null) {
        leftArrow.addEventListener(
          'mouseenter',
          function(event) {
            prev_picture.classList.remove('hide-miniature');
              
            }
          )
    }
    





}