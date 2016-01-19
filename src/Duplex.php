<?php

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
	

}