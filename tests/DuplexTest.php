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
	}


}