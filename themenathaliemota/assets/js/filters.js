'use strict';

// ** Bouton 'Charger plus' **
// (function ($) {
//     $(document).ready(function () {
  
//         $('.loadMorePhoto').click(function(e) {
//             e.preventDefault();

//             const ajaxurl = $(this).data('ajaxurl');

//             const data = {
//                 action: $(this).data('action'), 
//                 nonce:  $(this).data('nonce'),
//                 postid: $(this).data('postid'),
//         }
        
//         fetch(ajaxurl, {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/x-www-form-urlencoded',
//                 'Cache-Control': 'no-cache',
//             },
//             body: new URLSearchParams(data),
//         })
//         .then(response => response.json())
//         .then(body => {
//             console.log(body);
//             if (!body.success) {
//                 alert(response.data);
//                 return;
//             }
            
//         });
//     });
    
   
//     });
//   })(jQuery);





// ** Filtres de la page accueil **











