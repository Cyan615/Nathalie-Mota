(function ($){
    $(document).ready(function () {
    
        $('#loadMore').click(function(){
            data = {
             'action': 'loadmorephotobutton', // le nom de mon action ajax
             'query': photo_myajax, // ma variable attribuée dans le fichier page-formation.php
             'page' : current_page_myajax // ma variable attribuée dans le fichier page-formation.php
           };
           $.ajax({
             url : ajaxurl, // AJAX handler
             data : data,
             type : 'POST',
             beforeSend : function ( xhr ) {
               $('#loadMore').text('Recherche...'); // ici l'ID de mon bouton load more
             },
             success : function( posts ){
                console.log('reponse' . posts);
               if( posts ) {
         
                 $('#loadMore').text( 'Charger plus' );
                 $('#galleryPhoto').append( posts ); 
                current_page_myajax++;
         
                 if ( current_page_myajax == max_page_myajax )
                   $('#loadMore').hide(); 
         
               } else {
                 $('#loadMore').hide(); 
               }
             }
           });
           return false;
         });
         
         /* FILTERING FUNCTION ON FORMATION ARCHIVE PAGE */
         $('#filterCategorie','#filterFormat').change(function(){
           $.ajax({
             url : ajaxurl,
             data : $('#filterCategorie','#filterFormat').serialize(), // form data
             dataType : 'json', 
             type : 'POST',
         
             success : function( data ){
         
               current_page_myajax = 1; 
         
               photo_myajax = data.posts;
              
               max_page_myajax = data.max_page; 
               
               $('#galleryPhoto').html(data.content); 
              
               if ( data.max_page < 2 ) {
                 $('#loadMore').hide();
               } else {
                 $('#loadMore').show();
               }
             }
           });
          
           return false;
         
         });
            




});


})(jQuery);


