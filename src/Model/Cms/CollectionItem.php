<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Cms;

use DateTimeInterface;
use Koalati\Webflow\Exception\FieldNotFoundException;
use Koalati\Webflow\Model\AbstractWebflowModel;
use Koalati\Webflow\Util\Date;

/**
 * @see https://developers.webflow.com/docs/models#collectionitem
 */
class CollectionItem extends AbstractWebflowModel
{
	/**
	 * Date on which the item was created
	 */
	public readonly ?DateTimeInterface $createdOn;

	/**
	 * ID of the user who created the item
	 */
	public readonly ?string $createdBy;

	/**
	 * Date on which the item was last updated
	 */
	public readonly ?DateTimeInterface $updatedOn;

	/**
	 * ID of the user who last updated the item
	 */
	public readonly ?string $updatedBy;

	/**
	 * Date on which the item was last published
	 */
	public readonly ?DateTimeInterface $publishedOn;

	/**
	 * ID of the user who last published the item
	 */
	public readonly ?string $publishedBy;

	/**
	 * This contains the initial values of the item.
	 * It is used to create a changeset when updating the item.
	 *
	 * @var array<string,mixed>
	 */
	private readonly array $initialNonMetadataFields;

	/**
	 * @param string $id					Unique identifier for the Item
	 * @param string $name					Name given to the Item
	 * @param string $slug					URL structure of the Item in your site. Note: Updates to an item slug will break all links referencing the old slug.
	 * @param string $collectionId			Unique identifier for the Collection the Item belongs within
	 * @param boolean $archived				Boolean determining if the Item is set to archived
	 * @param boolean $draft				Boolean determining if the Item is set to draft
	 * @param array<string,mixed> $fields	Array of values for the items fields
	 */
	public function __construct(
		public string $name,
		public string $slug,
		public bool $archived,
		public bool $draft,
		public array $fields,
		public readonly ?string $id = null,
		public readonly ?string $collectionId = null,
	) {
		$this->createdOn = ! empty($fields['created-on']) ? Date::parse($fields['created-on']) : null;
		$this->createdBy = $fields['created-by'] ?? null;
		$this->updatedOn = ! empty($fields['updated-on']) ? Date::parse($fields['updated-on']) : null;
		$this->updatedBy = $fields['updated-by'] ?? null;
		$this->publishedOn = ! empty($fields['published-on']) ? Date::parse($fields['published-on']) : null;
		$this->publishedBy = $fields['published-by'] ?? null;

		unset(
			$this->fields['created-on'],
			$this->fields['created-by'],
			$this->fields['updated-on'],
			$this->fields['updated-by'],
			$this->fields['published-on'],
			$this->fields['published-by']
		);

		$this->initialNonMetadataFields = $this->getNonMetadataFields();
	}

	/**
	 * @param array<string,mixed> $data
	 */
	public static function createFromArray(array $data): self
	{
		$fields = $data;
		unset($fields['_id'], $fields['name'], $fields['slug'], $fields['_cid'], $fields['_archived'], $fields['_draft']);

		return new self(
			$data['name'],
			$data['slug'],
			$data['_archived'] ?? false,
			$data['_draft'] ?? true,
			$fields,
			$data['_id'] ?? null,
			$data['_cid'] ?? null,
		);
	}

	public function toArray(): array
	{
		$data = [
			'_id' => $this->id,
			'name' => $this->name,
			'slug' => $this->slug,
			'_cid' => $this->collectionId,
			'_archived' => $this->archived,
			'_draft' => $this->draft,
			'created-on' => $this->createdOn ? Date::format($this->createdOn) : null,
			'created-by' => $this->createdBy,
			'updated-on' => $this->updatedOn ? Date::format($this->updatedOn) : null,
			'updated-by' => $this->updatedBy,
			'published-on' => $this->publishedOn ? Date::format($this->publishedOn) : null,
			'published-by' => $this->publishedBy,
		];

		foreach ($this->fields as $slug => $value) {
			$data[$slug] = $value;
		}

		return $data;
	}

	public function getId(): ?string
	{
		return $this->id;
	}

	/**
	 * Returns an item's field value.
	 *
	 * @throws FieldNotFoundException
	 */
	public function getFieldValue(string|Field $slugOrField): mixed
	{
		$slug = is_string($slugOrField) ? $slugOrField : $slugOrField->slug;

		return match ($slug) {
			'created-on' => $this->createdOn,
			'created-by' => $this->createdBy,
			'updated-on' => $this->updatedOn,
			'updated-by' => $this->updatedBy,
			'published-on' => $this->publishedOn,
			'published-by' => $this->publishedBy,
			'name' => $this->name,
			'slug' => $this->slug,
			default => $this->fields[$slug] ?? throw new FieldNotFoundException($slug, $this->collectionId ?: 'no collection ID'),
		};
	}

	public function setFieldValue(string|Field $slugOrField, mixed $value): self
	{
		$slug = is_string($slugOrField) ? $slugOrField : $slugOrField->slug;

		if ($slug === 'name') {
			$this->name = $value;
		} elseif ($slug === 'slug') {
			$this->slug = $value;
		} else {
			$this->fields[$slug] = $value;
		}

		return $this;
	}

	/**
	 * Returns the values of all fields that are not metadata.
	 * This excludes all fields like item ID, "created on", "created by", etc.
	 *
	 * @return array<string,mixed>
	 */
	public function getNonMetadataFields(): array
	{
		$values = $this->fields;
		$values['name'] = $this->name;
		$values['slug'] = $this->slug;
		$values['_archived'] = $this->archived;
		$values['_draft'] = $this->draft;

		return $values;
	}

	/**
	 * Returns the item values that have been updated since the item was first
	 * created.
	 *
	 * @return array<string,mixed>
	 */
	public function getChangeset(): array
	{
		$changes = [];

		foreach ($this->getNonMetadataFields() as $key => $value) {
			if (!isset($this->initialNonMetadataFields[$key]) || $value !== $this->initialNonMetadataFields[$key]) {
				$changes[$key] = $value;
			}
		}

		return $changes;
	}
}
