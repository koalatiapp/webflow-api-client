<?php

declare(strict_types=1);

namespace Koalati\Tests\Webflow\Model\Meta;

use Koalati\Webflow\Model\Meta\AuthorizedUser;

class AuthorizedUserTest extends \PHPUnit\Framework\TestCase
{
	protected AuthorizedUser $model;

	protected function setUp(): void
	{
		$this->model = AuthorizedUser::createFromArray(self::sampleData());
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
			'_id' => '545bbecb7bdd6769632504a7',
			'email' => 'some@email.com',
			'firstName' => 'Some',
			'lastName' => 'One',
		];
	}
}
