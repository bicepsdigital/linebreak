<?php
/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 13.01.2017
 * Time: 12:38
 */

namespace Tests;

use BicepsDigital\LineBreak\BeforeNumber;
use BicepsDigital\LineBreak\Number;
use BicepsDigital\LineBreak\Word;
use BicepsDigital\LineBreak\WordFactory;
use BicepsDigital\Test\StringUtils;
use BicepsDigital\Test\TestCase;

class BeforeNumberTest extends TestCase {

	public function testDefaultProperties() {
		$randomString = 's';
		$word         = new BeforeNumber( $randomString );
		self::assertEquals( $randomString, $word->text );
		self::assertEquals( 'beforeNumber', $word->type );
	}

	public function testHasAllPrepositionsSaved() {
		$mustHaveThisPreposition = array(
			'§',
			'#',
			'†',
			's.',
			'č.',
			'obr.',
			'tab.'
		);
		$this->assertArrayEql( $mustHaveThisPreposition, BeforeNumber::$lexems );
	}

	public function testIsWordTypeWillReturnTrueOnMark() {
		foreach ( BeforeNumber::$lexems as $lexem ) {
			$this->assertTrue( BeforeNumber::isType( $lexem ) );
		}
	}

	public function testIsWordTypeWillReturnFalseOnEverythingElse() {
		for ( $i = 0; $i < 10; $i ++ ) {
			$this->assertFalse( BeforeNumber::isType( StringUtils::random() ) );
		}
	}

	public function testNonBreakableTrueWithExactTypes() {
		$isNonBreakableWithTypes = array(
			Number::CODE
		);

		$mark        = new BeforeNumber( '#' );
		$dummyNumber = new Number( '1000' );

		foreach ( $isNonBreakableWithTypes as $type ) {
			$dummyNumber->type = $type;
			$this->assertTrue( $mark->isNonBreakableWith( $dummyNumber ) );
		}
	}

	public function testBeforeNumberFactory() {
		foreach ( BeforeNumber::$lexems as $lexem ) {
			self::assertInstanceOf( BeforeNumber::class, WordFactory::getWordInstance( $lexem ) );
		}
	}

}