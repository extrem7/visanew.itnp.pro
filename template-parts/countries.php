<section class="visa-countries">
    <div class="container">
        <h2 class="section-title"><? the_field( 'визы-заголовок', 'option' ) ?></h2>
        <div class="d-flex flex-wrap justify-content-around">
			<?
			while ( have_rows( 'визы-страны', 'option' ) ) :
				the_row(); ?>
                <div class="item">
                    <p class="title">Гражданам<b><? the_sub_field('название') ?></b></p>
                    <div class="circle"><img <? the_repeater_image('флаг') ?>></div>
                    <p class="price">от <? the_sub_field('цена') ?> <i class="fa fa-eur"></i></p>
                </div>
			<? endwhile; ?>
        </div>
        <p class="additional"><? the_field( 'визы-текст', 'option' ) ?></p>
    </div>
</section>