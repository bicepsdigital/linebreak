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
use BicepsDigital\LineBreak\NumberRelation;
use BicepsDigital\LineBreak\Word;
use BicepsDigital\LineBreak\WordFactory;
use BicepsDigital\Test\StringUtils;
use BicepsDigital\Test\TestCase;

class NumberRelationTest extends TestCase {

	public function testDefaultProperties() {
		$randomString = 's';
		$word         = new NumberRelation( $randomString );
		self::assertEquals( $randomString, $word->text );
		self::assertEquals( 'numberRelation', $word->type );
	}

	public function testHasAllPrepositionsSaved() {
		$mustHaveThisPreposition = array(
			':',
			'+',
			'*',
			'/',
			'=',
			'-',
		);

		$this->assertArrayEql( $mustHaveThisPreposition, NumberRelation::$lexems );
	}

	public function testIsWordTypeWillReturnTrueOnNumberRelation() {
		foreach ( NumberRelation::$lexems as $lexem ) {
			$this->assertTrue( NumberRelation::isType( $lexem ) );
		}
	}


	public function testNumberRelationFactory() {
		foreach ( NumberRelation::$lexems as $lexem ) {
			self::assertInstanceOf( NumberRelation::class, WordFactory::getWordInstance( $lexem ) );
		}
	}

	public function testIsWordTypeWillReturnFalseOnEverythingElse() {
		for ( $i = 0; $i < 10; $i ++ ) {
			$this->assertFalse( NumberRelation::isType( StringUtils::random() ) );
		}
	}

}