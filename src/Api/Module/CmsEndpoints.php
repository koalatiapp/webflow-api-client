<?php

declare(strict_types=1);

namespace Koalati\Webflow\Api\Module;

use Koalati\Webflow\Exception\CollectionItemDeletionException;
use Koalati\Webflow\Exception\CollectionItemPublishingException;
use Koalati\Webflow\Model\Cms\Collection;
use Koalati\Webflow\Model\Cms\CollectionItem;
use Koalati\Webflow\Model\Site\Site;

/**
 * Implementation of API calls for the "Sites" module (sites, domains, etc.).
 *
 * @see https://developers.webflow.com/reference
 */
trait CmsEndpoints
{
	/**
	 * List of all collections in a given site.
	 *
	 * @return array<int,Collection>
	 */
	public function listCollections(string|Site $siteId): array
	{
		$response = $this->request('GET', "/sites/{$siteId}/collections");
		$collections = [];

		foreach ($response as $collectionData) {
			$collections[] = Collection::createFromArray($collectionData);
		}

		return $collections;
	}

	/**
	 * Get a collection by collection id.
	 */
	public function getCollection(string $collectionId): Collection
	{
		$response = $this->request('GET', "/collections/{$collectionId}");

		return Collection::createFromArray($response);
	}

	/**
	 * Get all items for a collection
	 *
	 * @return array<int,CollectionItem>
	 */
	public function listCollectionItems(string|Collection $collectionId): array
	{
		$response = $this->request('GET', "/collections/{$collectionId}/items");
		$items = [];

		foreach ($response['items'] as $itemData) {
			$items[] = CollectionItem::createFromArray($itemData);
		}

		// @TODO: add pagination support - this currently only fetches the first page

		return $items;
	}

	/**
	 * Get an item in a collection
	 */
	public function getCollectionItem(string|Collection $collectionId, string $itemId): CollectionItem
	{
		$response = $this->request('GET', "/collections/{$collectionId}/items/{$itemId}");

		return CollectionItem::createFromArray($response['items'][0]);
	}

	/**
	 * Create a new collection item
	 */
	public function createCollectionItem(string|Collection $collectionId, CollectionItem $item, bool $publishImmediately): CollectionItem
	{
		$payload = [
			'fields' => $item->getNonMetadataFields(),
		];
		$url = "/collections/{$collectionId}/items";

		if ($publishImmediately) {
			$url .= '?live=1';
		}

		/** @var array<string,mixed> */
		$response = $this->request('POST', $url, $payload);

		return CollectionItem::createFromArray($response);
	}

	/**
	 * Update an existing collection item.
	 * To upload a new image set the image URL to the corresponding item's field.
	 * Collection items that reuse images previously uploaded can just reference their fileId property.
	 */
	public function updateCollectionItem(string|Collection $collectionId, CollectionItem $item, bool $publishImmediately): CollectionItem
	{
		$payload = [
			'fields' => $item->getChangeset(),
		];
		$url = "/collections/{$collectionId}/items/{$item}";

		if ($publishImmediately) {
			$url .= '?live=1';
		}

		/** @var array<string,mixed> */
		$response = $this->request('PATCH', $url, $payload);

		return CollectionItem::createFromArray($response);
	}

	/**
	 * Remove or unpublish an item in a collection.
	 *
	 * @param bool $keepAsDraft	When $keepAsDraft is set to `true`, the items will be unpublished and kept as drafts instead of being deleted.
	 */
	public function removeCollectionItem(string|Collection $collectionId, string|CollectionItem $itemId, bool $keepAsDraft): bool
	{
		$requestParams = null;

		if ($keepAsDraft) {
			$requestParams = [
				'live' => true,
			];
		}

		$response = $this->request('DELETE', "/collections/{$collectionId}/items/{$itemId}", $requestParams);

		return ($response['deleted'] ?? null) === 1;
	}

	/**
	 * Remove or unpublish items in a collection.
	 *
	 * @param array<int,string|CollectionItem> $itemIds
	 * @param bool $keepAsDraft	When $keepAsDraft is set to `true`, the items will be unpublished and kept as drafts instead of being deleted.
	 * @throws CollectionItemDeletionException
	 */
	public function removeCollectionItems(string|Collection $collectionId, array $itemIds, bool $keepAsDraft): bool
	{
		// Convert CollectionItem objects to string IDs
		$itemIds = array_map(fn (string|CollectionItem $itemId) => (string) $itemId, $itemIds);
		// Remove duplicates
		$itemIds = array_unique($itemIds);

		$requestParams = [
			'itemIds' => $itemIds,
		];

		$url = "/collections/{$collectionId}/items";

		if ($keepAsDraft) {
			$url .= '?live=1';
		}

		$response = $this->request('DELETE', $url, $requestParams);

		if ($response['errors']) {
			throw new CollectionItemDeletionException(implode("\n", $response['errors']));
		}

		return count($response['deletedItemIds'] ?? []) === count($requestParams['itemIds']);
	}

	/**
	 * Publish items in a Collection.
	 *
	 * @param array<int,string|CollectionItem> $itemIds
	 *
	 * @throws CollectionItemPublishingException
	 */
	public function publishCollectionItems(string|Collection $collectionId, array $itemIds): bool
	{
		// Convert CollectionItem objects to string IDs
		$itemIds = array_map(fn (string|CollectionItem $itemId) => (string) $itemId, $itemIds);
		// Remove duplicates
		$itemIds = array_unique($itemIds);

		$requestParams = [
			'itemIds' => $itemIds,
		];

		$response = $this->request('PUT', "/collections/{$collectionId}/items/publish", $requestParams);

		if ($response['errors']) {
			throw new CollectionItemPublishingException(implode("\n", $response['errors']));
		}

		return count($response['publishedItemIds'] ?? []) === count($requestParams['itemIds']);
	}
}
