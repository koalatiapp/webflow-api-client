<?php

namespace Koalati\Webflow\Exception;

class FieldsNotLoadedException extends \Exception
{
	public function __construct(string $fieldKey, string $collectionId)
	{
		parent::__construct("Attempted to get field '{$fieldKey}' on collection {$collectionId}'s listing record, but the fields were not loaded. Collection fields are only present when you load a collection with Client::getCollection().");
	}
}