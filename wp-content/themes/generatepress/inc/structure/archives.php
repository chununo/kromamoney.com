<?php
/**
 * Archive elements.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'generate_archive_title' ) ) {
	add_action( 'generate_archive_title', 'generate_archive_title' );
	/**
	 * Build the archive title
	 *
	 * @since 1.3.24
	 */
	function generate_archive_title() {
		if ( ! function_exists( 'the_archive_title' ) ) {
			return;
		}
		?>
		<header <?php generate_do_attr( 'page-header' ); ?>>
			<?php
			/**
			 * generate_before_archive_title hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_archive_title' );
			?>

			<h1 class="page-title">
				<?php the_archive_title(); ?>
			</h1>

			<?php
			/**
			 * generate_after_archive_title hook.
			 *
			 * @since 0.1
			 *
			 * @hooked generate_do_archive_description - 10
			 */
			do_action( 'generate_after_archive_title' );
			?>
		</header>
		<?php
	}
}

if ( ! function_exists( 'generate_filter_the_archive_title' ) ) {
	add_filter( 'get_the_archive_title', 'generate_filter_the_archive_title' );
	/**
	 * Alter the_archive_title() function to match our original archive title function
	 *
	 * @since 1.3.45
	 *
	 * @param string $title The archive title.
	 * @return string The altered archive title
	 */
	function generate_filter_the_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			/*
			 * Queue the first post, that way we know
			 * what author we're dealing with (if that is the case).
			 */
			the_post();

			$title = sprintf(
				'%1$s<span class="vcard">%2$s</span>',
				get_avatar( get_the_author_meta( 'ID' ), 50 ),
				get_the_author()
			);

			/*
			 * Since we called the_post() above, we need to
			 * rewind the loop back to the beginning that way
			 * we can run the loop properly, in full.
			 */
			rewind_posts();
		}

		return $title;

	}
}

add_action( 'generate_after_archive_title', 'generate_do_archive_description' );
/**
 * Output the archive description.
 *
 * @since 2.3
 */
function generate_do_archive_description() {
	$term_description = get_the_archive_description();

	if ( ! empty( $term_description ) ) {
		if ( is_author() ) {
			printf( '<div class="author-info">%s</div>', $term_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			printf( '<div class="taxonomy-description">%s</div>', $term_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	/**
	 * generate_after_archive_description hook.
	 *
	 * @since 0.1
	 */
	do_action( 'generate_after_archive_description' );
}

add_action( 'generate_before_loop', 'generate_do_search_results_title' );
/**
 * Add the search results title to the search results page.
 *
 * @since 3.1.0
 * @param string $template The template we're targeting.
 */
function generate_do_search_results_title( $template ) {
	if ( 'search' === $template ) {
		// phpcs:ignore -- No escaping needed.
		echo apply_filters(
			'generate_search_title_output',
			sprintf(
				'<header %s><h1 class="page-title">%s</h1></header>',
				generate_get_attr( 'page-header' ),
				sprintf(
					/* translators: 1: Search query name */
					__( 'Search Results for: %s', 'generatepress' ),
					'<span>' . get_search_query() . '</span>'
				)
			)
		);
	}
}
