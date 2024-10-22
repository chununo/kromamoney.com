<?php

function cargar_estilos_oscuros_en_pagina() {
    
    
    wp_enqueue_style('dark-style', get_stylesheet_directory_uri() . '/style.css');
    
}
add_action('wp_enqueue_scripts', 'cargar_estilos_oscuros_en_pagina');