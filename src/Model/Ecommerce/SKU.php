<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Ecommerce;

use DateTimeInterface;
use InvalidArgumentException;
use Koalati\Webflow\Model\AbstractWebflowModel;
use Koalati\Webflow\Model\Generic\File;
use Koalati\Webflow\Model\Generic\Image;
use Koalati\Webflow\Util\Date;

/**
 * @see https://developers.webflow.com/docs/models#sku
 */
class SKU extends AbstractWebflowModel
{
	public const BILLING_METHOD_ONE_TIME = 'one-time';

	public const BILLING_METHOD_SUBSCRIPTION = 'subscription';

	private const NON_FIELD_KEYS = ['updated-on', 'updated-by', 'created-on', 'created-by', 'published-on', 'published-by', '_cid', '_id', 'product', 'name', 'slug', 'price', 'sku', 'main-image', 'more-images', 'download-files', 'compare-at-price', 'ec-sku-billing-method', 'ec-sku-subscription-plan', 'weight', 'width', 'height', 'length', 'sku-values', '_archived', '_draft'];

	public ?string $id = null;

	public readonly string $productId;

	/**
	 * Date on which the sku was created
	 */
	public ?DateTimeInterface $createdOn;

	/**
	 * ID of the user who created the sku
	 */
	public ?string $createdBy;

	/**
	 * Date on which the sku was last updated
	 */
	public ?DateTimeInterface $updatedOn;

	/**
	 * ID of the user who last updated the sku
	 */
	public ?string $updatedBy;

	/**
	 * Date on which the sku was last published
	 */
	public ?DateTimeInterface $publishedOn;

	/**
	 * ID of the user who last published the sku
	 */
	public ?string $publishedBy;

	private ?string $collectionId = null;

	/**
	 * This contains the initial values of the sku.
	 * It is used to create a changeset when updating the sku.
	 *
	 * @var array<string,mixed>
	 */
	private readonly array $initialData;

	/**
	 * @param Product|string $productId					Product (or product ID) this SKU is related to.
	 * @param string $name								Name of the product.
	 * @param string $slug								Slug of the product.
	 * @param Price $price								Price of the product.
	 * @param string|null $sku							The SKU code for the product.
	 * @param ?Image $mainImage							Main image of the product.
	 * @param array<int,Image> $moreImages				Additionnal images for the product.
	 * @param array<int,File> $downloadFiles			Files that can be downloaded after purchasing the product.
	 * @param Price|null $compareAtPrice				The price at which the product item or a comparable product may be sold on an everyday basis.
	 * @param string $billingMethod						Billing method (one time or subscription - use `SKU::BILLING_METHOD_` constants)
	 * @param SubscriptionPlan|null $subscriptionPlan	Subscription plan billing interval for the product.
	 * @param null|integer|float|null $weight			Weight of the product.
	 * @param null|integer|float|null $width			Width of the product.
	 * @param null|integer|float|null $height			Height of the product.
	 * @param null|integer|float|null $length			Length of the product.
	 * @param array<string,mixed> $fields				Custom fields for the product.
	 * @param array<string,string> $skuValues			Values for each option of the product (option value IDs, indexed by option ID).
	 * @param boolean $archived							Whether the product is archived or not.
	 * @param boolean $draft							Whether the product is a draft or not.
	 *
	 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
	 */
	public function __construct(
		Product|string $productId,
		public string $name,
		public string $slug,
		public Price $price,
		public ?string $sku = null,
		public ?Image $mainImage = null,
		public array $moreImages = [],
		public array $downloadFiles = [],
		public ?Price $compareAtPrice = null,
		public string $billingMethod = 'one-time',
		public ?SubscriptionPlan $subscriptionPlan = null,
		public null|int|float $weight = null,
		public null|int|float $width = null,
		public null|int|float $height = null,
		public null|int|float $length = null,
		public array $fields = [],
		public array $skuValues = [],
		public bool $archived = false,
		public bool $draft = false,
	) {
		$productId = is_string($productId) ? $productId : $productId->getId();

		if (! $productId) {
			throw new InvalidArgumentException('SKU $productId cannot be null.');
		}

		$this->productId = $productId;
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
			productId: $data['product'],
			name: $data['name'] ?? null,
			slug: $data['slug'] ?? null,
			price: Price::createFromArray($data['price']),
			sku: $data['sku'] ?? null,
			mainImage: $data['main-image'] ? Image::createFromArray($data['main-image']) : null,
			moreImages: isset($data['more-images']) ? array_map(fn ($imageData) => Image::createFromArray($imageData), $data['more-images']) : [],
			downloadFiles: isset($data['download-files']) ? array_map(fn ($fileData) => File::createFromArray($fileData), $data['download-files']) : [],
			compareAtPrice: isset($data['compare-at-price']) ? Price::createFromArray($data['compare-at-price']) : null,
			billingMethod: $data['ec-sku-billing-method'] ?? self::BILLING_METHOD_ONE_TIME,
			subscriptionPlan: isset($data['ec-sku-subscription-plan']) ? SubscriptionPlan::createFromArray($data['ec-sku-subscription-plan']) : null,
			weight: $data['weight'] ?? null,
			width: $data['width'] ?? null,
			height: $data['height'] ?? null,
			length: $data['length'] ?? null,
			fields: $fields,
			skuValues: $data['sku-values'] ?? [],
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
			'ec-sku-billing-method' => $this->billingMethod,
			'compare-at-price' => $this->compareAtPrice?->toArray(),
			'_archived' => $this->archived,
			'_draft' => $this->draft,
			'width' => $this->width,
			'length' => $this->length,
			'main-image' => $this->mainImage?->toArray(),
			'height' => $this->height,
			'price' => $this->price->toArray(),
			'weight' => $this->weight,
			'ec-sku-subscription-plan' => $this->subscriptionPlan?->toArray(),
			'sku-values' => $this->skuValues,
			'sku' => $this->sku,
			'more-images' => array_map(fn (Image $image) => $image->toArray(), $this->moreImages),
			'name' => $this->name,
			'download-files' => array_map(fn (File $file) => $file->toArray(), $this->downloadFiles),
			'slug' => $this->slug,
			'product' => $this->productId,
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

	/**
	 * Returns the values that have been updated since the SKU was initialized.
	 *
	 * @return array<string,mixed>
	 */
	public function getChangeset(): array
	{
		$changes = [];

		foreach ($this->getNonMetadataFields() as $key => $value) {
			// Ignore metadata fields
			if (in_array($key, ['updated-on', 'updated-by', 'created-on', 'created-by', 'published-on', 'published-by', '_cid', '_id'], true)) {
				continue;
			}

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
