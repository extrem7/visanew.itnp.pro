<? /* Template Name: Главная */
get_header(); ?>
<main class="main">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center justify-content-sm-start info-item align-items-center">
            <div class="circle">
                <img src="<?= path() ?>img/icons/home-main-1.png" alt="icon">
            </div>
            <p class="text"><? the_field( 'блок-1-текст' ) ?></p>
            <p class="time"><? the_field( 'блок-1-время' ) ?></p>
        </div>
        <div class="d-flex flex-wrap justify-content-center justify-content-sm-start info-item align-items-center">
            <div class="circle">
                <img src="<?= path() ?>img/icons/home-main-2.png" alt="icon">
            </div>
            <p class="text"><? the_field( 'блок-2-текст' ) ?></p>
            <p class="time"><? the_field( 'блок-2-время' ) ?></p>
        </div>
		<?= do_shortcode( '[contact-form-7 id="37" title="Главная" html_class="form-white"]' ) ?>
    </div>
</main>
<? getSteps() ?>
<section class="countries-section">
    <div class="container">
        <h2 class="section-title"><? the_field( 'направления-заголовок' ) ?></h2>
        <p class="section-subtitle"><? the_field( 'направления-подзаголовок' ) ?></p>
        <div class="row justify-content-lg-between justify-content-around">
			<?
			global $country;
			foreach ( get_field( 'страны' ) as $country )
				getCountyCard()
			?>
        </div>
    </div>
</section>
<? getServices() ?>
<? getCountries() ?>
<? getContacts() ?>
<? get_footer() ?>
