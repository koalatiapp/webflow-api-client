<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Ecommerce;

use DateTimeInterface;
use Koalati\Webflow\Model\AbstractWebflowModel;
use Koalati\Webflow\Util\Date;

/**
 * @see https://developers.webflow.com/docs/models#product
 */
class Product extends AbstractWebflowModel
{
	private const NON_FIELD_KEYS = ['updated-on', 'updated-by', 'created-on', 'created-by', 'published-on', 'published-by', '_cid', '_id', 'product', 'name', 'slug', 'price', 'sku', 'main-image', 'more-images', 'download-files', 'compare-at-price', 'ec-sku-billing-method', 'ec-sku-subscription-plan', 'weight', 'width', 'height', 'length', 'sku-values', '_archived', '_draft'];

	public ?string $id = null;

	/**
	 * Date on which the sku was created
	 */
	public ?DateTimeInterface $createdOn = null;

	/**
	 * ID of the user who created the sku
	 */
	public ?string $createdBy = null;

	/**
	 * Date on which the sku was last updated
	 */
	public ?DateTimeInterface $updatedOn = null;

	/**
	 * ID of the user who last updated the sku
	 */
	public ?string $updatedBy = null;

	/**
	 * Date on which the sku was last published
	 */
	public ?DateTimeInterface $publishedOn = null;

	/**
	 * ID of the user who last published the sku
	 */
	public ?string $publishedBy = null;

	private ?string $collectionId = null;

	/**
	 * This contains the initial values of the sku.
	 * It is used to create a changeset when updating the sku.
	 *
	 * @var array<string,mixed>
	 */
	private readonly array $initialData;

	/**
	 * @param string $name								Name of the product.
	 * @param string $slug								Slug of the product.
	 * @param string $taxCategory						Tax category of the product (use `TaxType` constants)
	 * @param ?string $description						Description of the product.
	 * @param ?string $defaultSku						The ID of the default SKU for the product.
	 * @param array<string,mixed> $skuProperties		Custom properties defined in the product SKUs.
	 * @param array<int,string> $categories				Category IDs that the product is assigned to.
	 * @param array<string,mixed> $fields				Custom fields for the product.
	 * @param boolean $shippable						Whether the product can be shipped.
	 * @param boolean $archived							Whether the product is archived or not.
	 * @param boolean $draft							Whether the product is a draft or not.
	 * @param ?string $productType						The ID of the type of product. You should not provide this manually: this is an internal Webflow concern.
	 *
	 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
	 */
	public function __construct(
		public string $name,
		public string $slug,
		public string $taxCategory,
		public ?string $description = null,
		public ?string $defaultSku = null,
		public array $skuProperties = [],
		public array $categories = [],
		public array $fields = [],
		public bool $shippable = false,
		public bool $archived = false,
		public bool $draft = false,
		public ?string $productType = null,
	) {
		$this->initialData = $this->getNonMetadataFields();
	}

	/**
	 * @param array<string,mixed> $data
	 *
	 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
	 * @SuppressWarnings(PHPMD.NPathComplexity)
	 */
	public static function createFromArray(array $data): self
	{
		$fields = [];

		foreach ($data as $key => $value) {
			if (in_array($key, self::NON_FIELD_KEYS, true)) {
				continue;
			}

			$fields[$key] = $value;
		}

		$sku = new self(
			name: $data['name'],
			slug: $data['slug'],
			taxCategory: $data['tax-category'],
			description: $data['description'] ?? null,
			fields: $fields,
			skuProperties: $data['sku-properties'] ?? [],
			shippable: $data['shippable'] ?? false,
			archived: $data['_archived'] ?? false,
			draft: $data['_draft'] ?? false,
		);
		$sku->id = $data['_id'] ?? null;
		$sku->collectionId = $data['_cid'] ?? null;
		$sku->createdOn = ! empty($data['created-on']) ? Date::parse($data['created-on']) : null;
		$sku->createdBy = $data['created-by'] ?? null;
		$sku->updatedOn = ! empty($data['updated-on']) ? Date::parse($data['updated-on']) : null;
		$sku->updatedBy = $data['updated-by'] ?? null;
		$sku->publishedOn = ! empty($data['published-on']) ? Date::parse($data['published-on']) : null;
		$sku->publishedBy = $data['published-by'] ?? null;

		return $sku;
	}

	/**
	 * @return array<string,mixed>
	 */
	public function toArray(): array
	{
		$data = [
			'_archived' => $this->archived,
			'_draft' => $this->draft,
			'shippable' => $this->shippable,
			'sku-properties' => $this->skuProperties,
			'name' => $this->name,
			'slug' => $this->slug,
			'description' => $this->description,
			'categories' => $this->categories,
			'default-sku' => $this->defaultSku,
			'updated-on' => $this->updatedOn ? Date::format($this->updatedOn) : null,
			'updated-by' => $this->updatedBy,
			'created-on' => $this->createdOn ? Date::format($this->createdOn) : null,
			'created-by' => $this->createdBy,
			'published-on' => $this->publishedOn ? Date::format($this->publishedOn) : null,
			'published-by' => $this->publishedBy,
			'_cid' => $this->collectionId,
			'_id' => $this->id,
		];

		foreach ($this->fields as $key => $value) {
			$data[$key] = $value;
		}

		return $data;
	}

	public function getId(): ?string
	{
		return $this->id;
	}

	public function setField(string $key, mixed $value): self
	{
		$this->fields[$key] = $value;

		return $this;
	}

	public function getField(string $key, mixed $default = null): mixed
	{
		return $this->fields[$key] ?? $default;
	}

	/**
	 * Returns the values that have been updated since the SKU was initialized.
	 *
	 * @return array<string,mixed>
	 */
	public function getChangeset(): array
	{
		$changes = [];

		foreach ($this->getNonMetadataFields() as $key => $value) {
			if (! isset($this->initialData[$key]) || $value !== $this->initialData[$key]) {
				$changes[$key] = $value;
			}
		}

		return $changes;
	}

	/**
	 * Returns all values that aren't metadata or IDs (all data that users can
	 * and might want to change).
	 *
	 * @return array<string,mixed>
	 */
	protected function getNonMetadataFields(): array
	{
		$nonMetadataFields = [];

		foreach ($this->toArray() as $key => $value) {
			// Ignore metadata fields
			if (in_array($key, ['updated-on', 'updated-by', 'created-on', 'created-by', 'published-on', 'published-by', '_cid', '_id'], true)) {
				continue;
			}

			$nonMetadataFields[$key] = $value;
		}

		return $nonMetadataFields;
	}
}
