<?php
/*
Plugin Name: Cheque Creador
Description: Un plugin para crear y gestionar cheques y aportes.
Version: 1.0
Author: Tu Nombre
*/

// Evita el acceso directo al archivo
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

// Categorias
include_once(plugin_dir_path(__FILE__) . 'cheques.php');
include_once(plugin_dir_path(__FILE__) . 'categorias.php');
include_once(plugin_dir_path(__FILE__) . 'aporte.php');
include_once(plugin_dir_path(__FILE__) . 'shortcode.php');

// Código para crear las tablas en la base de datos
function cc_crear_tablas() {
	global $wpdb;

	$charset_collate = $wpdb->get_charset_collate();

	// Tabla para cheques
	$sql_cheques = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}cheques (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		nombre varchar(255) NOT NULL,
		descripcion text NOT NULL,
		imagen varchar(255) NOT NULL,
		categoria_id mediumint(9),
		PRIMARY KEY (id)
	) $charset_collate;";

	// Tabla para aportes
	$sql_aportes = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}cheque_inputs (
		id_input mediumint(9) NOT NULL AUTO_INCREMENT,
		cheque_id mediumint(9) NOT NULL,
		nombre varchar(255) NOT NULL,
		tipo varchar(255) NOT NULL DEFAULT 'text',
		font varchar(255) NOT NULL DEFAULT 'futura',
		textAlign varchar(255) NOT NULL DEFAULT 'left',
		textBaseline varchar(255) NOT NULL DEFAULT 'middle',
		fillStyle varchar(255) NOT NULL DEFAULT 'white',
		toText varchar(255) DEFAULT NULL,
		x int NOT NULL,
		y int NOT NULL,
		PRIMARY KEY (id_input),
		FOREIGN KEY (cheque_id) REFERENCES {$wpdb->prefix}cheques(id) ON DELETE CASCADE
	) $charset_collate;";

	// Tabla para categorías
	$sql_categorias = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}cheque_categorias (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		nombre varchar(255) NOT NULL,
		PRIMARY KEY (id)
	) $charset_collate;";

	// Ejecutar las consultas
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql_cheques );
	dbDelta( $sql_aportes );
	dbDelta( $sql_categorias );
}

register_activation_hook( __FILE__, 'cc_crear_tablas' );

// Crear la categoría "indefinida" si no existe
function cc_crear_categoria_default() {
	global $wpdb;

	// Verifica si la categoría ya existe
	$categoria_default = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}cheque_categorias WHERE nombre = 'indefinida'");

	if (!$categoria_default) {
		// Inserta la categoría "indefinida"
		$wpdb->insert(
			"{$wpdb->prefix}cheque_categorias",
			['nombre' => 'indefinida']
		);
	}
}

register_activation_hook( __FILE__, 'cc_crear_categoria_default' );

function cc_menu() {
	add_menu_page( 'Cheque Creador', 'Cheque Creador', 'manage_options', 'cheques', 'cc_gestionar_cheques' );
	// add_submenu_page( 'cheque-creador', 'Cheques', 'Cheques', 'manage_options', 'cheques', 'cc_gestionar_cheques' );
	// add_submenu_page( 'cheque-creador', 'Aportes', 'Aportes', 'manage_options', 'aportes', 'cc_gestionar_aportes' );
	add_submenu_page( 'cheques', 'Categorías', 'Categorías', 'manage_options', 'categorias', 'cc_gestionar_categorias' );
}
add_action( 'admin_menu', 'cc_menu' );

function cc_pagina_principal() {
	echo '<h1>Bienvenido al Cheque Creador</h1>';
}
