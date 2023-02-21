<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Site\TriggerType;

use Koalati\Webflow\Model\Site\TriggerType;

/**
 * @see https://developers.webflow.com/docs/models#triggertype
 */
class SitePublish extends TriggerType
{
	public function __toString()
	{
		return "site_publish";
	}
}
