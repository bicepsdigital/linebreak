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

}