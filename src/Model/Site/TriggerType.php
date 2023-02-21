<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Site;

use Koalati\Webflow\Model\Site\TriggerType\CollectionItemChanged;
use Koalati\Webflow\Model\Site\TriggerType\CollectionItemCreated;
use Koalati\Webflow\Model\Site\TriggerType\CollectionItemDeleted;
use Koalati\Webflow\Model\Site\TriggerType\CollectionItemUnpublished;
use Koalati\Webflow\Model\Site\TriggerType\EcommInventoryChanged;
use Koalati\Webflow\Model\Site\TriggerType\EcommNewOrder;
use Koalati\Webflow\Model\Site\TriggerType\EcommOrderChanged;
use Koalati\Webflow\Model\Site\TriggerType\FormSubmission;
use Koalati\Webflow\Model\Site\TriggerType\MembershipsUserAccountAdded;
use Koalati\Webflow\Model\Site\TriggerType\MembershipsUserAccountUpdated;
use Koalati\Webflow\Model\Site\TriggerType\SitePublish;

/**
 * @see https://developers.webflow.com/docs/models#triggertype
 */
abstract class TriggerType implements \Stringable
{
	public static function createFromName(string $triggerType): TriggerType
	{
		$classname = match($triggerType) {
			"form_submission" => FormSubmission::class,
			"site_publish" => SitePublish::class,
			"ecomm_new_order" => EcommNewOrder::class,
			"ecomm_order_changed" => EcommOrderChanged::class,
			"ecomm_inventory_changed" => EcommInventoryChanged::class,
			"memberships_user_account_added" => MembershipsUserAccountAdded::class,
			"memberships_user_account_updated" => MembershipsUserAccountUpdated::class,
			"collection_item_created" => CollectionItemCreated::class,
			"collection_item_changed" => CollectionItemChanged::class,
			"collection_item_deleted" => CollectionItemDeleted::class,
			"collection_item_unpublished" => CollectionItemUnpublished::class,
			default => throw new \InvalidArgumentException("Trigger type '{$triggerType}' is not supported. Are you sure it exists?")
		};

		return new $classname();
	}
}
