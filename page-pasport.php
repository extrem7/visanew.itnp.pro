<? /* Template Name: Загранпаспорт */
get_header(); ?>
    <main class="main">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center justify-content-sm-start info-item align-items-center">
                <div class="circle">
                    <img src="<?= path() ?>img/visa/main-icon.png" alt="icon">
                </div>
                <p class="text"><? the_field( 'загранпаспорт-текст' ) ?></p>
                <p class="time"><? the_field( 'загранпаспорт-время' ) ?></p>
            </div>
			<?= do_shortcode( '[contact-form-7 id="37" title="Главная" html_class="form-white"]' ) ?>
        </div>
    </main>
<? getSteps() ?>
    <section class="countries-section">
        <div class="container">
            <h2 class="section-title title-black"><? the_field( 'документы-заголовок' ) ?></h2>
            <p class="section-subtitle"><? the_field( 'документы-подзаголовок' ) ?></p>
            <div class="row justify-content-around">
				<?
				while ( have_rows( 'документы' ) ) :
					the_row(); ?>
                    <div class="document-item col-lg-4 col-md-6 col-sm-7">
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                            <div class="circle"><img <? the_repeater_image( 'иконка' ) ?>></div>
                            <p class="title"><? the_sub_field( 'заголовок' ) ?></p>
                        </div>
                        <p class="list">
							<?
							while ( have_rows( 'список' ) ) :
								the_row(); ?>
                                > <? the_sub_field( 'документ' ) ?><br>
							<? endwhile; ?>
                        </p>
                    </div>
				<? endwhile; ?>
            </div>
            <div class="visa-application">
                <div class="container">
                    <? get_template_part('template-parts/prices-form') ?>
                </div>
            </div>
            <h2 class="section-title title-black"><? the_field( 'предложения-заголовок' ) ?></h2>
            <p class="section-subtitle"><? the_field( 'предложения-подзаголовок' ) ?></p>
            <div class="special row">
                <div class="col-md-6">
                    <ul>
						<?
						while ( have_rows( 'предложения-список' ) ) :
							the_row(); ?>
                            <li><? the_sub_field( 'предложение' ) ?></li>
						<? endwhile; ?>
                    </ul>
                </div>
                <div class="col-md-6">
					<?= do_shortcode( '[contact-form-7 id="176" title="Загранпаспорт" html_class="form-white"]' ) ?>
                </div>
            </div>
        </div>
    </section>
<? getContacts( true ) ?>
<? get_footer() ?>