<?php

namespace BicepsDigital\LineBreak;


class Word {
    const CODE = 'word';

    public $text;
    public $type = self::CODE;

    public function __construct($text) {
        $this->text = $text;
    }

    /**
     *
     * @param Word|null $nextWord
     * @return bool
     */
    public function isNonBreakableWith(Word $nextWord = null){
        return false;
    }

    public static function isType($text) {
        return true;
    }

}