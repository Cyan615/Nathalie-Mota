<section class="contact-form" id="contactModal">

    <article class="modal-content">
        <button class="modal-content__closebtn" onclick="closeModal()">close</button>
        <!-- en-tête de la modal -->
        <div class="modal-content__header"></div>
        <!-- corp de la modal -->
        <div class="modal-content__body">
        <?php
		// On insère le formulaire de demandes de renseignements
		echo do_shortcode('[contact-form-7 id="7de56ba" title="modal-contactForm"]');
		?>

        
        </div>
        
    </article>
</section>