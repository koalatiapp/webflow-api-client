<?php

declare(strict_types=1);

namespace Koalati\Tests\Webflow\Model\Meta;

use Koalati\Webflow\Model\Meta\Application;

class ApplicationTest extends \PHPUnit\Framework\TestCase
{
	protected Application $model;

	protected function setUp(): void
	{
		$this->model = Application::createFromArray(self::sampleData());
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
		return [
			'_id' => '55131cd036c09f7d07883dfc',
			'description' => 'OAuth Testing Application',
			'homepage' => 'https://webflow.com',
			'name' => 'Test App',
			'owner' => '545bbecb7bdd6769632504a7',
			'ownerType' => 'Person',
		];
	}
}
