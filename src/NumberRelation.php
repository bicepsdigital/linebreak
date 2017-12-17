<?php

namespace BicepsDigital\LineBreak;

class NumberRelation extends Word {

	const CODE = 'numberRelation';

	public $type = self::CODE;

	static $lexems = array(
		':',
		'+',
		'*',
		'/',
		'=',
		'-',
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