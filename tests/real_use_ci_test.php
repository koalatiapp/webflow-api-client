<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Koalati\Webflow\Api\Client;
use Koalati\Webflow\Model\Cms\CollectionItem;

// The API access token is passed as the 1st CLI argument
$accessToken = $argv[1];

// The current commit hash is passed as the 2nd CLI argument
$commitHash = $argv[2] ?? 'none';

$client = new Client($accessToken);
$sites = $client->listSites();
$testSite = $client->getSite($sites[0]->getId());

// List all collections for a site
$collections = $client->listCollections($testSite);
$testCollection = $client->getCollection($collections[0]->getId());

// Create a test item
$newItem = new CollectionItem(
	name: 'Test item',
	slug: 'test-item-' . time() . '-' . random_int(0, 10000),
	archived: false,
	draft: false,
	fields: [
		'text-field' => 'A textual value goes in here',
		'image-field' => 'https://picsum.photos/100',
		'commit-hash' => $commitHash,
		'github-action-run' => "https://github.com/koalatiapp/webflow-api-client/commit/{$commitHash}",
	]
);
$createdItem = $client->createCollectionItem($testCollection, $newItem, true);
$createdItem->name .= ' :)';
$client->updateCollectionItem($testCollection, $createdItem, true);

// Create a duplicate, then delete it
$deletionTestItem = new CollectionItem(
	name: 'Deletion Test Item',
	slug: 'deletion-test-item-' . time() . '-' . random_int(0, 10000),
	archived: false,
	draft: false,
	fields: [
		'text-field' => 'A textual value goes in here',
		'image-field' => 'https://picsum.photos/100',
		'commit-hash' => $commitHash,
		'github-action-run' => "https://github.com/koalatiapp/webflow-api-client/commit/{$commitHash}",
	]
);
$deletionTestItem = $client->createCollectionItem($testCollection, $deletionTestItem, true);
$client->removeCollectionItem($testCollection, $deletionTestItem, false);

// Membership user tests
$accessGroups = $client->listAccessGroups($testSite);
$users = $client->listUsers($testSite);
$user = $client->getUser($testSite, $users[0]->id);
$user->setData('country', ($user->data['country'] ?? null) === 'Canada' ? 'Wonderland' : 'Canada');
$client->updateUser($testSite, $user);

// Publish the site
$client->publishSite($testSite);
