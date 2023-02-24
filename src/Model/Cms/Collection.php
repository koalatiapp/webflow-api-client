<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Cms;

use DateTimeInterface;
use Koalati\Webflow\Exception\FieldNotFoundException;
use Koalati\Webflow\Exception\FieldsNotLoadedException;
use Koalati\Webflow\Model\AbstractWebflowModel;
use Koalati\Webflow\Util\Date;

/**
 * @see https://developers.webflow.com/docs/models#collection
 */
class Collection extends AbstractWebflowModel
{
	/**
	 * Stores references to a field by its slug, ID and name.
	 *
	 * @var array<string,Field>
	 */
	private array $fieldsIndex = [];

	/**
	 * @param string $id							Unique identifier for collection
	 * @param DateTimeInterface $createdOn			The date the collection was create
	 * @param string $name							Name given to Collection
	 * @param string $singularName					The name of one Item in Collection (e.g. “post” if the Collection is called “Posts”)
	 * @param string $slug							Slug of Collection in Site URL structure
	 * @param DateTimeInterface|null $lastUpdated	The date the collection was last updated
	 * @param array<int,Field>|null $fields			The list of fields in the collection
	 */
	public function __construct(
		public readonly string $id,
		public readonly DateTimeInterface $createdOn,
		public readonly string $name,
		public readonly string $singularName,
		public readonly string $slug,
		public readonly ?DateTimeInterface $lastUpdated,
		public readonly ?array $fields,
	) {
		if ($fields !== null) {
			foreach ($fields as $field) {
				$fieldsIndex[$field->slug] = $this->fields[$field->slug];
				$fieldsIndex[$field->id] = $this->fields[$field->slug];
				$fieldsIndex[$field->name] = $this->fields[$field->slug];
			}
		}
	}

	public static function createFromArray(array $data): self
	{
		$fields = null;

		if (isset($data['fields'])) {
			$fields = [];

			foreach ($data['fields'] as $fieldData) {
				$fields[] = Field::createFromArray($fieldData);;
			}
		}

		return new self(
			$data['_id'],
			Date::parse($data['createdOn']),
			$data['name'],
			$data['singularName'],
			$data['slug'],
			$data['lastUpdated'] ? Date::parse($data['lastUpdated']) : null,
			$fields,
		);
	}

	public function toArray(): array
	{
		return [
			'_id' => $this->id,
			'createdOn' => Date::format($this->createdOn),
			'name' => $this->name,
			'singularName' => $this->singularName,
			'slug' => $this->slug,
			'lastUpdated' => $this->lastUpdated ? Date::format($this->lastUpdated) : null,
			'fields' => $this->fields !== null ? array_map(fn (Field $field) => $field->toArray(), $this->fields) : null,
		];
	}

	public function getId(): ?string
	{
		return $this->id;
	}

	/**
	 * Returns a collection's field by its slug, ID or name.
	 * 
	 * @param string $idenfitier 	Field slug, ID or name.
	 * 
	 * @throws FieldNotFoundException
	 * @throws FieldsNotLoadedException
	 */
	public function getField(string $idenfitier): Field
	{
		if ($this->fields === null) {
			throw new FieldsNotLoadedException($idenfitier, $this->getId());
		}

		if (isset($this->fieldsIndex[$idenfitier])) {
			return $this->fieldsIndex[$idenfitier];
		}

		throw new FieldNotFoundException($idenfitier, $this->getId());
	}
}
