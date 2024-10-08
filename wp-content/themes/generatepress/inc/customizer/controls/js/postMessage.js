/* global gpPostMessageFields */
/* eslint max-depth: off */
var gpPostMessage = {

	/**
	 * The fields.
	 *
	 * @since 1.0.0
	 */
	fields: {},

	/**
	 * A collection of methods for the <style> tags.
	 *
	 * @since 1.0.0
	 */
	styleTag: {

		/**
		 * Add a <style> tag in <head> if it doesn't already exist.
		 *
		 * @since 1.0.0
		 *
		 * @param {string} id - The field-ID.
		 *
		 * @return {void}
		 */
		add( id ) {
			id = id.replace( /[^\w\s]/gi, '-' );
			if ( null === document.getElementById( 'gp-postmessage-' + id ) || 'undefined' === typeof document.getElementById( 'gp-postmessage-' + id ) ) {
				jQuery( 'head' ).append( '<style id="gp-postmessage-' + id + '"></style>' );
			}
		},

		/**
		 * Add a <style> tag in <head> if it doesn't already exist,
		 * by calling the this.add method, and then add styles inside it.
		 *
		 * @since 1.0.0
		 *
		 * @param {string} id - The field-ID.
		 * @param {string} styles - The styles to add.
		 *
		 * @return {void}
		 */
		addData( id, styles ) {
			id = id.replace( '[', '-' ).replace( ']', '' );
			gpPostMessage.styleTag.add( id );
			jQuery( '#gp-postmessage-' + id ).text( styles );
		},
	},

	/**
	 * Common utilities.
	 *
	 * @since 1.0.0
	 */
	util: {

		/**
		 * Processes the value and applies any replacements and/or additions.
		 *
		 * @since 1.0.0
		 *
		 * @param {Object} output - The output (js_vars) argument.
		 * @param {mixed}  value - The value.
		 * @param {string} controlType - The control-type.
		 *
		 * @return {string|false} - Returns false if value is excluded, otherwise a string.
		 */
		processValue( output, value ) {
			var self = this,
				settings = window.parent.wp.customize.get(),
				excluded = false;

			if ( 'object' === typeof value ) {
				_.each( value, function( subValue, key ) {
					value[ key ] = self.processValue( output, subValue );
				} );
				return value;
			}
			output = _.defaults( output, {
				prefix: '',
				units: '',
				suffix: '',
				value_pattern: '$',
				pattern_replace: {},
				exclude: [],
			} );

			if ( 1 <= output.exclude.length ) {
				_.each( output.exclude, function( exclusion ) {
					if ( value == exclusion ) {
						excluded = true;
					}
				} );
			}

			if ( excluded ) {
				return false;
			}

			value = output.value_pattern.replace( new RegExp( '\\$', 'g' ), value );
			_.each( output.pattern_replace, function( id, placeholder ) {
				if ( ! _.isUndefined( settings[ id ] ) ) {
					value = value.replace( placeholder, settings[ id ] );
				}
			} );
			return output.prefix + value + output.units + output.suffix;
		},

		/**
		 * Make sure urls are properly formatted for background-image properties.
		 *
		 * @since 1.0.0
		 *
		 * @param {string} url - The URL.
		 *
		 * @return {string} - Returns the URL.
		 */
		backgroundImageValue( url ) {
			return ( -1 === url.indexOf( 'url(' ) ) ? 'url(' + url + ')' : url;
		},
	},

	/**
	 * A collection of utilities for CSS generation.
	 *
	 * @since 1.0.0
	 */
	css: {

		/**
		 * Generates the CSS from the output (js_vars) parameter.
		 *
		 * @since 1.0.0
		 *
		 * @param {Object} output - The output (js_vars) argument.
		 * @param {mixed}  value - The value.
		 * @param {string} controlType - The control-type.
		 *
		 * @return {string} - Returns CSS as a string.
		 */
		fromOutput( output, value, controlType ) {
			var styles = '',
				mediaQuery = false,
				processedValue;

			try {
				value = JSON.parse( value );
			} catch ( e ) {} // eslint-disable-line no-empty

			if ( output.js_callback && 'function' === typeof window[ output.js_callback ] ) {
				value = window[ output.js_callback[ 0 ] ]( value, output.js_callback[ 1 ] );
			}

			// Apply the gpPostMessageStylesOutput filter.
			styles = wp.hooks.applyFilters( 'gpPostMessageStylesOutput', styles, value, output, controlType );

			if ( '' === styles ) {
				switch ( controlType ) {
					case 'kirki-multicolor':
					case 'kirki-sortable':
						styles += output.element + '{';
						_.each( value, function( val, key ) {
							if ( output.choice && key !== output.choice ) {
								return;
							}
							processedValue = gpPostMessage.util.processValue( output, val );

							if ( '' === processedValue ) {
								if ( 'background-color' === output.property ) {
									processedValue = 'unset';
								} else if ( 'background-image' === output.property ) {
									processedValue = 'none';
								}
							}

							if ( false !== processedValue ) {
								styles += output.property ? output.property + '-' + key + ':' + processedValue + ';' : key + ':' + processedValue + ';';
							}
						} );
						styles += '}';
						break;
					default:
						if ( 'kirki-image' === controlType ) {
							value = ( ! _.isUndefined( value.url ) ) ? gpPostMessage.util.backgroundImageValue( value.url ) : gpPostMessage.util.backgroundImageValue( value );
						}
						if ( _.isObject( value ) ) {
							styles += output.element + '{';
							_.each( value, function( val, key ) {
								var property;
								if ( output.choice && key !== output.choice ) {
									return;
								}
								processedValue = gpPostMessage.util.processValue( output, val );
								property = output.property ? output.property : key;

								if ( '' === processedValue ) {
									if ( 'background-color' === property ) {
										processedValue = 'unset';
									} else if ( 'background-image' === property ) {
										processedValue = 'none';
									}
								}

								if ( false !== processedValue ) {
									styles += property + ':' + processedValue + ';';
								}
							} );
							styles += '}';
						} else {
							processedValue = gpPostMessage.util.processValue( output, value );
							if ( '' === processedValue ) {
								if ( 'background-color' === output.property ) {
									processedValue = 'unset';
								} else if ( 'background-image' === output.property ) {
									processedValue = 'none';
								}
							}

							if ( false !== processedValue ) {
								styles += output.element + '{' + output.property + ':' + processedValue + ';}';
							}
						}
						break;
				}
			}

			// Get the media-query.
			if ( output.media_query && 'string' === typeof output.media_query && ! _.isEmpty( output.media_query ) ) {
				mediaQuery = output.media_query;
				if ( -1 === mediaQuery.indexOf( '@media' ) ) {
					mediaQuery = '@media ' + mediaQuery;
				}
			}

			// If we have a media-query, add it and return.
			if ( mediaQuery ) {
				return mediaQuery + '{' + styles + '}';
			}

			// Return the styles.
			return styles;
		},
	},

	/**
	 * A collection of utilities to change the HTML in the document.
	 *
	 * @since 1.0.0
	 */
	html: {

		/**
		 * Modifies the HTML from the output (js_vars) parameter.
		 *
		 * @since 1.0.0
		 *
		 * @param {Object} output - The output (js_vars) argument.
		 * @param {mixed}  value - The value.
		 *
		 * @return {void}
		 */
		fromOutput( output, value ) {
			if ( output.js_callback && 'function' === typeof window[ output.js_callback ] ) {
				value = window[ output.js_callback[ 0 ] ]( value, output.js_callback[ 1 ] );
			}

			if ( _.isObject( value ) || _.isArray( value ) ) {
				if ( ! output.choice ) {
					return;
				}
				_.each( value, function( val, key ) {
					if ( output.choice && key !== output.choice ) {
						return;
					}
					value = val;
				} );
			}
			value = gpPostMessage.util.processValue( output, value );

			if ( output.attr ) {
				jQuery( output.element ).attr( output.attr, value );
			} else {
				jQuery( output.element ).html( value );
			}
		},
	},

	/**
	 * A collection of utilities to allow toggling a CSS class.
	 *
	 * @since 1.0.0
	 */
	toggleClass: {

		/**
		 * Toggles a CSS class from the output (js_vars) parameter.
		 *
		 * @since 1.0.0
		 *
		 * @param {Object} output - The output (js_vars) argument.
		 * @param {mixed}  value - The value.
		 *
		 * @return {void}
		 */
		fromOutput( output, value ) {
			if ( 'undefined' === typeof output.class || 'undefined' === typeof output.value ) {
				return;
			}
			if ( value === output.value && ! jQuery( output.element ).hasClass( output.class ) ) {
				jQuery( output.element ).addClass( output.class );
			} else {
				jQuery( output.element ).removeClass( output.class );
			}
		},
	},
};

jQuery( document ).ready( function() {
	var styles;
	_.each( gpPostMessageFields, function( field ) {
		wp.customize( field.settings, function( value ) {
			value.bind( function( newVal ) {
				styles = '';
				_.each( field.js_vars, function( output ) {
					output.function = ( ! output.function || 'undefined' === typeof gpPostMessage[ output.function ] ) ? 'css' : output.function;
					field.type = ( field.choices && field.choices.parent_type ) ? field.choices.parent_type : field.type;

					if ( 'css' === output.function ) {
						styles += gpPostMessage.css.fromOutput( output, newVal, field.type );
					} else {
						gpPostMessage[ output.function ].fromOutput( output, newVal, field.type );
					}
				} );
				gpPostMessage.styleTag.addData( field.settings, styles );
			} );
		} );
	} );
} );
