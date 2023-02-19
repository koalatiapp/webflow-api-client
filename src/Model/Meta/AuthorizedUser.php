<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Meta;

use Koalati\Webflow\Model\WebflowModelInterface;

/**
 * @see https://developers.webflow.com/docs/models#authorizeduser
 */
class AuthorizedUser implements WebflowModelInterface
{
	/**
	 * @param string $id		The unique id of the user
	 * @param string $email		The user's email address
	 * @param string $firstName	The user's first name
	 * @param string $lastName	The user's last name
	 */
	public function __construct(
		public readonly string $id,
		public readonly string $email,
		public readonly string $firstName,
		public readonly string $lastName,
	) {
	}

	public static function createFromArray(array $data): self
	{
		return new self($data['_id'], $data['email'], $data['firstName'], $data['lastName']);
	}

	public function toArray(): array
	{
		return [
			'_id' => $this->id,
			'email' => $this->email,
			'firstName' => $this->firstName,
			'lastName' => $this->lastName,
		];
	}

	/**
	 * @return string ID of the Webflow resource
	 */
	public function getId(): string
	{
		return $this->id;
	}
}
