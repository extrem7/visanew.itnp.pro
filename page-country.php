<? /* Template Name: Страна */
get_header(); ?>
<main class="main main-with-text" style="background-image: url('<? the_field('фон') ?>')">
    <div class="container">
        <h1 class="main-title"><? the_title() ?></h1>
        <div class="row flex-wrap-reverse flex-row-reverse flex-md-row">
            <div class="col-lg-7 col-md-6">
				<?= do_shortcode( '[contact-form-7 id="37" title="Главная" html_class="form-white"]' ) ?>
            </div>
            <div class="col-lg-5 col-md-6">
                <p class="text"><?= get_post_field( 'post_content', $id ) ?></p>
            </div>
        </div>
    </div>
</main>
<section class="countries-section">
    <div class="container">
        <? getVisApplication() ?>
        <? getDocuments() ?>
    </div>
</section>
<? getServices() ?>
<? getContacts(true) ?>
<? get_footer() ?>