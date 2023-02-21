<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Site\TriggerType;

use Koalati\Webflow\Model\Site\TriggerType;

/**
 * @see https://developers.webflow.com/docs/models#triggertype
 */
class MembershipsUserAccountUpdated extends TriggerType
{
	public function __toString()
	{
		return 'membeships_user_account_updated';
	}
}
