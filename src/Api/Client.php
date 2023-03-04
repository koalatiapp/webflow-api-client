<?php

declare(strict_types=1);

namespace Koalati\Webflow\Api;

use Koalati\Webflow\Api\Module\CmsEndpoints;
use Koalati\Webflow\Api\Module\MembershipEndpoints;
use Koalati\Webflow\Api\Module\MetaEndpoints;
use Koalati\Webflow\Api\Module\SiteEndpoints;
use Koalati\Webflow\Exception\WebflowClientException;
use Koalati\Webflow\Model\WebflowModelInterface;
use Koalati\Webflow\Util\PaginatedList;
use Symfony\Component\HttpClient\Exception\ClientException;
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
	use MetaEndpoints;
	use SiteEndpoints;
	use CmsEndpoints;
	use MembershipEndpoints;

	/**
	 * Base URI for API endpoints.
	 *
	 * @see https://developers.webflow.com/reference
	 */
	private const API_BASE_URI = 'https://api.webflow.com';

	/**
	 * Version number of the API to hit.
	 *
	 * @see https://developers.webflow.com/docs/api-version
	 */
	private const API_VERSION = '1.0.0';

	private HttpClientInterface $httpClient;

	/**
	 * @param string $accessToken	Webflow Access Token obtained via OAuth 2.0 (recommended) or Site API Token. @see https://github.com/koalatiapp/webflow-api-client#authenticate-with-webflow
	 */
	public function __construct(string $accessToken)
	{
		$this->httpClient = HttpClient::createForBaseUri(self::API_BASE_URI, [
			'headers' => [
				'accept' => 'application/json',
				'Accept-Version' => self::API_VERSION,
			],
			'auth_bearer' => $accessToken,
		]);
	}

	/**
	 * @param null|array<string,mixed> $body
	 * @return array<string,mixed>
	 */
	protected function request(string $method, string $endpoint, ?array $body = null): array
	{
		$options = [];

		if ($body !== null) {
			$bodyParam = $method === 'GET' ? 'query' : 'json';
			$options[$bodyParam] = $body;
		}

		$response = $this->httpClient->request($method, $endpoint, $options);

		try {
			/** @var array<string,mixed> */
			$responseData = $response->toArray();
		} catch (ClientException $clientException) {
			/** @var array<string,mixed> */
			$responseData = $response->toArray(false);
			throw new WebflowClientException($responseData['msg'] ?? $clientException->getMessage(), $clientException);
		}

		return $responseData;
	}

	/**
	 * @template T of WebflowModelInterface
	 * @param null|array<string,mixed> $body
	 * @param class-string<T> $model
	 * @return PaginatedList<T>
	 */
	protected function requestWithPagination(string $model, string $endpoint, ?array $body = null): PaginatedList
	{
		$responseData = $this->request('GET', $endpoint, $body);

		$client = $this;
		$paginatedList = new PaginatedList(
			function (int $offset) use ($endpoint, $body, $client) {
				$queryParams = $body;
				$queryParams['offset'] = $offset;

				return $client->request('GET', $endpoint, $queryParams);
			},
			$model,
			$responseData
		);

		return $paginatedList;
	}
}
