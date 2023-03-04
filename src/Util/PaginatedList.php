<?php

declare(strict_types=1);

namespace Koalati\Webflow\Util;

use Iterator;
use Koalati\Webflow\Model\WebflowModelInterface;

/**
 * A list of Webflow Models that simplifies interactions with the Webflow API
 * pagination.
 *
 * The PaginatedList implements the Iterator interface, and can therefore be
 * looped over like you would with an array. Data from subsequent pages will be
 * loaded automatically as you need it.
 *
 * @template T of WebflowModelInterface
 * @implements Iterator<int,T>
 */
class PaginatedList implements Iterator
{
	/**
	 * Number of results per page.
	 * `100` is Webflow's default and maximum value.
	 */
	public const LIMIT = 100;

	/**
	 * Total number of items in the list.
	 * This includes items that haven't been loaded yet.
	 */
	public readonly int $total;

	private int $currentItemIndex = 0;

	/**
	 * Contains a cached version of the results for each page.
	 *
	 * @var array<int,array<int,T>>
	 */
	private array $pages = [];

	/**
	 * The key that contains the list of data in raw responses.
	 */
	private string $responseDataKey;

	/**
	 * @param callable(int $loadCallable): array<string,mixed> $loadCallable	Callable that takes an offset and returns the results of the list for that offset.
	 * @param class-string<T> $model
	 * @param array<string,mixed> $firstResponse
	 */
	public function __construct(
		private $loadCallable,
		public readonly string $model,
		array $firstResponse,
	) {
		$this->total = $firstResponse['total'];
		$this->responseDataKey = $this->guessDataKey($firstResponse);
		$this->pages[0] = $this->hydrateResponse($firstResponse);
	}

	/**
	 * Fetches the results for every page and returns them all as an array.
	 *
	 * @return array<int,T>
	 */
	public function fetchAll(): array
	{
		$originalIndex = $this->currentItemIndex;
		$results = [];

		$this->rewind();
		foreach ($this as $result) {
			$results[] = $result;
		}
		$this->currentItemIndex = $originalIndex;

		return $results;
	}

	/**
	 * @return ?T
	 */
	public function first(): mixed
	{
		return $this->pages[0][0];
	}

	public function current(): mixed
	{
		$indexWithinPage = $this->currentItemIndex % self::LIMIT;
		$this->loadCurrentPage();

		return $this->pages[$this->getCurrentPageIndex()][$indexWithinPage];
	}

	public function key(): mixed
	{
		return $this->currentItemIndex;
	}

	public function next(): void
	{
		$this->currentItemIndex++;
	}

	public function rewind(): void
	{
		$this->currentItemIndex = 0;
	}

	public function valid(): bool
	{
		return $this->currentItemIndex >= 0 && $this->currentItemIndex < $this->total;
	}

	private function loadCurrentPage(): void
	{
		if (! isset($this->pages[$this->getCurrentPageIndex()])) {
			$offset = $this->getCurrentPageIndex() * self::LIMIT;
			$response = call_user_func($this->loadCallable, $offset);

			$this->pages[$this->getCurrentPageIndex()] = $this->hydrateResponse($response);
		}
	}

	/**
	 * Takes in a raw Webflow response and returns an array of hydrated models.
	 *
	 * @param array<string,mixed> $response
	 * @return array<int,T>
	 */
	private function hydrateResponse(array $response): array
	{
		$hydratedModels = [];

		foreach ($response[$this->responseDataKey] as $resultData) {
			/** @var T $hydratedModel */
			$hydratedModel = $this->model::createFromArray($resultData);
			$hydratedModels[] = $hydratedModel;
		}

		return $hydratedModels;
	}

	private function getCurrentPageIndex(): int
	{
		return (int) (max(1, ceil($this->currentItemIndex / self::LIMIT)) - 1);
	}

	/**
	 * Webflow uses various keys for the list of results they return in
	 * paginated endpoints (ex.: `items`, `users`, etc.)
	 *
	 * This method guesses that key from a response by removing all
	 * pagination-related keys and returning the remaining key.
	 *
	 * @param array<string,mixed> $firstResponse
	 */
	private function guessDataKey(array $firstResponse): string
	{
		unset($firstResponse['count']);
		unset($firstResponse['limit']);
		unset($firstResponse['offset']);
		unset($firstResponse['total']);

		return array_keys($firstResponse)[0];
	}
}
