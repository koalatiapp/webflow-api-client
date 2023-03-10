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

	/**
	 * @param array<string,mixed> $data
	 */
	public static function createFromArray(array $data): self
	{
		return new self(
			$data['url'],
			$data['fileId'],
			$data['alt'] ?? null,
		);
	}

	/**
	 * @return array<string,mixed>
	 */
	public function toArray(): array
	{
		return [
			'fileId' => $this->fileId,
			'url' => $this->url,
			'alt' => $this->altText,
		];
	}
}
