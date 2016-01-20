<?php

use Bmitch\Duplex;

class DuplexTest extends PHPUnit_Framework_TestCase
{
	/** @test */
	public function it_detects_an_exact_match()
	{
		$phrase01 = 'one two three four';
		$phrase02 = 'one two three four';
		$match = Duplex::make()->isExactMatch($phrase01, $phrase02);
		$this->assertTrue($match);

		$phrase01 = 'one two three four';
		$phrase02 = 'five six seven eight';
		$match = Duplex::make()->isExactMatch($phrase01, $phrase02);
		$this->assertFalse($match);
	}

	/** @test */
	public function it_detects_an_75_percent_match()
	{
		$phrase01 = 'one two three four';
		$phrase02 = 'one two four five';
		$match = Duplex::make()->matchPercent($phrase01, $phrase02);
		$this->assertEquals(75, $match);

		$phrase01 = 'one two three four five six seven eight';
		$phrase02 = 'three four five six seven eight';
		$match = Duplex::make()->matchPercent($phrase01, $phrase02);
		$this->assertEquals(75, $match);
	}

	/** @test */
	public function it_detects_an_50_percent_match()
	{
		$phrase01 = 'one two three four';
		$phrase02 = 'one two five six';
		$match = Duplex::make()->matchPercent($phrase01, $phrase02);
		$this->assertEquals(50, $match);

		$phrase01 = 'five six seven eight';
		$phrase02 = 'seven eight nine ten';
		$match = Duplex::make()->matchPercent($phrase01, $phrase02);
		$this->assertEquals(50, $match);
	}

	/** @test */
	public function it_is_case_insensitive()
	{
		$phrase01 = 'one two three four';
		$phrase02 = 'ONE TWo FOUr fivE';
		$match = Duplex::make()->matchPercent($phrase01, $phrase02);
		$this->assertEquals(75, $match);

		$phrase01 = 'five six seven eight';
		$phrase02 = 'SEVEN EIGHt NIne teN';
		$match = Duplex::make()->matchPercent($phrase01, $phrase02);
		$this->assertEquals(50, $match);
	}

	/** @test */
	public function it_ignores_common_words()
	{
		$phrase01 = 'The one a two and three of four';
		$phrase02 = 'ONE TWo FOUr fivE';
		$match = Duplex::make()->matchPercent($phrase01, $phrase02);
		$this->assertEquals(75, $match);

		$phrase01 = 'Of five and six a seven the eight';
		$phrase02 = 'SEVEN EIGHt NIne teN';
		$match = Duplex::make()->matchPercent($phrase01, $phrase02);
		$this->assertEquals(50, $match);
	}

}