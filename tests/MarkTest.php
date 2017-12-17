<?php
/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 13.01.2017
 * Time: 12:38
 */

namespace Tests;

use BicepsDigital\LineBreak\Mark;
use BicepsDigital\LineBreak\Number;
use BicepsDigital\LineBreak\Word;
use BicepsDigital\Test\StringUtils;
use BicepsDigital\Test\TestCase;

class MarkTest extends TestCase {

	public function testDefaultProperties() {
		$randomString = 's';
		$word         = new Mark( $randomString );
		self::assertEquals( $randomString, $word->text );
		self::assertEquals( 'mark', $word->type );
	}

	public function testHasAllPrepositionsSaved() {
		$mustHaveThisPreposition = array(
			'§',
			'#',
			'*',
			'†',
		);
		$this->assertArrayEql( $mustHaveThisPreposition, Mark::$lexems );
	}

	public function testIsWordTypeWillReturnTrueOnMark() {
		foreach ( Mark::$lexems as $lexem ) {
			$this->assertTrue( Mark::isType( $lexem ) );
		}
	}

	public function testIsWordTypeWillReturnFalseOnEverythingElse() {
		for ( $i = 0; $i < 10; $i ++ ) {
			$this->assertFalse( Mark::isType( StringUtils::random() ) );
		}
	}

	public function testNonBreakableTrueWithExactTypes() {
		$isNonBreakableWithTypes = array(
			Number::CODE
		);

		$mark = new Mark( '#' );
		$dummyNumber   = new Number( '1000' );

		foreach ( $isNonBreakableWithTypes as $type ) {
			$dummyNumber->type = $type;
			$this->assertTrue( $mark->isNonBreakableWith( $dummyNumber ) );
		}
	}




}