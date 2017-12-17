<?php

namespace BicepsDigital\LineBreak;

class Number extends Word {

	const CODE = 'number';

	public $type = self::CODE;

	/**
	 * @param $text
	 *
	 * @return bool
	 */
	protected static function lastCharIsComma( $text ) {
		return substr( $text, - 1 ) === ',';
	}

	public function isNonBreakableWith( Word $nextWord = null ) {
		return true;
	}

	/**
	 * @param $text
	 *
	 * @return mixed
	 */
	protected static function stripCommonlyUsedCharacters( $text ) {
		$stringsToRemove = array( '(', ')', '-', '.', '&ndash;', '–' );

		if ( ! self::lastCharIsComma( $text ) ) {
			$stringsToRemove[] = ',';
		}

		return str_replace( $stringsToRemove, '', $text );
	}

	public static function isType( $text ) {
		$text = self::stripCommonlyUsedCharacters( $text );

		return is_numeric( $text );
	}
}