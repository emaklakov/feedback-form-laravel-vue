<?php

namespace App\Helpers;


class HelperChecks
{

	public static function isPhoneNumber($value)
	{
		if (stripos($value, '+7') !== false || stripos($value, '8') !== false) {
			return true;
		}

		return false;
	}
}
