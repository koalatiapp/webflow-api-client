<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Site;

use DateTimeInterface;
use Koalati\Webflow\Model\AbstractWebflowModel;
use Koalati\Webflow\Util\Date;

/**
 * @see https://developers.webflow.com/docs/models#site
 */
class Site extends AbstractWebflowModel
{
	/**
	 * @param string $id						Unique identifier for site
	 * @param DateTimeInterface $createdOn		Date the site was created
	 * @param string $name						Name given to site
	 * @param string $shortName					Slugified version of name
	 * @param ?DateTimeInterface $lastPublished	Date site was last published
	 * @param string $previewUrl				URL of a generated image for the given site
	 * @param string $timezone					Site timezone set under Site Settings
	 * @param string $database					
	 */
	public function __construct(
		public readonly string $id,
		public readonly DateTimeInterface $createdOn,
		public readonly string $name,
		public readonly string $shortName,
		public readonly ?DateTimeInterface $lastPublished,
		public readonly string $previewUrl,
		public readonly string $timezone,
		public readonly string $database,
	) {
	}

	public static function createFromArray(array $data): self
	{
		return new self(
			$data['_id'],
			Date::parse($data['createdOn']),
			$data['name'],
			$data['shortName'],
			$data['lastPublished'] ? Date::parse($data['lastPublished']) : null,
			$data['previewUrl'],
			$data['timezone'],
			$data['database'],
		);
	}

	public function toArray(): array
	{
		return [
			'_id' => $this->id,
			'createdOn' => Date::format($this->createdOn),
			'name' => $this->name,
			'shortName' => $this->shortName,
			'lastPublished' => $this->lastPublished ? Date::format($this->lastPublished) : null,
			'previewUrl' => $this->previewUrl,
			'timezone' => $this->timezone,
			'database' => $this->database,
		];
	}

	public function getId(): string
	{
		return $this->id;
	}
}
