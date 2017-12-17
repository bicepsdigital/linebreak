<?php

namespace BicepsDigital\LineBreak;

class Word {

	const CODE = 'word';

	public $text;
	public $type = self::CODE;

	public function __construct( $text ) {
		$this->text = $text;
	}

	/**
	 *
	 * @param Word|null $nextWord
	 *
	 * @return bool
	 */
	public function isNonBreakableWith( Word $nextWord = null ) {
		return false;
	}

	public static function isType( $text ) {
		return true;
	}

	/**
	 * @param $nextWordType
	 * @param $nonBreakableTypesArray
	 *
	 * @return bool
	 */
	protected function isNonBreakableByArray( $nextWordType, $nonBreakableTypesArray ) {
		if ( in_array( $nextWordType, $nonBreakableTypesArray ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param $text
	 * @param $lexems
	 *
	 * @return bool
	 */
	protected static function isTypeInArray( $text, $lexems ) {
		if ( in_array( $text, $lexems ) ) {
			return true;
		} else {
			return false;
		}
	}

}