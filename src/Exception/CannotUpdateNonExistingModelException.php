<?php

declare(strict_types=1);

namespace Koalati\Webflow\Exception;

use Koalati\Webflow\Model\WebflowModelInterface;

class CannotUpdateNonExistingModelException extends \Exception
{
	public function __construct(WebflowModelInterface $model)
	{
		parent::__construct('Attempted to update a model that does not have an ID (meaning it has not been created yet): ' . $model::class);
	}
}
