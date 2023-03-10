<?php

declare(strict_types=1);

namespace Koalati\Webflow\Api\Module;

use Koalati\Webflow\Exception\CannotUpdateNonExistingModelException;
use Koalati\Webflow\Exception\InvalidUserUpdateException;
use Koalati\Webflow\Model\Membership\AccessGroup;
use Koalati\Webflow\Model\Membership\User;
use Koalati\Webflow\Model\Site\Site;
use Koalati\Webflow\Util\PaginatedList;

/**
 * Implementation of API calls for the "Membership" module (users, access groups).
 *
 * @see https://developers.webflow.com/reference
 */
trait MembershipEndpoints
{
	/**
	 * Get a list of users for a site
	 *
	 * @param string $sortBy        Defines the field by which to sort the results.
	 * 								Must be a `User::SORT_BY_` constant.
	 * @param string $sortDirection	Either `ASC` or `DESC`.
	 * @return PaginatedList<User>
	 */
	public function listUsers(string|Site $siteId, string $sortBy = User::SORT_BY_CREATED_ON, string $sortDirection = 'ASC'): PaginatedList
	{
		$sortPrefix = strtoupper($sortDirection) === 'DESC' ? '-' : '';

		return $this->requestWithPagination(
			User::class,
			"/sites/{$siteId}/users",
			[
				'sort' => $sortPrefix . $sortBy,
			]
		);
	}

	/**
	 * Get a User by id
	 */
	public function getUser(string|Site $siteId, string $userId): User
	{
		$response = $this->request('GET', "/sites/{$siteId}/users/{$userId}");

		return User::createFromArray($response);
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
	public function updateUser(string|Site $siteId, User $user): User
	{
		if (! $user->getId()) {
			throw new CannotUpdateNonExistingModelException($user);
		}

		$payload = $user->getChangeset();
		unset($payload['email'], $payload['password']);

		if (! $payload) {
			return $user;
		}

		$response = $this->request('PATCH', "/sites/{$siteId}/users/{$user}", $payload);

		if (! $response['valid']) {
			throw new InvalidUserUpdateException($user);
		}

		return User::createFromArray($response['user']);
	}

	/**
	 * Delete a User by id.
	 */
	public function deleteUser(string|Site $siteId, string|User $userId): bool
	{
		$response = $this->request('DELETE', "/sites/{$siteId}/users/{$userId}");

		return ($response['deleted'] ?? null) === 1;
	}

	/**
	 * Invite a user by email address.
	 *
	 * @param array<mixed,string|AccessGroup> $accessGroups
	 */
	public function inviteUser(string|Site $siteId, string $email, array $accessGroups): User
	{
		$response = $this->request('POST', "/sites/{$siteId}/users/invite", [
			'email' => $email,
			'accessGroups' => array_map(
				fn (string|AccessGroup $group) => is_string($group) ? $group : $group->slug,
				$accessGroups
			),
		]);

		return User::createFromArray($response);
	}

	/**
	 * Get a list of access groups for a site
	 *
	 * @return PaginatedList<AccessGroup>
	 */
	public function listAccessGroups(string|Site $siteId): PaginatedList
	{
		return $this->requestWithPagination(AccessGroup::class, "/sites/{$siteId}/accessgroups", [
			'sort' => 'CreatedOn',
		]);
	}
}
