<?php


namespace Tests;

use BicepsDigital\LineBreak\Number;
use BicepsDigital\LineBreak\Preposition;
use BicepsDigital\LineBreak\Word;
use BicepsDigital\LineBreak\WordFactory;
use BicepsDigital\Test\TestCase;

class FactoryTest extends TestCase {

    /**
     * @param $expectedResult
     * @param $text
     */
    protected function assertExpectedWords($text, $expectedResult) {
        $factory = new WordFactory();
        $this->assertEquals($expectedResult, $factory->createWords($text));
    }

    public function testEverythingWord() {
        $this->assertExpectedWords('janek lukáš obr', array(
            new Word('janek'),
            new Word('lukáš'),
            new Word('obr')
        ));
    }

    public function testTwoWordsOneNumber() {
        $this->assertExpectedWords('janek 12 obr', array(
            new Word('janek'),
            new Number('12'),
            new Word('obr')
        ));
    }

    public function testOneWordOneNumberOnePreposition() {
        $this->assertExpectedWords('janek 12 s', array(
            new Word('janek'),
            new Number('12'),
            new Preposition('s')
        ));
    }

}