<section class="steps-section">
    <div class="container">
        <h2 class="section-title"><? get_page_template_slug() == 'page-pasport.php'?the_field( 'шаги-заголовок-паспорт', 'option' ):the_field( 'шаги-заголовок', 'option' ) ?></h2>
        <p class="section-subtitle"><? the_field( 'шаги-подзаголовок', 'option' ) ?></p>
        <div class="airplane">
        </div>
        <div class="d-flex justify-content-center flex-column flex-sm-row flex-wrap flex-md-nowrap">
			<?
			while ( have_rows( 'шаги', 'option' ) ) :
				the_row(); ?>
                <div class="step">
                    <img <? the_repeater_image( 'иконка' ) ?> class="icon">
                    <p><? the_sub_field( 'текст' ) ?></p>
					<? $link = get_sub_field( 'кнопка' ) ?>
                    <a href="<?= $link['url'] ?>" class="button"><?= $link['title'] ?></a>
                </div>
			<? endwhile; ?>
        </div>
    </div>
</section>