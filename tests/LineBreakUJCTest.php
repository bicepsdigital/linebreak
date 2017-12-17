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

// http://prirucka.ujc.cas.cz/?id=880
class LineBreakUJCTest extends TestCase {

	/**
	 * @param $expected
	 * @param $input
	 */
	protected function assertLineBreak( $expected, $input ) {
		$this->assertEquals( $expected, LineBreak::parse( $input ) );
	}

	public function testPreposition() {
		$this->assertLineBreak( 'k&nbsp;mostu, s&nbsp;bratrem, v&nbsp;Plzni, z&nbsp;nádraží', 'k mostu, s bratrem, v Plzni, z nádraží' );
	}

	public function testPrepositionSecond() {
		$this->assertLineBreak( 'u&nbsp;babičky, o&nbsp;páté, a&nbsp;Janek, i&nbsp;Ivana', 'u babičky, o páté, a Janek, i Ivana' );
	}

	public function testNumbers() {
		$this->assertLineBreak( '2&nbsp;500, 1&nbsp;000&nbsp;000, 25,325&nbsp;23', '2 500, 1 000 000, 25,325 23' );
	}

	public function testNumberAndBrandAfter() {
		$this->assertLineBreak( '50&nbsp;%', '50 %' );
	}

	public function testNumberAndBrandBefore() {
		$this->assertLineBreak( '§&nbsp;23 #&nbsp;26 †&nbsp;2000', '§ 23 # 26 † 2000' );
	}

	public function testNumberMark() {
		$this->assertLineBreak( '5&nbsp;str.', '5 str.' );
		$this->assertLineBreak( '8&nbsp;hod.', '8 hod.' );
		$this->assertLineBreak( 's.&nbsp;53', 's. 53' );
		$this->assertLineBreak( 'č.&nbsp;9', 'č. 9' );
		$this->assertLineBreak( 'obr.&nbsp;1', 'obr. 1' );
		$this->assertLineBreak( 'tab.&nbsp;3', 'tab. 3' );
		$this->assertLineBreak( '100&nbsp;m²', '100 m²' );
		$this->assertLineBreak( '10&nbsp;kg', '10 kg' );
		$this->assertLineBreak( '16&nbsp;h', '16 h' );
		$this->assertLineBreak( '19&nbsp;°C', '19 °C' );
		$this->assertLineBreak( '1&nbsp;000&nbsp;000&nbsp;Kč', '1 000 000 Kč' );
		$this->assertLineBreak( '250&nbsp;€', '250 €' );
	}

	public function testNumberAndWord() {
		$this->assertLineBreak( '500&nbsp;lidí', '500 lidí' );
		$this->assertLineBreak( '365&nbsp;dní', '365 dní' );
		$this->assertLineBreak( '5.&nbsp;pluk', '5. pluk' );
		$this->assertLineBreak( '8.&nbsp;kapitola', '8. kapitola' );
	}

	public function testDates() {
		// v kalendářních datech mezi dnem a měsícem, rok však lze oddělit, např. 21. 6. | 2013, 16. ledna | 1972,
		$this->assertLineBreak( '21.&nbsp;června', '21. června' );
		$this->assertLineBreak( '21.&nbsp;6.', '21. 6.' );
	}

	public function testNumberRelation() {
		$this->assertLineBreak( '5&nbsp;*&nbsp;5&nbsp;=&nbsp;25', '5 * 5 = 25' );
		$this->assertLineBreak( '5&nbsp;*&nbsp;5', '5 * 5' );
		$this->assertLineBreak( '5&nbsp;+&nbsp;5', '5 + 5' );
		$this->assertLineBreak( '5&nbsp;/&nbsp;5', '5 / 5' );
		$this->assertLineBreak( '5&nbsp;-&nbsp;5', '5 - 5' );
		$this->assertLineBreak( '1&nbsp;:&nbsp;50&nbsp;000', '1 : 50 000' );
		$this->assertLineBreak( '5&nbsp;:&nbsp;3', '5&nbsp;:&nbsp;3' );
	}

	public function testPhoneNumber() {
		$this->assertLineBreak( '+420&nbsp;800&nbsp;123&nbsp;987', '+420 800 123 987' );
		$this->assertLineBreak( '723&nbsp;456&nbsp;789', '723 456 789' );
		$this->assertLineBreak( '800&nbsp;11&nbsp;22&nbsp;33', '800 11 22 33' );
	}

	public function testAbbreviations() {
		// ve složených zkratkách, v ustálených spojeních a v různých kódech, např. a. s., s. r. o., mn. č., př. n. l.,
		$this->assertLineBreak( 'Firma a.&nbsp;s.', 'Firma a. s.' );
		$this->assertLineBreak( 'Firma s.&nbsp;r.&nbsp;o.', 'Firma s. r. o.' );
		$this->assertLineBreak( 'Použijte mn.&nbsp;č.', 'Použijte mn. č.' );
		$this->assertLineBreak( 'v&nbsp;roce 300&nbsp;př.&nbsp;n.&nbsp;l.', 'v roce 300 př. n. l.' );
	}

	public function testAbbrevationsPreposition() {
		$this->assertLineBreak( 'tj.&nbsp;jiné', 'tj. jiné' );
		$this->assertLineBreak( 'tzn.&nbsp;jiné', 'tzn. jiné' );
	}

	public function testAbbreavationShortName() {
		$this->assertLineBreak( 'T.&nbsp;Přijmení', 'T. Přijmení' );
		$this->assertLineBreak( 'Fr.&nbsp;Přijmení', 'Fr. Přijmení' );
		$this->assertLineBreak( 'M.&nbsp;Přijmení', 'M. Přijmení' );
	}

	public function testTitle() {
		$this->assertLineBreak( 'Ing.&nbsp;Přijmení', 'Ing. Přijmení' );
		$this->assertLineBreak( 'Bc.&nbsp;Přijmení', 'Bc. Přijmení' );
		$this->assertLineBreak( 'Mgr.&nbsp;Přijmení', 'Mgr. Přijmení' );
		$this->assertLineBreak( 'p.&nbsp;Přijmení', 'p. Přijmení' );
		$this->assertLineBreak( 'mjr.&nbsp;Přijmení', 'mjr. Přijmení' );
	}


}