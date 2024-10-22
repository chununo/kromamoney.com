<?php
/*
Plugin Name: Creador de tarjeta pdf
Description: Formulario que hace una tarjeta en pdf
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

if ( ! defined( 'PDF_CARD_FILE' ) ) {
	define( 'PDF_CARD_FILE', __FILE__ );
}

if ( ! defined( 'PDF_CARD_PATH' ) ) {
	define( 'PDF_CARD_PATH', plugin_dir_path( __FILE__ ) );
}

// if (file_exists(__DIR__ . 'vendor/autoload.php')) {
//     require_once __DIR__ . 'vendor/autoload.php';
// }


// Crear
function crear_pagina(){
	$title = "Tarjetas PDF";
	$args = array(
		'post_type' => 'page',
		'posts_per_page' => 1,
		'title' => $title
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		
		error_log('si hay');
		
	}else{
		$post_id = wp_insert_post(array(
			'post_title' => $title,
			'post_content' => 'Contenido de mi página',
			'post_status' => 'publish', // publicado o draft (pendiente)
			'post_type' => 'page', // tipo de post
		));
		
		
		if (is_wp_error($post_id)) {
			// Error occurred while inserting the post
			error_log($post_id->get_error_message());
		}

	}
}
register_activation_hook(__FILE__, 'crear_pagina');

function eliminar_pagina(){
	$title = "Tarjetas PDF";
	$args = array(
		'post_type' => 'page',
		'posts_per_page' => 1,
		'title' => $title
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		error_log('si hay para eliminar');
		wp_delete_post($query->posts[0]->ID);
	}else{

	}
}
register_deactivation_hook(__FILE__, 'eliminar_pagina');

function carga_pagina() {
	// Verificar si se está cargando la página "Mi Página"
	add_filter( 'template_include', 'render_pagina' );
}
add_action( 'init', 'carga_pagina' );

if (file_exists(plugin_dir_path(__FILE__) . '/vendor/autoload.php')) {
	require_once plugin_dir_path(__FILE__) . '/vendor/autoload.php';
}

function render_pagina( $template ) {

	// Verificar si se está cargando la página "Mi Página"
	if ( strpos($_SERVER['REQUEST_URI'], 'tarjetas-pdf') !== false || (isset($_GET['page_id']) && $_GET['page_id'] == 2695 )) {
		// Cargar la página creada en PHP
		if (!isset($_POST['submit'])) {
			include_once plugin_dir_path( __FILE__ ) . 'form_template.php';
			return;
			
		}else{
			return plugin_dir_path( __FILE__ ) . 'pdf_creator.php';			
		}
	}
	return $template;
}

// function cargar_scripts() {
//     // Registra tu script JavaScript
//     wp_enqueue_script('jspdf', "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js", array('jquery'), null, true);
    
//     // Incluye la fuente
//     wp_enqueue_script('FiraSans-Light-normal', plugins_url('FiraSans-Light-normal.js', __FILE__), array(), null, true);
// }
// add_action('wp_enqueue_scripts', 'cargar_scripts');


add_action('init', 'registrar_pdf_endpoint');

function registrar_pdf_endpoint() {
    add_rewrite_rule('^tarjetas-pdf/?$', 'index.php?generar_pdf=1', 'top');
}

add_filter('query_vars', 'agregar_query_vars');
function agregar_query_vars($vars) {
    $vars[] = 'generar_pdf';
    return $vars;
}

add_action('template_redirect', 'generar_pdf_si_se_requiere');
function generar_pdf_si_se_requiere($template) {
    if (get_query_var('generar_pdf')) {
		return plugin_dir_path( __FILE__ ) . 'pdf_creator.php';
    }
	return $template;
}
