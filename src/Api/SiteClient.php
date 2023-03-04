<?php

declare(strict_types=1);

namespace Koalati\Webflow\Api;

use Koalati\Webflow\Exception\CannotUpdateNonExistingModelException;
use Koalati\Webflow\Exception\CollectionItemDeletionException;
use Koalati\Webflow\Exception\CollectionItemPublishingException;
use Koalati\Webflow\Exception\InvalidUserUpdateException;
use Koalati\Webflow\Model\Cms\Collection;
use Koalati\Webflow\Model\Cms\CollectionItem;
use Koalati\Webflow\Model\Membership\AccessGroup;
use Koalati\Webflow\Model\Membership\User;
use Koalati\Webflow\Model\Meta\Authorization;
use Koalati\Webflow\Model\Meta\AuthorizedUser;
use Koalati\Webflow\Model\Site\Domain;
use Koalati\Webflow\Model\Site\Site;
use Koalati\Webflow\Model\Site\Webhook;
use Koalati\Webflow\Util\PaginatedList;

/**
 * A Client that wraps `Koalati\Webflow\Api\Client` to simplify method calls
 * when all of your operations are to be performed on the same site.
 *
 * Instead of providing the site ID to every method call, this wrapper takes
 * the site ID when it is created and uses it for all API calls.
 *
 * @see https://developers.webflow.com/reference
 * @see https://developers.webflow.com/docs/api-overview
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SiteClient
{
	/**
	 * ID of the site to use for all calls with this client
	 */
	private readonly string $siteId;

	/**
	 * ID of the site to use for all calls with this client
	 */
	private readonly Client $client;

	/**
	 * @param string $accessToken	Webflow Access Token obtained via OAuth 2.0 (recommended) or Site API Token. @see https://github.com/koalatiapp/webflow-api-client#authenticate-with-webflow
	 */
	public function __construct(
		string $accessToken,
		string|Site $siteId,
	) {
		$this->client = new Client($accessToken);
		$this->siteId = (string) $siteId;
	}

	public function getAuthorizedUser(): AuthorizedUser
	{
		return $this->client->getAuthorizedUser();
	}

	public function getAuthorizedInfo(): Authorization
	{
		return $this->client->getAuthorizedInfo();
	}

	/**
	 * List of all sites the provided access token is able to access.
	 *
	 * @return array<int,Site>
	 */
	public function listSites(): array
	{
		return $this->client->listSites();
	}

	/**
	 * Get a site by site id.
	 */
	public function getSite(): Site
	{
		return $this->client->getSite($this->siteId);
	}

	/**
	 * Publish a site.
	 *
	 * @param array<mixed,Domain|string> $domains Array of domain names to publish to (e.g. `mysite.webflow.io` or `mysite.com`). If left empty, this will publish to all domains registered for the site.
	 */
	public function publishSite(array $domains = []): bool
	{
		return $this->client->publishSite($this->siteId, $domains);
	}

	/**
	 * List of all custom domains added to a given site
	 *
	 * @return array<int,Domain>
	 */
	public function listDomains(): array
	{
		return $this->client->listDomains($this->siteId);
	}

	/**
	 * List of all webhooks in a given site
	 *
	 * @return array<int,Webhook>
	 */
	public function listWebhooks(): array
	{
		return $this->client->listWebhooks($this->siteId);
	}

	/**
	 * Get a site webhook
	 */
	public function getWebhook(string $webhookId): Webhook
	{
		return $this->client->getWebhook($this->siteId, $webhookId);
	}

	/**
	 * Create a new webhook
	 */
	public function createWebhook(Webhook $webhook): Webhook
	{
		return $this->client->createWebhook($this->siteId, $webhook);
	}

	/**
	 * Remove a webhook
	 */
	public function removeWebhook(Webhook|string $webhookId): bool
	{
		return $this->client->removeWebhook($this->siteId, $webhookId);
	}

	/**
	 * List of all collections in a given site.
	 *
	 * @return array<int, Collection>
	 */
	public function listCollections(): array
	{
		return $this->client->listCollections($this->siteId);
	}

	/**
	 * Get a collection by collection id.
	 */
	public function getCollection(string $collectionId): Collection
	{
		return $this->client->getCollection($collectionId);
	}

	/**
	 * Get all items for a collection
	 *
	 * @param string $sortBy        Defines the field by which to sort the results.
	 * 								Either a `CollectionItem::SORT_BY_` constant or the slug of a field from the collection.
	 * @param string $sortDirection	Either `ASC` or `DESC`.
	 * @return PaginatedList<CollectionItem>
	 */
	public function listCollectionItems(Collection|string $collectionId, string $sortBy = 'created-on', string $sortDirection = 'ASC'): PaginatedList
	{
		return $this->client->listCollectionItems($collectionId, $sortBy, $sortDirection);
	}

	/**
	 * Get an item in a collection
	 */
	public function getCollectionItem(Collection|string $collectionId, string $itemId): CollectionItem
	{
		return $this->client->getCollectionItem($collectionId, $itemId);
	}

	/**
	 * Create a new collection item
	 */
	public function createCollectionItem(Collection|string $collectionId, CollectionItem $item, bool $publishImmediately): CollectionItem
	{
		return $this->client->createCollectionItem($collectionId, $item, $publishImmediately);
	}

	/**
	 * Update an existing collection item.
	 * To upload a new image set the image URL to the corresponding item's field.
	 * Collection items that reuse images previously uploaded can just reference their fileId property.
	 */
	public function updateCollectionItem(Collection|string $collectionId, CollectionItem $item, bool $publishImmediately): CollectionItem
	{
		return $this->client->updateCollectionItem($collectionId, $item, $publishImmediately);
	}

	/**
	 * Remove or unpublish an item in a collection.
	 *
	 * @param bool $keepAsDraft	When $keepAsDraft is set to `true`, the items will be unpublished and kept as drafts instead of being deleted.
	 */
	public function removeCollectionItem(Collection|string $collectionId, CollectionItem|string $itemId, bool $keepAsDraft): bool
	{
		return $this->client->removeCollectionItem($collectionId, $itemId, $keepAsDraft);
	}

	/**
	 * Remove or unpublish items in a collection.
	 *
	 * @param array<int, (string | CollectionItem)> $itemIds
	 * @param bool $keepAsDraft	When $keepAsDraft is set to `true`, the items will be unpublished and kept as drafts instead of being deleted.
	 * @throws CollectionItemDeletionException
	 */
	public function removeCollectionItems(Collection|string $collectionId, array $itemIds, bool $keepAsDraft): bool
	{
		return $this->client->removeCollectionItems($collectionId, $itemIds, $keepAsDraft);
	}

	/**
	 * Publish items in a Collection.
	 *
	 * @param array<int, (string | CollectionItem)> $itemIds
	 *
	 * @throws CollectionItemPublishingException
	 */
	public function publishCollectionItems(Collection|string $collectionId, array $itemIds): bool
	{
		return $this->client->publishCollectionItems($collectionId, $itemIds);
	}

	/**
	 * Get a list of users for a site
	 *
	 * @param string $sortBy        Defines the field by which to sort the results.
	 * 								Must be a `User::SORT_BY_` constant.
	 * @param string $sortDirection	Either `ASC` or `DESC`.
	 * @return PaginatedList<User>
	 */
	public function listUsers(string $sortBy = 'CreatedOn', string $sortDirection = 'ASC'): PaginatedList
	{
		return $this->client->listUsers($this->siteId, $sortBy, $sortDirection);
	}

	/**
	 * Get a User by id
	 */
	public function getUser(string $userId): User
	{
		return $this->client->getUser($this->siteId, $userId);
	}

	/**
	 * Update a User by id.
	 * The `email` and `password` fields cannot be updated using this endpoint.
	 *
	 * @return User An updated user instance
	 *
	 * @throws CannotUpdateNonExistingModelException
	 * @throws InvalidUserUpdateException
	 */
	public function updateUser(User $user): User
	{
		return $this->client->updateUser($this->siteId, $user);
	}

	/**
	 * Delete a User by id.
	 */
	public function deleteUser(User|string $userId): bool
	{
		return $this->client->deleteUser($this->siteId, $userId);
	}

	/**
	 * Invite a user by email address.
	 *
	 * @param array<mixed,string|AccessGroup> $accessGroups
	 */
	public function inviteUser(string $email, array $accessGroups): User
	{
		return $this->client->inviteUser($this->siteId, $email, $accessGroups);
	}

	/**
	 * Get a list of access groups for a site
	 *
	 * @return PaginatedList<AccessGroup>
	 */
	public function listAccessGroups(): PaginatedList
	{
		return $this->client->listAccessGroups($this->siteId);
	}
}
