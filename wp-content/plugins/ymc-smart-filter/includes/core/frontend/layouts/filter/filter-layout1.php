<?php if ( ! defined( 'ABSPATH' ) ) exit;

// Add Style
$ymc_filter_text_color = !empty($ymc_filter_text_color) ? "color:".$ymc_filter_text_color.";" : '';
$ymc_filter_bg_color   = !empty($ymc_filter_bg_color) ? "background-color:".$ymc_filter_bg_color.";" : '';
$ymc_filter_active_color = !empty($ymc_filter_active_color) ? "color:".$ymc_filter_active_color.";" : '';
$ymc_filter_font =  "font-family:'".$ymc_filter_font."';";

$filter_css = "#ymc-smart-filter-container-".$c_target." .filter-layout1 .filter-entry .filter-link, 
               #ymc-extra-filter-".$c_target." .filter-layout1 .filter-entry .filter-link {
               ". $ymc_filter_text_color . $ymc_filter_bg_color. $ymc_filter_font ."}               
               #ymc-smart-filter-container-".$c_target." .filter-layout1 .filter-entry .filter-link.active,
               #ymc-extra-filter-".$c_target." .filter-layout1 .filter-entry .filter-link.active {" . $ymc_filter_active_color . "}";

echo '<style id="'.$handle_filter.'">'. preg_replace('|\s+|', ' ', $filter_css) .'</style>';

?>

<div id="<?php echo esc_attr($ymc_filter_layout); ?>-<?php echo esc_attr($c_target); ?>" class="filter-layout <?php echo esc_attr($ymc_filter_layout); ?> <?php echo esc_attr($ymc_filter_layout); ?>-<?php echo esc_attr($id); ?> <?php echo esc_attr($ymc_filter_layout); ?>-<?php echo esc_attr($id); ?>-<?php echo esc_attr($c_target); ?>">

	<?php do_action("ymc_before_filter_layout_".$id.'_'.$c_target); ?>

    <ul class="filter-entry">

		<?php

            $type_multiple = ( (bool) $ymc_multiple_filter ) ? 'multiple' : '';

            if ( is_array($terms_selected) ) {

				// Variables: Options Term
	            $bg_term             = null;
	            $color_term          = null;
	            $class_term          = null;
	            $default_term_active = null;
				$name_term           = null;

	            // Variables: Options Icon
	            $class_terms_align   = null;
	            $color_icon          = null;

	            // Variables: Set Selected Icon
	            $terms_icons         = null;


	            if( $ymc_sort_terms !== 'manual' ) {
					//( $ymc_sort_terms === 'asc' ) ? asort($terms_selected) : arsort($terms_selected);
					( $ymc_sort_terms === 'asc' ) ? sortTaxTerms($terms_selected, 'asc') :
						sortTaxTerms($terms_selected, 'desc');
				}

	            $show_all = apply_filters('ymc_button_show_all_'.$id.'_'.$c_target, __($ymc_post_elements['button_text_all'],'ymc-smart-filter'));

                $all_class_active = ( empty($default_terms) ) ? 'active' : '';

				echo '<li class="filter-item">
                      <a class="filter-link all '. $all_class_active .'" href="#" data-selected="all" data-termid="'. esc_attr($ymc_terms) .'">'. esc_html__($show_all) .'</a></li>';


				foreach ($terms_selected as $term)
				{
					$object_term = get_term( $term );

					if( is_wp_error( $object_term ) || is_null( $object_term ) ) continue;

					// Set Options for Icon
					setOptionsIcon( $ymc_terms_align, $term, $class_terms_align, $color_icon );

					// Set Options Term
					setOptionsTerm( $ymc_terms_options,
						$term,
						$bg_term,
						$color_term,
						$class_term,
						$default_term_active,
						$name_term );

					// Selected Icon for Term
					setSelectedIcon( $ymc_terms_icons, $term, $terms_icons, $color_icon );

					$bg_term = ( !empty($bg_term) ) ? 'background-color:'.$bg_term.';' : '';
					$color_term = ( !empty($color_term) ) ? 'color:'.$color_term.';' : '';
					$default_term_active = ( $default_term_active === 'checked' ) ? 'active': '';
					$name_term = ( !empty($name_term) ) ? $name_term : $object_term->name;

					echo "<li class='filter-item'>
					  <a class='filter-link ".
					     esc_attr($type_multiple) ." ".
					     esc_attr($class_terms_align) ." ".
					     esc_attr($class_term) . " ". esc_attr($default_term_active) ."' style='".
					     esc_attr($bg_term) .
					     esc_attr($color_term) ."' href='#' data-selected='" .
					     esc_attr($object_term->slug) . "' data-termid='" .
					     esc_attr($term) . "'>" . $terms_icons .
					     '<span class="link-inner">'. esc_html($name_term) . '</span>'."</a></li>";

					$terms_icons = null;
					$name_term = '';

				}
            }
		?>

	</ul>

    <div class="posts-found"></div>

    <?php do_action("ymc_after_filter_layout_".$id.'_'.$c_target); ?>

</div>









