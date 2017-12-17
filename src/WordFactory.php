<?php

namespace BicepsDigital\LineBreak;

class WordFactory {

	/**
	 * @param $text
	 *
	 * @return array
	 */
	public static function createWords( $text ) {

		$words = self::getWords( $text );

		return self::createClassWords( $words );
	}

	/**
	 * @param $text
	 *
	 * @return array
	 */
	protected static function getWords( $text ) {
		$words = explode( ' ', $text );

		return $words;
	}

	/**
	 * @param $words
	 *
	 * @return array
	 */
	protected static function createClassWords( $words ) {
		$classWords = array();

		foreach ( $words as $string ) {
			$classWords[] = self::getWordInstance( $string );
		}

		return $classWords;
	}

	/**
	 * @param $text
	 *
	 * @return Word
	 */
	public static function getWordInstance( $text ) {

		if ( BeforeNumber::isType( $text ) ) {
			return new BeforeNumber( $text );
		}else if ( Preposition::isType( $text ) ) {
			return new Preposition( $text );
		} elseif ( Number::isType( $text ) ) {
			return new Number( $text );
		} else  {
			return new Word( $text );
		}
	}

}