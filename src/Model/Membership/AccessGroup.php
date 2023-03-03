<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Membership;

use DateTimeInterface;
use Koalati\Webflow\Model\AbstractWebflowModel;
use Koalati\Webflow\Util\Date;

/**
 * @see https://developers.webflow.com/docs/models#accessgroup
 */
class AccessGroup extends AbstractWebflowModel
{
	/**
	 * @param string $id					Unique identifier for the Access Group
	 * @param string $name					Name of the the Access Group
	 * @param string $shortId				Shortened unique identifier based on name, optimized for its use in the user’s JWT
	 * @param string $slug					Shortened unique identifier based on name, optimized for human readability and public API use
	 * @param DateTimeInterface $createdOn	The date the Access Group was created
	 */
	public function __construct(
		public readonly string $id,
		public readonly string $name,
		public readonly string $shortId,
		public readonly string $slug,
		public readonly DateTimeInterface $createdOn,
	) {
	}

	public static function createFromArray(array $data): self
	{
		return new self(
			$data['_id'],
			$data['name'],
			$data['shortId'],
			$data['slug'],
			Date::parse($data['createdOn']),
		);
	}

	public function toArray(): array
	{
		return [
			'_id' => $this->id,
			'name' => $this->name,
			'shortId' => $this->shortId,
			'slug' => $this->slug,
			'createdOn' => Date::format($this->createdOn),
		];
	}

	public function getId(): string
	{
		return $this->id;
	}
}
