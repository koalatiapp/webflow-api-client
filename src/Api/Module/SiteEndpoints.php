<?php

declare(strict_types=1);

namespace Koalati\Webflow\Api\Module;

use Koalati\Webflow\Model\Site\Domain;
use Koalati\Webflow\Model\Site\Site;

/**
 * Implementation of API calls for the "Sites" module (sites, domains, etc.).
 *
 * @see https://developers.webflow.com/reference
 */
trait SiteEndpoints
{
	/**
	 * List of all sites the provided access token is able to access.
	 *
	 * @return array<int,Site>
	 */
	public function listSites(): array
	{
		$response = $this->request('GET', '/sites');
		$sites = [];

		foreach ($response as $siteData) {
			$sites[] = Site::createFromArray($siteData);
		}

		return $sites;
	}

	/**
	 * Get a site by site id.
	 */
	public function getSite(string $siteId): Site
	{
		$response = $this->request('GET', "/sites/{$siteId}");

		return Site::createFromArray($response);
	}

	/**
	 * Publish a site.
	 *
	 * @param array<mixed,Domain|string> $domains Array of domain names to publish to (e.g. `mysite.webflow.io` or `mysite.com`). If left empty, this will publish to all domains registered for the site.
	 */
	public function publishSite(string|Site $siteId, array $domains = []): bool
	{
		if (count($domains) === 0) {
			$domains = $this->listDomains($siteId);
		}

		foreach ($domains as &$domain) {
			if ($domain instanceof Domain) {
				$domain = $domain->name;
			}
		}

		$response = $this->request('POST', "/sites/${siteId}/publish", [
			'domains' => array_values($domains),
		]);

		return ($response['queued'] ?? null) === true;
	}

	/**
	 * List of all custom domains added to a given site
	 *
	 * @return array<int,Domain>
	 */
	public function listDomains(string|Site $siteId): array
	{
		$response = $this->request('GET', "/sites/{$siteId}/domains");
		$domains = [];

		foreach ($response as $siteData) {
			$domains[] = Domain::createFromArray($siteData);
		}

		return $domains;
	}
}
