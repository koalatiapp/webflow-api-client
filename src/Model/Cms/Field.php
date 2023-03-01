<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Cms;

use Koalati\Webflow\Model\AbstractWebflowModel;

/**
 * @see https://developers.webflow.com/docs/models#field
 */
class Field extends AbstractWebflowModel
{
	/**
	 * @param string $id				Unique identifier for the field
	 * @param string $name				Name given to the field
	 * @param string $slug				Slug of the field in the URL structure of your site for template pages
	 * @param string|null $helpText		The help text defined for the field (not documented in Webflow's API docs)
	 * @param mixed $default			Default value for this field (not documented in Webflow's API docs)
	 * @param boolean $editable			Determines if field is editable (some fields are automatically created and cannot be edited)
	 * @param boolean $required			Determines if field is required
	 * @param boolean|null $unique		Whether this value is unique within the collection or not (not documented in Webflow's API docs)
	 * @param FieldType $type			Type of field
	 * @param Validation $validation	An instance of the `Validation` object.
	 * @param string|null $innerType	Describes the type of a “Set” field Array element. (`ExtFileRef` or `ImageRef`) @TODO: define an enum for Field::innerType
	 */
	public function __construct(
		public readonly string $id,
		public readonly string $name,
		public readonly string $slug,
		public readonly ?string $helpText,
		public readonly mixed $default,
		public readonly bool $editable,
		public readonly bool $required,
		public readonly ?bool $unique,
		public readonly FieldType $type,
		public readonly Validation $validation,
		public readonly ?string $innerType,
	) {
	}

	public static function createFromArray(array $data): self
	{
		return new self(
			$data['id'],
			$data['name'],
			$data['slug'],
			$data['helpText'] ?? null,
			$data['default'] ?? null,
			$data['editable'],
			$data['required'],
			$data['unique'] ?? null,
			FieldType::fromString($data['type']),
			Validation::createFromArray($data['validations'] ?? null),
			$data['innerType'] ?? null,
		);
	}

	public function toArray(): array
	{
		$data = [
			'id' => $this->id,
			'name' => $this->name,
			'slug' => $this->slug,
			'editable' => $this->editable,
			'required' => $this->required,
			'type' => FieldType::toString($this->type),
		];

		$validationData = $this->validation->toArray();

		if (count($validationData) > 0) {
			$data['validations'] = $this->validation->toArray();
		}

		if ($this->helpText !== null) {
			$data['helpText'] = $this->helpText;
		}

		if ($this->default !== null) {
			$data['default'] = $this->default;
		}

		if ($this->unique !== null) {
			$data['unique'] = $this->unique;
		}

		if ($this->innerType !== null) {
			$data['innerType'] = $this->innerType;
		}

		return $data;
	}

	public function getId(): ?string
	{
		return $this->id;
	}
}
