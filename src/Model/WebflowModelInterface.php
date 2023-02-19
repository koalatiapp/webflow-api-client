<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model;

/**
 * Implementation of API calls for the "Meta" module (authorized user, authorization, etc.).
 *
 * @see https://developers.webflow.com/reference
 */
interface WebflowModelInterface
{
	/**
	 * Creates an instance of the model from an array of data, such as an API
	 * response's body.
	 *
	 * @param array<mixed,mixed> $data
	 */
	public static function createFromArray(array $data): self;

	/**
	 * Maps the model's data to an array in the format defined by Webflow's
	 * API documentation.
	 *
	 * @return array<string,mixed>
	 */
	public function toArray(): array;

	/**
	 * @return string ID of the Webflow resource
	 */
	public function getId(): string;
}
