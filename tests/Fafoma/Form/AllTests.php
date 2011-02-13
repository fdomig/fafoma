<?php
namespace Fafoma\Tests\Form;

require_once 'Fafoma/Form/TextTest.php';
require_once 'Fafoma/Form/TextareaTest.php';

class AllTests {

	public static function suite() {
		$suite = new \PHPUnit_Framework_TestSuite('Form');
		
		$suite->addTestSuite('\\Fafoma\\Tests\\Form\\TextTest');
		$suite->addTestSuite('\\Fafoma\\Tests\\Form\\TextareaTest');

		return $suite;
	}
}