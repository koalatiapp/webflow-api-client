<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Cms;

use ReflectionClass;
use ReflectionProperty;

/**
 * @see https://developers.webflow.com/docs/models#validation
 */
class Validation
{
	/**
	 * @param null|array<mixed,mixed> $options
	 * @param null|array<mixed,mixed> $pattern
	 * @param null|array<mixed,mixed> $messages
	 */
	public function __construct(
		public readonly ?int $maxLength = null,
		public readonly ?int $minLength = null,
		public readonly ?int $minimum = null,
		public readonly ?int $maximum = null,
		public readonly ?int $maxSize = null,
		public readonly ?int $decimalPlaces = null,
		public readonly ?bool $singleLine = null,
		public readonly ?array $options = null,
		public readonly ?string $format = null,
		public readonly ?int $precision = null,
		public readonly ?bool $allowNegative = null,
		public readonly ?string $collectionId = null,
		public readonly ?array $pattern = null,
		public readonly ?array $messages = null,
	) {
	}

	/**
	 * @param array<string,mixed> $data
	 */
	public static function createFromArray(?array $data): self
	{
		return new self(
			maxLength: $data['maxLength'] ?? null,
			minLength: $data['minLength'] ?? null,
			minimum: $data['minimum'] ?? null,
			maximum: $data['maximum'] ?? null,
			maxSize: $data['maxSize'] ?? null,
			decimalPlaces: $data['decimalPlaces'] ?? null,
			singleLine: $data['singleLine'] ?? null,
			options: $data['options'] ?? null,
			format: $data['format'] ?? null,
			precision: $data['precision'] ?? null,
			allowNegative: $data['allowNegative'] ?? null,
			collectionId: $data['collectionId'] ?? null,
			pattern: $data['pattern'] ?? null,
			messages: $data['messages'] ?? null,
		);
	}

	/**
	 * @return array<string,mixed>
	 */
	public function toArray(): array
	{
		$reflected = new ReflectionClass($this);
		$properties = $reflected->getProperties(ReflectionProperty::IS_PUBLIC);
		$data = [];

		foreach ($properties as $property) {
			$propertyName = $property->getName();

			if ($this->{$propertyName} !== null) {
				$data[$propertyName] = $this->{$propertyName};
			}
		}

		return $data;
	}
}
