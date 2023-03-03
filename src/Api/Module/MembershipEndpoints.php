<?php

declare(strict_types=1);

namespace Koalati\Webflow\Api\Module;

use Koalati\Webflow\Exception\CannotUpdateNonExistingModelException;
use Koalati\Webflow\Exception\InvalidUserUpdateException;
use Koalati\Webflow\Model\Membership\AccessGroup;
use Koalati\Webflow\Model\Membership\User;
use Koalati\Webflow\Model\Site\Site;

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
	 * @return array<int,User>
	 */
	public function listUsers(string|Site $siteId): array
	{
		$response = $this->request('GET', "/sites/{$siteId}/users");
		$users = [];

		foreach ($response['users'] as $userData) {
			$users[] = User::createFromArray($userData);
		}

		// @TODO: add pagination support - this currently only fetches the first page

		return $users;
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
	 * @return array<int,AccessGroup>
	 */
	public function listAccessGroups(string|Site $siteId): array
	{
		$response = $this->request('GET', "/sites/{$siteId}/accessgroups");
		$accessGroups = [];

		foreach ($response['accessGroups'] as $accessGroupData) {
			$accessGroups[] = AccessGroup::createFromArray($accessGroupData);
		}

		// @TODO: add pagination support - this currently only fetches the first page

		return $accessGroups;
	}
}
