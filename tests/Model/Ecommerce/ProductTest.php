<?php

declare(strict_types=1);

namespace Koalati\Tests\Webflow\Model\Ecommerce;

use Koalati\Webflow\Model\Ecommerce\Product;

class ProductTest extends \PHPUnit\Framework\TestCase
{
	protected Product $model;

	protected function setUp(): void
	{
		$this->model = Product::createFromArray(self::sampleData());
	}

	public function testToArray(): void
	{
		$this->assertEquals(self::sampleData(), $this->model->toArray(), "Converts back to an array matching Webflow's expected format.");
	}

	public function testGetChangeset(): void
	{
		$this->model->draft = true;
		$this->model->setField('color', 'Blue');

		$this->assertEquals([
			'_draft' => true,
			'color' => 'Blue',
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

		return $mockResponses['/sites/580e63e98c9a982ac9b8b741/products/5e8518536e147040726cc416']['GET']['items'][0]['product'];
	}
}
