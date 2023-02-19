<?php

declare(strict_types=1);

namespace Koalati\Tests\Webflow\Model\Meta;

use Koalati\Webflow\Model\Meta\Authorization;

class AuthorizationTest extends \PHPUnit\Framework\TestCase
{
	protected Authorization $model;

	protected function setUp(): void
	{
		$this->model = Authorization::createFromArray(self::sampleData());
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
		return [
			'_id' => '55818d58616600637b9a5786',
			'createdOn' => '2016-10-03T23:12:00.755Z',
			'grantType' => 'authorization_code',
			'lastUsed' => '2016-10-10T21:41:12.736Z',
			'sites' => [
				'62f3b1f7eafac55d0c64ef91',
			],
			'orgs' => [
				'551ad253f0a9c0686f71ed08',
			],
			'workspaces' => [],
			'users' => [
				'545bbecb7bdd6769632504a7',
			],
			'rateLimit' => 60,
			'status' => 'confirmed',
			'application' => [
				'_id' => '55131cd036c09f7d07883dfc',
				'description' => 'OAuth Testing Application',
				'homepage' => 'https://webflow.com',
				'name' => 'Test App',
				'owner' => '545bbecb7bdd6769632504a7',
				'ownerType' => 'Person',
			],
		];
	}
}
