<?php


namespace BicepsDigital\LineBreak;

// http://prirucka.ujc.cas.cz/?id=880
class LineBreak {

    const SYMBOL_NON_BREAKABLE = '&nbsp;';
    const SYMBOL_SPACE = "\x20";

    public static function parse($text) {
        $text = self::keepOnlySpaceAsWhiteSpace($text);
        $words = WordFactory::createWords($text);
        return self::joinWords($words);
    }

    /**
     * @param $words
     * @return string
     */
    protected static function joinWords($words) {
        $outputText = '';
        $numberOfWords = count($words);
        for ($wordIndex = 0; $wordIndex < $numberOfWords; $wordIndex++) {
            /** @var $word Word */
            $word = $words[$wordIndex];

            // word is not last
            if ($wordIndex < $numberOfWords - 1) {
                $nextWord = $words[$wordIndex + 1];
                if ($word->isNonBreakableWith($nextWord)) {
                    $outputText .= $word->text . self::SYMBOL_NON_BREAKABLE;
                } else {
                    $outputText .= $word->text . self::SYMBOL_SPACE;
                }
            } else {
                $outputText .= $word->text;
            }
        }

        return $outputText;
    }

    /**
     * (MS Word is adding freaking whitespace characters to output text
     * @param $text
     * @return mixed
     */
    protected static function keepOnlySpaceAsWhiteSpace($text) {
        // \x20 -> space
        // \xC2\xA0 -> nonbreakable space (word is exporting this with another space ...)
        $whiteSpaces = array("\x20\x20", "\xC2\xA0\x20", "\xC2\xA0");
        $text = str_replace($whiteSpaces, "\x20", $text);
        return $text;
    }
}