<?php

class DuplexTest extends PHPUnit_Framework_TestCase
{
	
	/** @test */
	public function it_detects_an_exact_match()
	{
		$phrase01 = 'one two three four';
		$phrase02 = 'one two three four';
		$match = Duplex::make()->isExactMatch($phrase01, $phrase02);

		$this->assertTrue($match);
	}
}