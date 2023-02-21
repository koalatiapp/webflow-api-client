<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Site;

use Koalati\Webflow\Model\AbstractWebflowModel;

/**
 * @see https://developers.webflow.com/docs/models#domain
 */
class Domain extends AbstractWebflowModel
{
	/**
	 * @param string $id	Unique identifier for domain
	 * @param string $name	The domain name
	 */
	public function __construct(
		public readonly string $id,
		public readonly string $name,
	) {
	}

	public static function createFromArray(array $data): self
	{
		return new self($data['_id'], $data['name']);
	}

	public function toArray(): array
	{
		return [
			'_id' => $this->id,
			'name' => $this->name,
		];
	}

	public function getId(): ?string
	{
		return $this->id;
	}
}
