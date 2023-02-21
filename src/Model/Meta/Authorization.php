<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Meta;

use DateTimeInterface;
use Koalati\Webflow\Model\AbstractWebflowModel;
use Koalati\Webflow\Util\Date;

/**
 * @see https://developers.webflow.com/reference/get-authorized-info
 */
class Authorization extends AbstractWebflowModel
{
	/**
	 * @param string            $id             The unique id of the authorization
	 * @param DateTimeInterface $createdOn      The date the authorization was created
	 * @param string            $grantType      The grant type of the authorization
	 * @param DateTimeInterface $lastUsed       The date the authorization was last used
	 * @param array<int,string> $sites          The sites authorized
	 * @param array<int,string> $orgs           The organizations authorized
	 * @param array<int,string> $workspaces     The workspaces authorized
	 * @param array<int,string> $users          The users authorized
	 * @param integer           $rateLimit      The default rate limit for the authorization
	 * @param string            $status         The status of the authorization
	 * @param Application       $application    An instance of the Application object.
	 */
	public function __construct(
		public readonly string $id,
		public readonly DateTimeInterface $createdOn,
		public readonly string $grantType,
		public readonly DateTimeInterface $lastUsed,
		public readonly array $sites,
		public readonly array $orgs,
		public readonly array $workspaces,
		public readonly array $users,
		public readonly int $rateLimit,
		public readonly string $status,
		public readonly Application $application,
	) {
	}

	public static function createFromArray(array $data): self
	{
		return new self(
			$data['_id'],
			Date::parse($data['createdOn']),
			$data['grantType'],
			Date::parse($data['lastUsed']),
			$data['sites'],
			$data['orgs'],
			$data['workspaces'],
			$data['users'],
			$data['rateLimit'],
			$data['status'],
			Application::createFromArray($data['application']),
		);
	}

	public function toArray(): array
	{
		return [
			'_id' => $this->id,
			'createdOn' => Date::format($this->createdOn),
			'grantType' => $this->grantType,
			'lastUsed' => Date::format($this->lastUsed),
			'sites' => $this->sites,
			'orgs' => $this->orgs,
			'workspaces' => $this->workspaces,
			'users' => $this->users,
			'rateLimit' => $this->rateLimit,
			'status' => $this->status,
			'application' => $this->application->toArray(),
		];
	}

	public function getId(): string
	{
		return $this->id;
	}
}
