<?php

declare(strict_types=1);

namespace Koalati\Tests\Webflow\Model\Cms;

use Koalati\Webflow\Model\Membership\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
	protected User $model;

	protected function setUp(): void
	{
		$this->model = User::createFromArray(self::sampleData());
	}

	public function testGetChangeset(): void
	{
		$this->model->setData('name', 'John Doe');

		$this->assertEquals([
			'name' => 'John Doe',
		], $this->model->getChangeset());
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

		return $mockResponses['/sites/580e63e98c9a982ac9b8b741/users/6287ec36a841b25637c663df']['GET'];
	}
}
