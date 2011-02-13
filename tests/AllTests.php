<?php

require_once '../src/autoload.php';
require_once 'PHPUnit/Autoload.php';
require_once 'Fafoma/Form/AllTests.php';

class AllTests {

	public static function suite() {
		$suite = new PHPUnit_Framework_TestSuite('Fafoma');
		
		$suite->addTest(\Fafoma\Tests\Form\AllTests::suite());

		return $suite;
	}
}