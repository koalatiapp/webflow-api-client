<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Generic;

/**
 * @see https://developers.webflow.com/docs/models
 */
class Image
{
	public function __construct(
		public string $url,
		public ?string $fileId = null,
		public ?string $altText = null,
	) {
	}

	public static function createFromUrl(string $url): self
	{
		return new self($url);
	}

	public static function createFromArray(array $data): self
	{
		return new self(
			$data['unit'],
			$data['value'],
		);
	}

	public function toArray(): array
	{
		return [
			'fileId' => $this->fileId,
			'url' => $this->url,
			'alt' => $this->altText,
		];
	}
}
