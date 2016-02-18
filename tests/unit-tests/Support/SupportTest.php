<?php
use Carbon_Fields\Support\Str;

/**
 * @group Support
 */
class CarbbonSupportStrTest extends WP_UnitTestCase {
	/**
	 * https://github.com/laravel/framework/blob/5.2/tests/Support/SupportStrTest.php#L157
	 */
	function testSnakeCase() {
		$this->assertEquals('theme_options', Str::snake_case('theme options'));
		$this->assertEquals('theme_options', Str::snake_case('Theme Options'));

		$this->assertEquals('laravel_p_h_p_framework', Str::snake_case('LaravelPHPFramework'));
        $this->assertEquals('laravel_php_framework', Str::snake_case('LaravelPhpFramework'));
        $this->assertEquals('laravel php framework', Str::snake_case('LaravelPhpFramework', ' '));
        $this->assertEquals('laravel_php_framework', Str::snake_case('Laravel Php Framework'));
        $this->assertEquals('laravel_php_framework', Str::snake_case('Laravel    Php      Framework   '));
	}
}