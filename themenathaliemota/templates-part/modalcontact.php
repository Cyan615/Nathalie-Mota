<section id="contactModal" role="dialog" style="display: none;">

    <article class="modal-content show">
        <button class="modal-content__closebtn" onclick="closeModal()" data-dismiss="dialog">close</button>
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