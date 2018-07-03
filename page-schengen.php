<? /* Template Name: Шенген */
get_header(); ?>
<main class="main main-with-text">
    <div class="container">
        <h1 class="main-title"><? the_title() ?></h1>
        <div class="row flex-wrap-reverse flex-row-reverse flex-md-row">
            <div class="col-lg-7 col-md-6">
				<?= do_shortcode( '[contact-form-7 id="37" title="Главная" html_class="form-white"]' ) ?>
            </div>
            <div class="col-lg-5 col-md-6">
                <p class="text"><?=  get_post_field( 'post_content', $id ) ?></p>
				<? the_link( 'ссылка-на-визу', null, 'get-visa button button-dark' ) ?>
            </div>
        </div>
    </div>
</main>
<section class="countries-section">
    <div class="container">
        <h2 class="section-title"><? the_field('страны-заголовок') ?></h2>
        <p class="section-subtitle"><? the_field('страны-подзаголовок') ?></p>
        <div class="row justify-content-around">
		    <?
		    global $country;
		    foreach ( get_field( 'страны' ) as $country )
			    getCountyCard()
		    ?>
        </div>
    </div>
</section>
<? getSteps() ?>
<? getServices() ?>
<? getCountries() ?>
<? getContacts() ?>
<? get_footer() ?>