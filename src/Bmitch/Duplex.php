<?php

namespace Bmitch;

class Duplex
{
	protected $commonWords = [
		'the',
		'of',
		'a',
		'and'
	];

	public static function make()
	{
		return new static;
	}

	public static function isExactMatch($phrase01, $phrase02)
	{
		return $phrase01 === $phrase02;
	}
	
	public function matchPercent($phrase01, $phrase02)
	{
		$phrase01Array = explode(' ', $phrase01);
		$phrase02Array = explode(' ', $phrase02);

		$phrase01Array = $this->cleanse($phrase01Array);
		$phrase02Array = $this->cleanse($phrase02Array);

		$diff = array_diff($phrase01Array, $phrase02Array);

		$percentage = count($diff)/count($phrase01Array);

		return (1 - $percentage) * 100;
	}

	private function cleanse(array $phraseArray)
	{
		foreach($phraseArray as &$word) {
			$word = strtolower($word);
		}

		$phraseArray = $this->removeCommonWords($phraseArray);

		return $phraseArray;
	}

	private function removeCommonWords(array $phraseArray)
	{
		foreach ($phraseArray as $index => $word) {
			if (in_array($word, $this->commonWords)) {
				unset($phraseArray[$index]);
			}
		}

		return $phraseArray;
	}
}