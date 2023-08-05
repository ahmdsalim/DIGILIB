<?php

use Ramsey\Uuid\Uuid;

if (!function_exists('generateToken')) {
	function generateToken()
	{
	    return md5(rand(1, 10) . microtime());
	}
}

if (!function_exists('generateUuid')) {
	function generateUuid()
	{
	    return Uuid::uuid4()->toString();
	}
}