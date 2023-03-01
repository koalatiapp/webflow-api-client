<?php

declare(strict_types=1);

namespace Koalati\Webflow\Exception;

use Throwable;

class WebflowClientException extends \Exception
{
	public function __construct(string $message, Throwable $originalException)
	{
		parent::__construct($message, $originalException->getCode(), $originalException);
	}
}
