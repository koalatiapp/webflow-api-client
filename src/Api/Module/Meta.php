<?php

declare(strict_types=1);

namespace Koalati\Webflow\Api\Module;

use Koalati\Webflow\Model\Meta\Authorization;
use Koalati\Webflow\Model\Meta\AuthorizedUser;

/**
 * Implementation of API calls for the "Meta" module (authorized user, authorization, etc.).
 *
 * @see https://developers.webflow.com/reference
 */
trait Meta
{
	public function getAuthorizedUser(): AuthorizedUser
	{
		$response = $this->request('GET', '/user');

		return AuthorizedUser::createFromArray($response['user']);
	}

	public function getAuthorizedInfo(): Authorization
	{
		$response = $this->request('GET', '/info');

		return Authorization::createFromArray($response);
	}
}
