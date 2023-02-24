<?php

declare(strict_types=1);

namespace Koalati\Tests\Webflow\Api;

use Koalati\Webflow\Api\Client;
use Koalati\Webflow\Model\Cms\CollectionItem;
use Koalati\Webflow\Model\Site\Webhook;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class ClientTest extends \PHPUnit\Framework\TestCase
{
	protected Client $client;

	protected function setUp(): void
	{
		$this->client = new Client('test_token');

		// Mock the API client's inner HttpClient
		$mockResponses = include(__DIR__ . '/../sample_data.php');
		$responseFactory = function (string $method, string $url) use ($mockResponses) {
			$url = str_replace('https://api.webflow.com', '', $url);
			return new MockResponse(json_encode($mockResponses[$url][$method]));
		};
		$reflectedProperty = new \ReflectionProperty($this->client, 'httpClient');
		$reflectedProperty->setAccessible(true);
		$reflectedProperty->setValue($this->client, new MockHttpClient($responseFactory, 'https://api.webflow.com'));
	}

	public function testApiCalls(): void
	{
		$this->expectNotToPerformAssertions();

		$this->client->getAuthorizedInfo();
		$this->client->getAuthorizedUser();

		$this->client->listSites();
		$this->client->getSite('580e63e98c9a982ac9b8b741');
		$this->client->listDomains('580e63e98c9a982ac9b8b741');
		$this->client->publishSite('580e63e98c9a982ac9b8b741');
		$this->client->listWebhooks('580e63e98c9a982ac9b8b741');
		$this->client->getWebhook('580e63e98c9a982ac9b8b741', '57ca0a9e418c504a6e1acbb6');
		$this->client->removeWebhook('580e63e98c9a982ac9b8b741', '57ca0a9e418c504a6e1acbb6');
		$this->client->createWebhook('580e63e98c9a982ac9b8b741', new Webhook('form_submission', 'https://acme.co/webhook'));

		$this->client->listCollections('580e63e98c9a982ac9b8b741');
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
		$this->client->createCollectionItem('580e63fc8c9a982ac9b8b745', $newItem, false);
	}
}
