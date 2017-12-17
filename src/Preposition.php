<?php

namespace BicepsDigital\LineBreak;

class Preposition extends Word {

	const CODE = 'preposition';

	public $type = self::CODE;

	static $lexems = array(
		'k',
		's',
		'z',
		'v',
		'o',
		'u',
		'a',
		'i',
		'tj.',
		'tzn.',
		't.',
		'fr.',
		'm.',
		'ing.',
		'bc.',
		'mgr.',
		'p.',
		'mjr.',
	);

	static $nonBreakableWith = array(
		Word::CODE
	);

	public function isNonBreakableWith( Word $nextWord = null ) {
		return $this->isNonBreakableByArray( $nextWord->type, self::$nonBreakableWith );
	}

	public static function isType( $text ) {

		$text = strtolower( $text );
		return self::isTypeInArray( $text, self::$lexems );
	}

}