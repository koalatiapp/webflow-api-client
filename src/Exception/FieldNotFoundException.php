<?php

namespace Koalati\Webflow\Exception;

class FieldNotFoundException extends \Exception
{
	public function __construct(string $fieldKey, string $collectionId)
	{
		parent::__construct("No collection field was found for ID/slug/name '{$fieldKey}' on collection {$collectionId}.");
	}
}