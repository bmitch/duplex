<?php

namespace Bmitch;

class Duplex
{

	public static function make()
	{
		return new static;
	}

	public static function isExactMatch($phrase01, $phrase02)
	{
		return $phrase01 === $phrase02;
	}
	
	public static function matchPercent($phrase01, $phrase02)
	{
		$phrase01Array = explode(' ', $phrase01);
		$phrase02Array = explode(' ', $phrase02);
		$diff =  array_diff($phrase01Array, $phrase02Array);

		$percentage = count($diff)/count($phrase01Array);

		return (1 - $percentage) * 100;
	}
}