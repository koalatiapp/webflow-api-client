<?php

declare(strict_types=1);

namespace Koalati\Webflow\Api\Module;

use Koalati\Webflow\Model\Cms\Collection;
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
}
