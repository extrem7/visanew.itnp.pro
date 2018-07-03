<? /* Template Name: Виза */
get_header(); ?>
    <main class="main">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center justify-content-sm-start info-item align-items-center">
                <div class="circle">
                    <img src="<?= path() ?>img/visa/main-icon.png" alt="icon">
                </div>
                <p class="text"><? the_field( 'виза-текст' ) ?></p>
                <p class="time"><? the_field( 'виза-время' ) ?></p>
            </div>
			<?= do_shortcode( '[contact-form-7 id="37" title="Главная" html_class="form-white"]' ) ?>
        </div>
    </main>
<? getVisApplication() ?>
    <section class="countries-section">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-around">
	            <?
	            global $country;
	            foreach ( get_field( 'страны' ) as $country )
		            getCountyCard()
	            ?>
            </div>
        </div>
    </section>
<? getSteps() ?>
<? getDocuments() ?>
<? getServices() ?>
<? getContacts( true ) ?>
<? get_footer() ?>