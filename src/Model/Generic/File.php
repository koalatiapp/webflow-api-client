<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Generic;

/**
 * @see https://developers.webflow.com/docs/models
 */
class File
{
	public function __construct(
		public string $url,
		public string $name,
		public ?string $id = null,
	) {
	}

	public static function createFromArray(array $data): self
	{
		return new self(
			$data['url'],
			$data['name'],
			$data['id'],
		);
	}

	public function toArray(): array
	{
		return [
			'name' => $this->name,
			'url' => $this->url,
			'id' => $this->id,
		];
	}
}
