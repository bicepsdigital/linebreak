<?php
/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 13.01.2017
 * Time: 12:38
 */

namespace Tests;

use BicepsDigital\LineBreak\Preposition;
use BicepsDigital\LineBreak\Word;
use BicepsDigital\Test\StringUtils;
use BicepsDigital\Test\TestCase;

class PrepositionTest extends TestCase {

	public function testDefaultProperties() {
		$randomString = 's';
		$word         = new Preposition( $randomString );
		self::assertEquals( $randomString, $word->text );
		self::assertEquals( 'preposition', $word->type );
	}

	public function testHasAllPrepositionsSaved() {
		$mustHaveThisPreposition = array(
			'k',
			's',
			'z',
			'v',
			'o',
			'u',
			'a',
			'i'
		);
		$this->assertArrayEql( $mustHaveThisPreposition, Preposition::$lexems );
	}

	public function testIsWordTypeWillReturnTrueOnPrepositions() {
		foreach ( Preposition::$lexems as $lexem ) {
			$this->assertTrue( Preposition::isType( $lexem ) );
		}
	}

	public function testUppercase() {
		foreach ( Preposition::$lexems as $lexem ) {
			$this->assertTrue( Preposition::isType( strtoupper( $lexem ) ) );
		}
	}

	public function testIsWordTypeWillReturnFalseOnEverythingElse() {
		for ( $i = 0; $i < 10; $i ++ ) {
			$this->assertFalse( Preposition::isType( StringUtils::random() ) );
		}
	}

	public function testNonBreakableTrueWithExactTypes() {
		$isNonBreakableWithTypes = array(
			Word::CODE
		);

		$preposition = new Preposition( 's' );
		$dummyWord   = new Word( '' );

		foreach ( $isNonBreakableWithTypes as $type ) {
			$dummyWord->type = $type;
			$this->assertTrue( $preposition->isNonBreakableWith( $dummyWord ) );
		}
	}

	public function testNonBreakableFalseWithEverythingElse() {

		$preposition = new Preposition( 's' );
		$dummyWord   = new Word( '' );

		for ( $i = 0; $i < 10; $i ++ ) {
			$dummyWord->type = StringUtils::random();
			$this->assertFalse( $preposition->isNonBreakableWith( $dummyWord ) );
		}
	}

}