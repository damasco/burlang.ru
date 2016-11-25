<?php

namespace app\helpers;

class StringHelper extends \yii\helpers\StringHelper
{
	/**
	 * @param string $string
	 * @return boolean
	 */
	public static function isWord($string) 
	{
		return count(self::stringToArray($string)) > 1 ? false : true;
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