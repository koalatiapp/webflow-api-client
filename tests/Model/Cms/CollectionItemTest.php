<?php

declare(strict_types=1);

namespace Koalati\Tests\Webflow\Model\Cms;

use Koalati\Webflow\Model\Cms\CollectionItem;

class CollectionItemTest extends \PHPUnit\Framework\TestCase
{
	protected CollectionItem $model;

	protected function setUp(): void
	{
		$this->model = CollectionItem::createFromArray(self::sampleData());
	}

	public function testToArray(): void
	{
		$this->assertEquals(self::sampleData(), $this->model->toArray(), "Converts back to an array matching Webflow's expected format.");
	}

	public function testGetNonMetadataFields(): void
	{
		$this->assertEquals(
			[
				'_archived' => false,
				'_draft' => false,
				'color' => '#a98080',
				'name' => 'Exciting blog post title',
				'post-body' => '<p>Blog post contents...</p>',
				'post-summary' => 'Summary of exciting blog post',
				'main-image' => [
					'fileId' => '580e63fe8c9a982ac9b8b749',
					'url' => 'https://d1otoma47x30pg.cloudfront.net/580e63fc8c9a982ac9b8b744/580e63fe8c9a982ac9b8b749_1477338110257-image20.jpg',
				],
				'slug' => 'exciting-post',
				'author' => '580e640c8c9a982ac9b8b778',
			], $this->model->getNonMetadataFields());
	}

	public function testGetChangeset(): void
	{
		$this->model->name = "Updated";
		$this->model->draft = true;
		
		$this->assertEquals(["name" => "Updated", "_draft" => true], $this->model->getChangeset());
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

		return $mockResponses['/collections/580e63fc8c9a982ac9b8b745/items']['GET']['items'][0];
	}
}
