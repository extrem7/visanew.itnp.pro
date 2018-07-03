<!DOCTYPE html>
<html lang="<? bloginfo( 'language' ) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= wp_get_document_title() ?></title>
	<? wp_head() ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body <? body_class() ?>>
<header class="header">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-sm-around  align-items-center">
            <div class="logo col-xl-2 col-lg-3 col-md-3 col-sm-4">
                <a href="<? bloginfo( 'siteurl' ) ?>"><img <? the_image( 'лого', 'option' ) ?>></a>
            </div>
            <div class="col-xl-5 col-lg-4 col-md-7 col-sm-8 d-flex justify-content-around">
                <div class="d-flex align-items-center">
                    <div class="icon icon-time"></div>
                    <p><? the_field( 'время-работы', 'option' ) ?></p>
                </div>
                <div class="d-flex align-items-center">
                    <div class="icon icon-map"></div>
                    <p><? the_field( 'адрес', 'option' ) ?><br>
                        <span class="icon icon-metro"></span><? the_field( 'метро', 'option' ) ?>
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-7 d-flex align-items-center justify-content-center">
                <div class="icon icon-phone"></div>
				<?
				$phone = get_field( 'телефон', 'option' );
				?>
                <a href="<?= phoneLink( $phone ) ?>" class="phone-link"><?= $phone ?></b></a>
            </div>
            <div class="d-flex justify-content-center col-xl-2 col-lg-3 col-md-3 col-sm-5">
                <a data-target="#callback" data-toggle="modal" class="button">обратный звонок</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="logo logo-bottom col-xl-2 col-lg-3 col-md-3 d-lg-block d-none"><? the_field( 'лого-текст', 'option' ) ?></div>
            <div class="col-xl-10 col-lg-9 border-top d-flex align-items-center">
                <button type="button" class="toggle-btn d-block d-md-none">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="menu align-items-center justify-content-lg-start justify-content-center">
					<? wp_nav_menu( [
						'menu'       => 'Хедер',
						'container'  => null,
						'items_wrap' => '%3$s',
						'walker'     => new Bootstrap_Walker_Nav_Menu()
					] ); ?>
                </ul>
            </div>
        </div>
    </div>
</header>
<?
if ( ! is_front_page() )
	echo print_breadcrumbs()
?>