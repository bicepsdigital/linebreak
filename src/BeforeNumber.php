<?php

namespace BicepsDigital\LineBreak;

class BeforeNumber extends Word {

	const CODE = 'beforeNumber';

	public $type = self::CODE;

	static $lexems = array(
		'§',
		'#',
		'*',
		'†',
		's.',
		'č.',
		'obr.',
		'tab.'
	);

	static $nonBreakableWith = array(
		Number::CODE
	);

	public function isNonBreakableWith( Word $nextWord = null ) {
		return $this->isNonBreakableByArray( $nextWord->type, self::$nonBreakableWith );
	}

	public static function isType( $text ) {
		return self::isTypeInArray( $text, self::$lexems );
	}

}