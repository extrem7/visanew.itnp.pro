<?
global $post;
$documentsFrom = 'option';
if ( get_page_template_slug() == 'page-country.php' ) {
	$documentsFrom = $post;
}
?>
<section class="documents-section">
    <div class="container">
        <h2 class="section-title title-black"><? the_field( 'документы-заголовок', $documentsFrom ) ?></h2>
        <p class="section-subtitle"><? the_field( 'документы-подзаголовок', $documentsFrom ) ?></p>
        <div class="row justify-content-around">
			<?
			while ( have_rows( 'документы', $documentsFrom ) ) :
				the_row(); ?>
                <div class="document-item">
                    <img <? the_repeater_image( 'иконка' ) ?>>
                    <p><? the_sub_field( 'текст' ) ?></p>
                </div>
			<? endwhile; ?>
        </div>
    </div>
</section>