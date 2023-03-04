<?php

declare(strict_types=1);

namespace Koalati\Tests\Webflow\Api;

use Koalati\Webflow\Api\SiteClient;
use Koalati\Webflow\Model\Cms\CollectionItem;
use Koalati\Webflow\Model\Site\Webhook;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class SiteClientTest extends \PHPUnit\Framework\TestCase
{
	protected SiteClient $client;

	protected function setUp(): void
	{
		$this->client = new SiteClient('test_token', '580e63e98c9a982ac9b8b741');

		// Mock the API client's inner HttpClient
		$mockResponses = include(__DIR__ . '/../sample_data.php');
		$responseFactory = function (string $method, string $url) use ($mockResponses) {
			$url = str_replace('https://api.webflow.com', '', $url);
			return new MockResponse(json_encode($mockResponses[$url][$method]));
		};

		$reflectedClientProperty = new \ReflectionProperty($this->client, 'client');
		$reflectedClientProperty->setAccessible(true);
		$innerClient = $reflectedClientProperty->getValue($this->client);

		$reflectedHttpClientProperty = new \ReflectionProperty($innerClient, 'httpClient');
		$reflectedHttpClientProperty->setAccessible(true);
		$reflectedHttpClientProperty->setValue($innerClient, new MockHttpClient($responseFactory, 'https://api.webflow.com'));
	}

	public function testApiCalls(): void
	{
		$this->expectNotToPerformAssertions();

		// Meta
		$this->client->getAuthorizedInfo();
		$this->client->getAuthorizedUser();

		// Site
		$this->client->listSites();
		$this->client->getSite();
		$this->client->listDomains();
		$this->client->publishSite();
		$this->client->listWebhooks();
		$this->client->getWebhook('57ca0a9e418c504a6e1acbb6');
		$this->client->removeWebhook('57ca0a9e418c504a6e1acbb6');
		$this->client->createWebhook(new Webhook('form_submission', 'https://acme.co/webhook'));

		// CMS
		$this->client->listCollections();
		$this->client->getCollection('580e63fc8c9a982ac9b8b745');
		$this->client->listCollectionItems('580e63fc8c9a982ac9b8b745');
		$this->client->getCollectionItem('580e63fc8c9a982ac9b8b745', '580e64008c9a982ac9b8b754');
		$this->client->removeCollectionItem('580e63fc8c9a982ac9b8b745', '580e64008c9a982ac9b8b754', false);
		$this->client->removeCollectionItems('580e63fc8c9a982ac9b8b745', ['62aa37923cf7a9de1ca4469c', '62aa37923cf7a9de1ca44697', '62aa37923cf7a9de1ca44696'], false);
		$this->client->publishCollectionItems('580e63fc8c9a982ac9b8b745', ['62aa37923cf7a9de1ca4469c', '62aa37923cf7a9de1ca44697', '62aa37923cf7a9de1ca44696']);

		$newItem = new CollectionItem(
			'Exciting blog post title',
			'exciting-post',
			false,
			false,
			[
				'color' => '#a98080',
				'post-body' => '<p>Blog post contents...</p>',
				'post-summary' => 'Summary of exciting blog post',
				'main-image' => [
					'fileId' => '580e63fe8c9a982ac9b8b749',
					'url' => 'https://d1otoma47x30pg.cloudfront.net/580e63fc8c9a982ac9b8b744/580e63fe8c9a982ac9b8b749_1477338110257-image20.jpg',
				],
				'author' => '580e640c8c9a982ac9b8b778',
			]
		);
		$createdItem = $this->client->createCollectionItem('580e63fc8c9a982ac9b8b745', $newItem, false);
		$createdItem->name = 'Exciting blog post title!';
		$this->client->updateCollectionItem('580e63fc8c9a982ac9b8b745', $createdItem, false);

		// Membership
		$this->client->listUsers();
		$user = $this->client->getUser('6287ec36a841b25637c663df');
		$user->setData('name', 'John Doe');
		$this->client->updateUser($user);
		$this->client->deleteUser($user);
		$this->client->inviteUser('Some.One@home.com', ['jo']);
		$this->client->listAccessGroups();
	}
}
