<?php

require_once 'includes/bootstrap_menu.php';
require_once 'includes/breadcrumbs.php';
require_once 'includes/speed_up.php';
require_once 'includes/prices_setup.php';
//wp setup
remove_action( 'welcome_panel', 'wp_welcome_panel' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
show_admin_bar( false );
//if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php")
//wp_redirect('admin.php?page=theme-general-settings');
//register css|js
function registerThemeStyles() {
	wp_register_style( 'main', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'main' );
}

add_action( 'wp_print_styles', 'registerThemeStyles' );
function registerThemeJs() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js' );
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'jquery-ui', 'http://code.jquery.com/ui/1.12.1/jquery-ui.min.js' );
	wp_enqueue_script( 'jquery-ui' );
	wp_register_script( 'jquery-input', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js' );
	wp_enqueue_script( 'jquery-input' );
	wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' );
	wp_enqueue_script( 'popper' );
	wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' );
	wp_enqueue_script( 'bootstrap' );
	// vue core, stuff and components
	wp_register_script( 'vue', 'https://cdn.jsdelivr.net/npm/vue' );
	wp_enqueue_script( 'vue' );
	wp_register_script( 'vuejs-datepicker', 'https://unpkg.com/vuejs-datepicker' );
	wp_enqueue_script( 'vuejs-datepicker' );
	wp_register_script( 'moment', 'http://momentjs.com/downloads/moment.js' );
	wp_enqueue_script( 'moment' );
	//
	/*wp_register_script( 'fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js' );
	wp_enqueue_script( 'fancybox' );*/
	wp_register_script( 'main', get_template_directory_uri() . '/es6/main.js' );
	wp_enqueue_script( 'main' );
}

add_action( 'wp_enqueue_scripts', 'registerThemeJs' );
// remove admin-menu links
function remove_menus(){
	remove_menu_page( 'edit.php' );
	//remove_menu_page( 'users.php' );
	remove_menu_page( 'tools.php' );
	remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'remove_menus' );


//cool functions for development
function path() {
	return get_template_directory_uri() . '/';
}

function phoneLink( $phone ) {
	return 'tel:' . preg_replace( '/[^0-9]/', '', $phone );
}

function the_image( $name, $id = null ) {
	if ( $id == null ) {
		global $post;
		$id = $post;
	}
	echo 'src="' . get_field( $name, $id )['url'] . '" ';
	echo 'alt="' . get_field( $name, $id )['alt'] . '" ';
}

function the_checkbox( $field, $print, $post = null ) {
	if ( $post == null ) {
		global $post;
	}
	echo get_field( $field, $post ) ? $print : null;
}

function the_table( $field, $post = null ) {
	if ( $post == null ) {
		global $post;
	}
	$table = get_field( $field, $post );
	if ( $table ) {
		echo '<table>';
		if ( $table['header'] ) {
			echo '<thead>';
			echo '<tr>';
			foreach ( $table['header'] as $th ) {
				echo '<th>';
				echo $th['c'];
				echo '</th>';
			}
			echo '</tr>';
			echo '</thead>';
		}
		echo '<tbody>';
		foreach ( $table['body'] as $tr ) {
			echo '<tr>';
			foreach ( $tr as $td ) {
				echo '<td>';
				echo $td['c'];
				echo '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
}

function the_link( $field, $post = null, $classes = "" ) {
	if ( $post == null ) {
		global $post;
	}
	$link = get_field( $field, $post );
	if ( $link ) {
		echo "<a ";
		echo "href='{$link['url']}'";
		echo "class='$classes'";
		echo "target='{$link['target']}'>";
		echo $link['title'];
		echo "</a>";
	}
}

function the_repeater_image( $name ) {
	echo 'src="' . get_sub_field( $name )['url'] . '" ';
	echo 'alt="' . get_sub_field( $name )['alt'] . '" ';
}

function pre( $array ) {
	echo "<pre>";
	print_r( $array );
	echo "</pre>";
}

//options page
if ( function_exists( 'acf_add_options_page' ) ) {
	$main = acf_add_options_page( [
		'page_title' => 'Настройки темы',
		'menu_title' => 'Настройки темы',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
		'position'   => 2,
		'icon_url'   => 'dashicons-admin-customizer',
	] );
	$visa = acf_add_options_page( [
		'page_title' => 'Форма визы',
		'menu_title' => 'Форма визы',
		'menu_slug'  => 'theme-visa-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
		'position'   => 3,
		'icon_url'   => 'dashicons-id-alt',
		'post_id'    => 'visa',
	] );
}
// template functions
function getSteps() {
	get_template_part( 'template-parts/steps' );
}

function getServices() {
	get_template_part( 'template-parts/services' );
}

function getCountries() {
	get_template_part( 'template-parts/countries' );
}

function getVisApplication() {
	get_template_part( 'template-parts/visa-application' );
}

function getDocuments() {
	get_template_part( 'template-parts/documents' );
}

function getContacts( $white = false ) {
	global $contactsWhite;
	$contactsWhite = $white;
	get_template_part( 'template-parts/contacts' );
}

function getCountyCard() {
	get_template_part( 'template-parts/countyCard' );
}