<?php

declare(strict_types=1);

namespace Koalati\Tests\Webflow\Model\Cms;

use Koalati\Webflow\Model\Cms\Collection;

class CollectionTest extends \PHPUnit\Framework\TestCase
{
	protected Collection $model;

	protected function setUp(): void
	{
		$this->model = Collection::createFromArray(self::sampleData());
	}

	public function testToArray(): void
	{
		$this->assertEquals(self::sampleData(), $this->model->toArray(), "Converts back to an array matching Webflow's expected format.");
	}

	/**
	 * An array of sample data taken directly from Webflow's API documentation
	 * for this model.
	 *
	 * @see https://developers.webflow.com/reference
	 */
	protected static function sampleData(): array
	{
		$mockResponses = include(__DIR__ . '/../../sample_data.php');

		return $mockResponses['/collections/580e63fc8c9a982ac9b8b745']['GET'];
	}
}
