<?php

declare(strict_types=1);

namespace Koalati\Webflow\Util;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;

/**
 * Utility class that parses and formats dates in Webflow's date format
 * (`2016-10-03T23:12:00.755Z`, or: `Y-m-d\\TH:i:s.vp`)
 */
final class Date
{
	private function __construct()
	{
	}

	public static function parse(string $date): DateTimeImmutable
	{
		$datetime = DateTimeImmutable::createFromFormat('Y-m-d\\TH:i:s.vp', $date);

		if ($datetime === false) {
			throw new Exception("Invalid date provided: {$date}");
		}

		return $datetime;
	}

	public static function format(DateTimeInterface $date): string
	{
		return $date->format('Y-m-d\\TH:i:s.vp');
	}
}
