<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Meta;

use Koalati\Webflow\Model\AbstractWebflowModel;

/**
 * @see https://developers.webflow.com/docs/models#application
 */
class Application extends AbstractWebflowModel
{
	/**
	 * @param string $id			The unique id of the application
	 * @param string $description	The description of the application
	 * @param string $homepage		The URL of the application's homepage
	 * @param string $name			The name of the application
	 * @param string $owner			The ID of the application's owner
	 * @param string $ownerType		The type of the application's owner
	 */
	public function __construct(
		public readonly string $id,
		public readonly string $description,
		public readonly string $homepage,
		public readonly string $name,
		public readonly string $owner,
		public readonly string $ownerType,
	) {
	}

	public static function createFromArray(array $data): self
	{
		return new self($data['_id'], $data['description'], $data['homepage'], $data['name'], $data['owner'], $data['ownerType']);
	}

	public function toArray(): array
	{
		return [
			'_id' => $this->id,
			'description' => $this->description,
			'homepage' => $this->homepage,
			'name' => $this->name,
			'owner' => $this->owner,
			'ownerType' => $this->ownerType,
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
