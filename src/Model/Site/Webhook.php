<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Site;

use DateTimeInterface;
use Koalati\Webflow\Model\AbstractWebflowModel;
use Koalati\Webflow\Util\Date;

/**
 * @see https://developers.webflow.com/docs/models#webhook
 */
class Webhook extends AbstractWebflowModel
{
	/**
	 * Unique identifier for a webhook
	 */
	public ?string $id = null;

	/**
	 * Unique identifier for a Site
	 */
	public ?string $site = null;

	/**
	 * An instance of the TriggerType object.
	 */
	public readonly TriggerType $triggerType;

	/**
	 * Unique identifier for the Webhook Trigger.
	 */
	public ?string $triggerId = null;

	/**
	 * Date trigger was last used
	 */
	public ?DateTimeInterface $lastUsed = null;

	/**
	 * Date trigger was created
	 */
	public ?DateTimeInterface $createdOn = null;

	/**
	 * @param string $triggerType				Name of the event that triggers the Webhook.
	 * @param string $url						URL to trigger with the Webhook.
	 * @param array<string,string> $filter		Filter for selecting which events you want webhooks to be triggered for.
	 */
	public function __construct(
		string $triggerType,
		public readonly string $url,
		public readonly ?array $filter = null,
	) {
		$this->triggerType = TriggerType::createFromName($triggerType);
	}

	public static function createFromArray(array $data): self
	{
		$webhook = new self($data['triggerType'], $data['url'], $data['filter'] ?? null);
		$webhook->id = $data['_id'];
		$webhook->site = $data['site'];
		$webhook->triggerId = $data['triggerId'];
		$webhook->lastUsed = ($data['lastUsed'] ?? null) ? Date::parse($data['lastUsed']) : null;
		$webhook->createdOn = Date::parse($data['createdOn']);

		return $webhook;
	}

	public function toArray(): array
	{
		$data = [
			'_id' => $this->id,
			'site' => $this->site,
			'triggerType' => $this->triggerType,
			'triggerId' => $this->triggerId,
		];

		if ($this->createdOn) {
			$data['createDOn'] = Date::format($this->createdOn);
		}

		if ($this->lastUsed) {
			$data['lastUsed'] = Date::format($this->lastUsed);
		}

		return $data;
	}

	public function getId(): ?string
	{
		return $this->id;
	}
}
