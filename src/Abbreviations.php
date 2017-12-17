<?php

namespace BicepsDigital\LineBreak;

class Abbreviations {

	const DEFAULT_ABBREVIATIONS = array(
		'a. s.'     => 'a.&nbsp;s.',
		's. r. o.'  => 's.&nbsp;r.&nbsp;o.',
		'mn. č.'    => 'mn.&nbsp;č.',
		'př. n. l.' => 'př.&nbsp;n.&nbsp;l.'
	);


	protected static $abbreviations = self::DEFAULT_ABBREVIATIONS;

	public static function resetAbbreviations() {
		self::$abbreviations = self::DEFAULT_ABBREVIATIONS;
	}

	public static function getAbbreviations() {
		return self::$abbreviations;
	}

	public static function addAbbreviation( $newAbbreviation ) {

		$addedValue = $newAbbreviation;
		if ( ! is_array( $addedValue ) ) {
			$addedValue = array( $newAbbreviation );
		}

		self::$abbreviations = array_merge( self::$abbreviations, $addedValue );
	}

	public static function parse( $text ) {
		return str_replace( array_keys( self::$abbreviations ), array_values( self::$abbreviations ), $text );
	}

}