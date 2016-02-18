<?php
use Carbon_Fields\Container\Container;
/**
 * @group Container
 */
class ContainerInitializationTest extends WP_UnitTestCase {
	function setup() {

	}

	function tearDown() {
		// foreach (Container::$registered_panel_ids as $panel_id) {
		// 	Container::drop_unique_panel_id($panel_id);	
		// }
	}

	function testContainerIsCreatedProperly() {
		$container = Container::make('theme_options', 'Color Scheme');

		$this->assertEquals("Color Scheme", $container->title);
	}

	/**
	 * @expectedException Carbon_Fields\Exception\Incorrect_Syntax_Exception
	 * @skip
	 */
	function testContainerRequiresTitle() {
		$container = Container::make('theme_options', '');
	}

	function testPostMetaContainerCouldBeDefinedAsCustomFields() {
		$this->markTestIncomplete(
		  'This test needs refactoring of the codebase.'
		);
		$container1 = Container::make('custom_fields', 'Color Scheme');

		$this->assertEquals("post_meta", $container->type);
	}



}