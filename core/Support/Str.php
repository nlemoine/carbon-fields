<?php
namespace Carbon_Fields\Support;

/**
 * String helper functions
 */
class Str {
	protected static $snake_cache;

	/**
	 * Convert a string to snake_case. Based on Laravel's implementation: //goo.gl/DPndgi
	 *
	 * @param  string  $value
	 * @param  string  $delimiter
	 * @return string
	 */
	public static function snake_case($value, $delimiter = '_') {
		$key = $value . $delimiter;

		if ( isset( self::$snake_cache[ $key ] ) ) {
			return self::$snake_cache[ $key ];
		}

		if ( ! ctype_lower( $value ) ) {
			$value = preg_replace( '~[^\w]~u', ' ', $value );

			$value = ucwords($value);

			$value = preg_replace( '~\s+~', '', $value );

			$value = preg_replace( '/(.)(?=[A-Z])/', '$1' . $delimiter, $value );

			$value = mb_strtolower( $value, 'UTF-8' );
		}

		self::$snake_cache[ $key ] = $value;

		return $value;
	}

	/**
	 * Convert a string to Snake_Camel_Case. We use that for class names:
	 * Choose_Sidebar_Field
	 */
	public static function snake_camel_case($value) {
		$snake_case_value = self::snake_case($value);

		return str_replace( ' ', '_', ucwords( str_replace( '_', ' ', $snake_case_value ) ) );
	}

	/**
	 * ucwords() that works with UTF-8.
	 */
	public static function ucwords($value) {
		return mb_convert_case( $value, MB_CASE_TITLE, 'UTF-8' );
	}

}