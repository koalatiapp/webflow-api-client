<?php

declare(strict_types=1);

namespace Koalati\Webflow\Exception;

use Koalati\Webflow\Model\Membership\User;

class InvalidUserUpdateException extends \Exception
{
	public function __construct(User $user)
	{
		parent::__construct("Invalid user update for User {$user}.");
	}
}
