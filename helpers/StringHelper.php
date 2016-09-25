<?php

namespace app\helpers;

class StringHelper 
{
	/**
	 * @param string $string
	 * @return boolean
	 */
	public static function isWord($string) 
	{		

		if (count(self::stringToArray($string)) > 1) {
			return false;
		}
		return true;
	}

	/**
	 * @param string $string
	 * @return array
	 */
	public static function stringToArray($string)
	{
		preg_match_all('/[\w]+/u', $string, $text);
		return $text[0];
	}
}