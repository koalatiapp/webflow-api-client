<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model;

use Stringable;

abstract class AbstractWebflowModel implements WebflowModelInterface, Stringable
{
	public function __toString()
	{
		return $this->getId() ?: ('New ' . static::class);
	}
}
