<?php /*

  This file is part of a child theme called Focus On Services.
  Functions in this file will be loaded before the parent theme's functions.
  For more information, please read
  https://developer.wordpress.org/themes/advanced-topics/child-themes/

*/

// this code loads the parent's stylesheet (leave it in place unless you know what you're doing)

function your_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, 
      get_template_directory_uri() . '/style.css'); 

    wp_enqueue_style( 'child-style', 
      get_stylesheet_directory_uri() . '/style.css', 
      array($parent_style), 
      wp_get_theme()->get('Version') 
    );
}

add_action('wp_enqueue_scripts', 'your_theme_enqueue_styles');

/*  Add your own functions below this line.
    ======================================== */ 



add_action('wp_footer', 'replace_search_modal_content');
function replace_search_modal_content() {
    // Genera el contenido del shortcode de Ajax Search Pro
    $ajax_search_pro_content = do_shortcode('[wd_asp id=1]'); // Reemplaza '1' con el ID correcto de tu barra de búsqueda

    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Selecciona el ícono de búsqueda
        var searchIcon = document.querySelector('.search-item a');
        
        if (searchIcon) {
            searchIcon.addEventListener('click', function() {
                // Espera a que se abra el modal
                setTimeout(function() {
                    var modalContent = document.querySelector('.inside-navigation .search-field');
                    if (modalContent) {
                        modalContent.innerHTML = <?php echo json_encode($ajax_search_pro_content); ?>; // Inserta el contenido del shortcode de Ajax Search Pro
                    }
                }, 300); // Retraso para asegurarse de que el modal esté completamente cargado
            });
        }
    });
    </script>
    <?php
}
