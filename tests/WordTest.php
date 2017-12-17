<?php
/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 13.01.2017
 * Time: 12:38
 */

namespace Tests;

use BicepsDigital\LineBreak\Word;
use BicepsDigital\Test\StringUtils;
use BicepsDigital\Test\TestCase;

class WordTest extends TestCase {

	public function testDefaultProperties() {
		$randomString = 'necooo';
		$word         = new Word( $randomString );
		self::assertEquals( $randomString, $word->text );
		self::assertEquals( 'word', $word->type );
	}

	public function testIsWordType() {
		self::assertEquals( true, Word::isType( StringUtils::random() ) );
	}

}