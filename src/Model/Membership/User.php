<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Membership;

use DateTimeInterface;
use Koalati\Webflow\Model\AbstractWebflowModel;
use Koalati\Webflow\Util\Date;

/**
 * @see https://developers.webflow.com/docs/models#user
 */
class User extends AbstractWebflowModel
{
	public const SORT_BY_STATUS = 'Status';

	public const SORT_BY_EMAIL = 'Email';

	public const SORT_BY_CREATED_ON = 'CreatedOn';

	public const SORT_BY_UPDATED_ON = 'UpdatedOn';

	public const SORT_BY_LAST_LOGIN = 'LastLogin';

	public const STATUS_INVITED = 'invited';

	public const STATUS_UNVERIFIED = 'unverified';

	public const STATUS_VERIFIED = 'verified';

	/**
	 * @var array<string,mixed>
	 */
	private array $initialData;

	/**
	 * @param string $id						Unique identifier for the User
	 * @param DateTimeInterface $createdOn		The timestamp the user was created
	 * @param DateTimeInterface|null $updatedOn	The timestamp the user was updated
	 * @param DateTimeInterface|null $invitedOn	The timestamp the user was invited
	 * @param DateTimeInterface|null $lastLogin	The timestamp the user was logged in
	 * @param boolean $emailVerified			Shows whether the user has verified their email address
	 * @param string $status					The status of the user
	 * @param array<string,mixed> $data			An object containing the User's basic info and custom fields
	 */
	public function __construct(
		public readonly string $id,
		public readonly DateTimeInterface $createdOn,
		public readonly ?DateTimeInterface $updatedOn,
		public readonly ?DateTimeInterface $invitedOn,
		public readonly ?DateTimeInterface $lastLogin,
		public readonly bool $emailVerified,
		public readonly string $status,
		public array $data,
	) {
		$this->initialData = $data;
	}

	public static function createFromArray(array $data): self
	{
		if (array_key_exists('updatedOn', $data)) {
			$updatedOn = $data['updatedOn'] ? Date::parse($data['updatedOn']) : null;
		}

		if (array_key_exists('invitedOn', $data)) {
			$invitedOn = $data['invitedOn'] ? Date::parse($data['invitedOn']) : null;
		}

		if (array_key_exists('lastLogin', $data)) {
			$lastLogin = $data['lastLogin'] ? Date::parse($data['lastLogin']) : null;
		}

		return new self(
			$data['_id'],
			Date::parse($data['createdOn']),
			$updatedOn ?? null,
			$invitedOn ?? null,
			$lastLogin ?? null,
			$data['emailVerified'],
			$data['status'],
			$data['data'],
		);
	}

	public function toArray(): array
	{
		return [
			'_id' => $this->id,
			'createdOn' => Date::format($this->createdOn),
			'updatedOn' => $this->updatedOn ? Date::format($this->updatedOn) : null,
			'invitedOn' => $this->invitedOn ? Date::format($this->invitedOn) : null,
			'lastLogin' => $this->lastLogin ? Date::format($this->lastLogin) : null,
			'emailVerified' => $this->emailVerified,
			'status' => $this->status,
			'data' => $this->data,
		];
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function setData(string $key, mixed $value): self
	{
		$this->data[$key] = $value;

		return $this;
	}

	/**
	 * Returns the item values that have been updated since the user was
	 * initialized.
	 *
	 * @return array<string,mixed>
	 */
	public function getChangeset(): array
	{
		$changes = [];

		foreach ($this->data as $key => $value) {
			if (! isset($this->initialData[$key]) || $value !== $this->initialData[$key]) {
				$changes[$key] = $value;
			}
		}

		return $changes;
	}
}
