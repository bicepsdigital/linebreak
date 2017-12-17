<?php
/**
 * Created by IntelliJ IDEA.
 * User: lysek
 * Date: 13.01.2017
 * Time: 12:38
 */

namespace Tests;

use BicepsDigital\LineBreak\Abbreviations;
use BicepsDigital\Test\TestCase;

class AbbreviationsTest extends TestCase {

	protected function setUp() {
		parent::setUp();
		Abbreviations::resetAbbreviations();
	}

	protected $defaultValues = array(
		'a. s.'     => 'a.&nbsp;s.',
		's. r. o.'  => 's.&nbsp;r.&nbsp;o.',
		'mn. č.'    => 'mn.&nbsp;č.',
		'př. n. l.' => 'př.&nbsp;n.&nbsp;l.'
	);

	public function testDefaultAbbreviations() {
		$this->assertArrayEql( $this->defaultValues, Abbreviations::getAbbreviations() );
	}

	public function testAddAbbreviationsOne() {
		$newAbbreviation = 'a. e. i. o. u.';
		Abbreviations::addAbbreviation( $newAbbreviation );
		$this->assertArrayEql( array_merge( $this->defaultValues, array( $newAbbreviation ) ), Abbreviations::getAbbreviations() );
	}

	public function testAddAbbreviationsMultiple() {
		$newAbbreviation = array( 'a. e. i. o. u.', 'b. f. l. m.' );
		Abbreviations::addAbbreviation( $newAbbreviation );
		$this->assertArrayEql( array_merge( $this->defaultValues, $newAbbreviation ), Abbreviations::getAbbreviations() );
	}

	public function testParseAbbreviationText() {
		foreach ( $this->defaultValues as $before => $after ) {
			$this->assertEquals( $after, Abbreviations::parse( $before ) );
		}
	}

}