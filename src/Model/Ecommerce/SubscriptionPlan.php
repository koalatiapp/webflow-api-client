<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Ecommerce;

/**
 * This model provides an easy way to create and interact with the subscription
 * plans for product SKUs.
 */
class SubscriptionPlan
{
	public const INTERVAL_DAY = 'day';

	public const INTERVAL_WEEK = 'week';

	public const INTERVAL_MONTH = 'month';

	public const INTERVAL_YEAR = 'year';

	/**
	 * @param string $interval		Billing interval unit (use the `SubscriptionPlan::INTERVAL_` constants)
	 * @param integer $frequency	Billing interval frequency
	 * @param mixed $trial			This is returned by Webflow, but it is not documented. Update at your own risk (we recommend leaving the default value).
	 * @param mixed $plans			This is returned by Webflow, but it is not documented. Update at your own risk (we recommend leaving the default value).
	 */
	public function __construct(
		public string $interval = self::INTERVAL_MONTH,
		public int $frequency = 1,
		public mixed $trial = null,
		public mixed $plans = [],
	) {
	}

	/**
	 * @param array<string,mixed> $data
	 */
	public static function createFromArray(array $data): self
	{
		return new self(
			$data['interval'],
			$data['frequency'],
			$data['trial'],
			$data['plans'],
		);
	}

	/**
	 * @return array<string,mixed>
	 */
	public function toArray(): array
	{
		return [
			'interval' => $this->interval,
			'frequency' => $this->frequency,
			'trial' => $this->trial,
			'plans' => $this->plans,
		];
	}
}
