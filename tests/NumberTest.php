<?php
/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 13.01.2017
 * Time: 12:38
 */

namespace Tests;

use BicepsDigital\LineBreak\Number;
use BicepsDigital\Test\TestCase;

class NumberTest extends TestCase {

	public function testDefaultProperties() {
		$randomString = '12';
		$word         = new Number( $randomString );
		self::assertEquals( $randomString, $word->text );
		self::assertEquals( 'number', $word->type );
	}

	public function testNumberWithBracket() {
		$this->assertIsNumber( '(123' );
		$this->assertIsNumber( '123)' );
	}

	public function testNumberWithDash() {
		$this->assertIsNumber( '9.-15.' );
		$this->assertIsNumber( '9.–15.' );
		$this->assertIsNumber( '9.&ndash;15.' );
	}

	/**
	 * @param $number
	 */
	protected function assertIsNumber( $number ) {
		$this->assertTrue( Number::isType( $number ), 'is not number' );
	}

}