<?php
/**
 * Load necessary Customizer controls and functions.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Add fields.
require_once trailingslashit( dirname( __FILE__ ) ) . 'class-customize-field.php';

// Controls.
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/class-react-control.php';
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/class-color-control.php';
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/class-range-control.php';
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/class-typography-control.php';
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/class-wrapper-control.php';
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/class-upsell-section.php';
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/class-upsell-control.php';
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/class-deprecated.php';

// Helper functions.
require_once trailingslashit( dirname( __FILE__ ) ) . 'helpers.php';

// Deprecated.
require_once trailingslashit( dirname( __FILE__ ) ) . 'deprecated.php';
