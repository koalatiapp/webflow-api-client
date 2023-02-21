<?php

declare(strict_types=1);

namespace Koalati\Tests\Webflow\Model\Site;

use Koalati\Webflow\Model\Site\Site;

class SiteTest extends \PHPUnit\Framework\TestCase
{
	protected Site $model;

	protected function setUp(): void
	{
		$this->model = Site::createFromArray(self::sampleData());
	}

	public function testToArray(): void
	{
		$this->assertEqualsCanonicalizing(self::sampleData(), $this->model->toArray(), "Converts back to an array matching Webflow's expected format.");
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

		return $mockResponses['/sites/580e63e98c9a982ac9b8b741']['GET'];
	}
}
