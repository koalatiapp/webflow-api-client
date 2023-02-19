<?php

declare(strict_types=1);

namespace Koalati\Webflow\Api;

use Koalati\Webflow\Api\Module\Meta;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * API client for Webflow's REST API.
 *
 * @see https://developers.webflow.com/reference
 * @see https://developers.webflow.com/docs/api-overview
 */
class Client
{
	use Meta;

	/**
	 * Base URI for API endpoints.
	 *
	 * @see https://developers.webflow.com/reference
	 */
	private const API_BASE_URI = 'https://api.webflow.com';

	private HttpClientInterface $httpClient;

	/**
	 * @param string $accessToken	Webflow Access Token obtained via OAuth 2.0 (recommended) or Site API Token. @see https://github.com/koalatiapp/webflow-api-client#authenticate-with-webflow
	 */
	public function __construct(string $accessToken)
	{
		$this->httpClient = HttpClient::createForBaseUri(self::API_BASE_URI, [
			'headers' => [
				'accept' => 'application/json',
			],
			'auth_bearer' => $accessToken,
			'json' => true,
		]);
	}

	/**
	 * @param null|array<string,mixed> $body
	 * @return array<mixed,mixed>
	 */
	protected function request(string $method, string $endpoint, ?array $body = null): array
	{
		$options = [];

		if ($body !== null) {
			$options['body'] = $body;
		}

		$response = $this->httpClient->request($method, $endpoint, $options);

		return $response->toArray();
	}
}
