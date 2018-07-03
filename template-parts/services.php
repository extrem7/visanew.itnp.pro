<section class="prices-section">
    <div class="container">
        <h2 class="section-title title-white"><? the_field( 'услуги-заголовок', 'option' ) ?></h2>
        <p class="section-subtitle"><? the_field( 'услуги-подзаголовок', 'option' ) ?></p>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
				<?
				while ( have_rows( 'услуги', 'option' ) ) :
					the_row(); ?>
                    <div class="item">
                        <div class="circle"><img <? the_repeater_image('иконка') ?>></div>
                        <p><? the_sub_field('текст') ?></p>
                    </div>
				<? endwhile; ?>
            </div>
            <div class="col-lg-5 col-md-8">
                <div class="block">
                    <p class="title"><? the_field( 'услуги-форма-заголовок', 'option' ) ?></p>
                    <p class="text"><? the_field( 'услуги-форма-текст', 'option' ) ?></p>
	                <?= do_shortcode('[contact-form-7 id="57" title="Срочная виза" html_class="form-white"]')?>
                </div>
            </div>
        </div>
    </div>
</section>