<?php
class MenuHelpers
{
	public static function StringReplace($str)
	{
		return str_replace('\'', '', $str);
	}
}