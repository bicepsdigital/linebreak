<?php

namespace BicepsDigital\LineBreak;


class Preposition extends Word {

    const CODE = 'preposition';

    public $type = self::CODE;

    static $lexems = array(
        'k', 's', 'z', 'v', 'o', 'u', 'a', 'i'
    );

    static $nonBreakableWith = array(
        Word::CODE
    );

    public function isNonBreakableWith(Word $nextWord = null) {
        if (in_array($nextWord->type, self::$nonBreakableWith)) {
            return true;
        } else {
            return false;
        }
    }

    public static function isType($text) {

        $text = strtolower($text);

        if (in_array($text, self::$lexems)) {
            return true;
        } else {
            return false;
        }
    }


}