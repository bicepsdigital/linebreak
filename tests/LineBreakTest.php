<?php
/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 13.01.2017
 * Time: 12:38
 */

namespace Tests;

use BicepsDigital\LineBreak\LineBreak;
use BicepsDigital\Test\TestCase;

class LineBreakTest extends TestCase {

	/**
	 * @param $expected
	 * @param $input
	 */
	protected function assertLineBreak( $expected, $input ) {
		$this->assertEquals( $expected, LineBreak::parse( $input ) );
	}

	public function testParseSimpleText() {
		$this->assertLineBreak( 'janek lukáš obr', 'janek lukáš obr' );
	}

	public function testParseSimpleNumber() {
		$this->assertLineBreak( 'janek 12&nbsp;obr', 'janek 12 obr' );
	}

	public function testParseSimplePreposition() {
		$this->assertLineBreak( '12&nbsp;párků s&nbsp;kečupem', '12 párků s kečupem' );
	}

	public function testNumberWithUnit() {
		$this->assertLineBreak( '12&nbsp;000&nbsp;000&nbsp;Kč.', '12 000 000 Kč.' );
	}

	public function testAnother() {
		$this->assertLineBreak( 'Stockholmský obchodní dům Åhléns, před nímž v&nbsp;pátek najel do davu lidí atentátník s&nbsp;nákladním vozem, sklidil kritiku za nápad nabídnout zboží poškozené kouřem ve slevě. Za chybu se obchod s&nbsp;luxusním zbožím omluvil a&nbsp;výprodej se neuskuteční.', 'Stockholmský obchodní dům Åhléns, před nímž v pátek najel do davu lidí atentátník s nákladním vozem, sklidil kritiku za nápad nabídnout zboží poškozené kouřem ve slevě. Za chybu se obchod s luxusním zbožím omluvil a výprodej se neuskuteční.' );
	}

	public function testDoubleSpace() {
		$this->assertLineBreak( 'janek karel', 'janek  karel' );
	}

	public function testNonBreakableSpaceWord() {
		$this->assertLineBreak( 'Do této pozice jste vstoupil z&nbsp;pozice obchodníka', 'Do této pozice jste vstoupil z  pozice obchodníka' );
	}

	public function testDate() {
		$this->assertLineBreak( '15.&nbsp;9.-15.&nbsp;12.&nbsp;2017', '15. 9.-15. 12. 2017' );
	}

	public function testPrepositionUppercase() {
		$this->assertLineBreak( 'A&nbsp;je to', 'A je to' );
	}

}