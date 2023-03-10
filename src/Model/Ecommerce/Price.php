<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Ecommerce;

/**
 * @see https://developers.webflow.com/docs/models#price
 */
class Price
{
	/**
	 * @param string $unit		Currency code (ex.: `USD`, `CAD`, etc.)
	 * @param integer $value 	Value of the price in the smallest unit of the defined currency (e.g. dollar amounts are defined in cents)
	 */
	public function __construct(
		public string $unit,
		public int $value,
	) {
	}

	public static function createFromArray(array $data): self
	{
		return new self(
			$data['unit'],
			$data['value'],
		);
	}

	public function toArray(): array
	{
		return [
			'unit' => $this->unit,
			'value' => $this->value,
		];
	}
}
