<?php

declare(strict_types=1);

/**
 * This file maps sample API responses for each available endpoint and methods.
 *
 * These sample responses are used for unit tests (ex.: `tests/Api/ClientTest.php`).
 *
 * These examples come straight from Webflow's own reference document, and
 * should be kept up to date as much as possible to ensure the API client's
 * tests remain relevant and accurate.
 *
 * However, please note that Webflow's documented responses were invalid or
 * inaccurate in many cases, so adjustments were made in certain response
 * formats, based on real-life tests of the Webflow API.
 *
 * Format:
 * - Endpoint
 * 	 - Method
 * 		 - Response array
 *
 * @see https://developers.webflow.com/reference
 */

return [
	'/user' => [
		'GET' => [
			'user' => [
				'_id' => '545bbecb7bdd6769632504a7',
				'email' => 'some@email.com',
				'firstName' => 'Some',
				'lastName' => 'One',
			],
		],
	],

	'/info' => [
		'GET' => [
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
		],
	],

	'/sites' => [
		'GET' => [
			[
				'_id' => '580e63e98c9a982ac9b8b741',
				'createdOn' => '2016-10-24T19:41:29.156Z',
				'name' => 'api_docs_sample_json',
				'shortName' => 'api-docs-sample-json',
				'lastPublished' => '2016-10-24T23:06:51.251Z',
				'previewUrl' => 'https://d1otoma47x30pg.cloudfront.net/580e63e98c9a982ac9b8b741/201610241603.png',
				'timezone' => 'America/Los_Angeles',
				'database' => '580e63fc8c9a982ac9b8b744',
			],
			[
				'_id' => '580ff8c3ba3e45ba9fe588bb',
				'createdOn' => '2016-10-26T00:28:54.191Z',
				'name' => 'Copy of api_docs_sample_json',
				'shortName' => 'api-docs-sample-json-086c6538f9b0583762',
				'lastPublished' => null,
				'previewUrl' => 'https://d1otoma47x30pg.cloudfront.net/580e63e98c9a982ac9b8b741/201610241603.png',
				'timezone' => 'America/Los_Angeles',
				'database' => '580ff8c3ba3e45ba9fe588bf',
			],
			[
				'_id' => '580ff8d7ba3e45ba9fe588e9',
				'createdOn' => '2016-10-26T00:29:13.634Z',
				'name' => 'Copy of api_docs_sample_json',
				'shortName' => 'api-docs-sample-json-ce077aa6c5cd3e0177',
				'lastPublished' => null,
				'previewUrl' => 'https://d1otoma47x30pg.cloudfront.net/580e63e98c9a982ac9b8b741/201610241603.png',
				'timezone' => 'America/Los_Angeles',
				'database' => '580ff8d7ba3e45ba9fe588ed',
			],
		],
	],

	'/sites/580e63e98c9a982ac9b8b741' => [
		'GET' => [
			'_id' => '580e63e98c9a982ac9b8b741',
			'createdOn' => '2016-10-24T19:41:29.156Z',
			'name' => 'api_docs_sample_json',
			'shortName' => 'api-docs-sample-json',
			'lastPublished' => '2016-10-24T19:43:17.271Z',
			'previewUrl' => 'https://d1otoma47x30pg.cloudfront.net/580e63e98c9a982ac9b8b741/201610241243.png',
			'timezone' => 'America/Los_Angeles',
			'database' => '580e63fc8c9a982ac9b8b744',
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/publish' => [
		'POST' => [
			'queued' => true,
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/domains' => [
		'GET' => [
			[
				'_id' => '589a331aa51e760df7ccb89d',
				'name' => 'test-api-domain.com',
			],
			[
				'_id' => '589a331aa51e760df7ccb89e',
				'name' => 'www.test-api-domain.com',
			],
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/webhooks' => [
		'GET' => [
			[
				'_id' => '57ca0a9e418c504a6e1acbb6',
				'triggerType' => 'form_submission',
				'triggerId' => '562ac0395358780a1f5e6fbd',
				'site' => '562ac0395358780a1f5e6fbd',
				'url' => 'https://acme.co/webhook',
				'lastUsed' => '2016-09-06T21:12:22.148Z',
				'createdOn' => '2016-09-02T23:26:22.241Z',
			],
			[
				'_id' => '578d85cce0c47cd2865f4cf2',
				'triggerType' => 'form_submission',
				'triggerId' => '562ac0395358780a1f5e6fbd',
				'site' => '562ac0395358780a1f5e6fbd',
				'url' => 'https://acme.co/webhook',
				'filter' => [
					'name' => 'Email Form',
				],
				'createdOn' => '2016-07-19T01:43:40.585Z',
			],
		],

		'POST' => [
			'_id' => '582266e0cd48de0f0e3c6d8b',
			'triggerType' => 'form_submission',
			'triggerId' => '562ac0395358780a1f5e6fbd',
			'url' => 'https://acme.co/webhook',
			'site' => '580e63e98c9a982ac9b8b741',
			'createdOn' => '2016-11-08T23:59:28.572Z',
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/webhooks/57ca0a9e418c504a6e1acbb6' => [
		'GET' => [
			'_id' => '57ca0a9e418c504a6e1acbb6',
			'triggerType' => 'form_submission',
			'triggerId' => '562ac0395358780a1f5e6fbd',
			'site' => '562ac0395358780a1f5e6fbd',
			'url' => 'https://acme.co/webhook',
			'lastUsed' => '2016-09-06T21:12:22.148Z',
			'createdOn' => '2016-09-02T23:26:22.241Z',
		],

		'DELETE' => [
			'deleted' => 1,
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/collections' => [
		'GET' => [
			[
				'_id' => '580e63fc8c9a982ac9b8b745',
				'lastUpdated' => '2016-10-24T19:42:38.929Z',
				'createdOn' => '2016-10-24T19:41:48.349Z',
				'name' => 'Blog Posts',
				'slug' => 'post',
				'singularName' => 'Blog Post',
			],
			[
				'_id' => '580e64088c9a982ac9b8b766',
				'lastUpdated' => '2016-10-24T19:42:00.799Z',
				'createdOn' => '2016-10-24T19:42:00.777Z',
				'name' => 'Authors',
				'slug' => 'author',
				'singularName' => 'Author',
			],
		],
	],

	'/collections/580e63fc8c9a982ac9b8b745' => [
		'GET' => [
			'_id' => '580e63fc8c9a982ac9b8b745',
			'lastUpdated' => '2016-10-24T19:42:38.929Z',
			'createdOn' => '2016-10-24T19:41:48.349Z',
			'name' => 'Blog Posts',
			'slug' => 'post',
			'singularName' => 'Blog Post',
			'fields' => [
				[
					'id' => '7f62a9781291109b9e428fb47239fd35',
					'editable' => true,
					'required' => false,
					'type' => 'RichText',
					'slug' => 'post-body',
					'name' => 'Post Body',
				],
				[
					'validations' => [
						'singleLine' => false,
					],
					'id' => 'ac4ffead755a78c710c44042f528b073',
					'helpText' => 'A summary of the blog post that appears on blog post grid',
					'editable' => true,
					'required' => false,
					'type' => 'PlainText',
					'slug' => 'post-summary',
					'name' => 'Post Summary',
				],
				[
					'id' => 'ba1cfbdaa6b38b8e95e9b5063da8a5bd',
					'editable' => true,
					'required' => false,
					'type' => 'ImageRef',
					'slug' => 'main-image',
					'name' => 'Main Image',
				],
				[
					'id' => 'a8c6ea29b08cc5b5ef966908fa1deae2',
					'helpText' => 'Smaller version of main image that is used on blog post grid',
					'editable' => true,
					'required' => false,
					'type' => 'ImageRef',
					'slug' => 'thumbnail-image',
					'name' => 'Thumbnail image',
				],
				[
					'id' => '87e79a644a6fb5729940ec24e0012f01',
					'editable' => true,
					'required' => false,
					'type' => 'Set',
					'innerType' => 'ImageRef',
					'slug' => 'picture-gallery',
					'name' => 'Picture Gallery',
				],
				[
					'id' => '1e54974d97181032d3206ea021668e5f',
					'editable' => true,
					'required' => false,
					'type' => 'Bool',
					'slug' => 'featured',
					'name' => 'Featured?',
				],
				[
					'id' => '648463cbc042ab079c2b99430a398ae5',
					'editable' => true,
					'required' => false,
					'type' => 'Color',
					'slug' => 'color',
					'name' => 'Color',
				],
				[
					'validations' => [
						'collectionId' => '580e64088c9a982ac9b8b766',
					],
					'id' => 'ea9067c48edee510de71fe503fa2fb51',
					'editable' => true,
					'required' => false,
					'type' => 'ItemRef',
					'slug' => 'author',
					'name' => 'Author',
				],
				[
					'validations' => [
						'maxLength' => 256,
					],
					'id' => '60c0667e27b6d5a6daedec3a641265f6',
					'editable' => true,
					'required' => true,
					'type' => 'PlainText',
					'slug' => 'name',
					'name' => 'Name',
				],
				[
					'validations' => [
						'messages' => [
							'maxLength' => 'Must be less than 256 characters',
							'pattern' => 'Must be alphanumerical and not contain any spaces or special characters',
						],
						'pattern' => [],
						'maxLength' => 256,
					],
					'id' => '8f0c953df91d10b767d66e1d7d00d631',
					'unique' => true,
					'editable' => true,
					'required' => true,
					'type' => 'PlainText',
					'slug' => 'slug',
					'name' => 'Slug',
				],
				[
					'default' => false,
					'id' => 'e4e92e700d70faffac6fa82ff2bfaece',
					'editable' => true,
					'required' => true,
					'type' => 'Bool',
					'slug' => '_archived',
					'name' => 'Archived',
				],
				[
					'default' => false,
					'id' => 'f2675b2ac4fcef746b24d4a320887ef8',
					'editable' => true,
					'required' => true,
					'type' => 'Bool',
					'slug' => '_draft',
					'name' => 'Draft',
				],
				[
					'id' => '0913a35d92208bdf8fbf3ed1e39b771e',
					'editable' => false,
					'required' => false,
					'type' => 'Date',
					'slug' => 'created-on',
					'name' => 'Created On',
				],
				[
					'id' => '3de04889465fe6d718e47b152ef5bb4d',
					'editable' => false,
					'required' => false,
					'type' => 'Date',
					'slug' => 'updated-on',
					'name' => 'Updated On',
				],
				[
					'id' => '2a3cd866d5dbb294896130b233218626',
					'editable' => false,
					'required' => false,
					'type' => 'Date',
					'slug' => 'published-on',
					'name' => 'Published On',
				],
				[
					'id' => '62c18561b9e89517751c6d8712d48f91',
					'editable' => false,
					'required' => false,
					'type' => 'User',
					'slug' => 'created-by',
					'name' => 'Created By',
				],
				[
					'id' => '50918093b4e4d4eca1e83c25bcdc06a4',
					'editable' => false,
					'required' => false,
					'type' => 'User',
					'slug' => 'updated-by',
					'name' => 'Updated By',
				],
				[
					'id' => '5c4587f18b32ef245daeaadfcba7860b',
					'editable' => false,
					'required' => false,
					'type' => 'User',
					'slug' => 'published-by',
					'name' => 'Published By',
				],
			],
		],
	],

	'/collections/580e63fc8c9a982ac9b8b745/items' => [
		'GET' => [
			'items' => [
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
					'updated-on' => '2016-11-15T22:45:32.647Z',
					'updated-by' => 'Person_5660c5338e9d3b0bee3b86aa',
					'created-on' => '2016-11-15T22:45:32.647Z',
					'created-by' => 'Person_5660c5338e9d3b0bee3b86aa',
					'published-on' => null,
					'published-by' => null,
					'_cid' => '580e63fc8c9a982ac9b8b745',
					'_id' => '580e64008c9a982ac9b8b754',
				],
			],
			'count' => 1,
			'limit' => 1,
			'offset' => 0,
			'total' => 5,
		],

		'DELETE' => [
			'deletedItemIds' => [
				'62aa37923cf7a9de1ca4469c',
				'62aa37923cf7a9de1ca44697',
				'62aa37923cf7a9de1ca44696',
			],
			'errors' => [],
		],

		'POST' => [
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
			'updated-on' => '2016-11-15T22:45:32.647Z',
			'updated-by' => 'Person_5660c5338e9d3b0bee3b86aa',
			'created-on' => '2016-11-15T22:45:32.647Z',
			'created-by' => 'Person_5660c5338e9d3b0bee3b86aa',
			'published-on' => null,
			'published-by' => null,
			'_cid' => '580e63fc8c9a982ac9b8b745',
			'_id' => '580e64008c9a982ac9b8b754',
		],
	],

	'/collections/580e63fc8c9a982ac9b8b745/items/publish' => [
		'PUT' => [
			'publishedItemIds' => [
				'62aa37923cf7a9de1ca4469c',
				'62aa37923cf7a9de1ca44697',
				'62aa37923cf7a9de1ca44696',
			],
			'errors' => [],
		],
	],

	'/collections/580e63fc8c9a982ac9b8b745/items/580e64008c9a982ac9b8b754' => [
		'GET' => [
			'items' => [
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
					'updated-on' => '2016-11-15T22:45:32.647Z',
					'updated-by' => 'Person_5660c5338e9d3b0bee3b86aa',
					'created-on' => '2016-11-15T22:45:32.647Z',
					'created-by' => 'Person_5660c5338e9d3b0bee3b86aa',
					'published-on' => null,
					'published-by' => null,
					'_cid' => '580e63fc8c9a982ac9b8b745',
					'_id' => '580e64008c9a982ac9b8b754',
				],
			],
			'count' => 1,
			'limit' => 1,
			'offset' => 0,
			'total' => 5,
		],

		'PUT' => [
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
			'updated-on' => '2016-11-15T22:45:32.647Z',
			'updated-by' => 'Person_5660c5338e9d3b0bee3b86aa',
			'created-on' => '2016-11-15T22:45:32.647Z',
			'created-by' => 'Person_5660c5338e9d3b0bee3b86aa',
			'published-on' => null,
			'published-by' => null,
			'_cid' => '580e63fc8c9a982ac9b8b745',
			'_id' => '580e64008c9a982ac9b8b754',
		],

		'PATCH' => [
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
			'updated-on' => '2016-11-15T22:45:32.647Z',
			'updated-by' => 'Person_5660c5338e9d3b0bee3b86aa',
			'created-on' => '2016-11-15T22:45:32.647Z',
			'created-by' => 'Person_5660c5338e9d3b0bee3b86aa',
			'published-on' => null,
			'published-by' => null,
			'_cid' => '580e63fc8c9a982ac9b8b745',
			'_id' => '580e64008c9a982ac9b8b754',
		],

		'DELETE' => [
			'deleted' => 1,
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/products' => [
		'GET' => [
			'items' => [
				[
					'product' => [
						'shippable' => true,
						'_archived' => false,
						'_draft' => false,
						'name' => 'Cloak Of Invisibility',
						'ec-product-type' => 'ff42fee0113744f693a764e3431a9cc2',
						'sku-properties' => [
							[
								'id' => 'a37a7991f7ca1be0d349a805a2bddb5b',
								'name' => 'Color',
								'enum' => [
									[
										'id' => 'a9506da8e70a8b087f35a4094ec34a53',
										'name' => 'Obsidian Black',
										'slug' => 'obsidian-black',
									],
									[
										'id' => 'c92a465a1298c95fd1cd7f4c1c96c2ba',
										'name' => 'Smoke Grey',
										'slug' => 'smoke-grey',
									],
									[
										'id' => 'ef9511c0b56cc11ff47c5669f65030b4',
										'name' => 'Forest Green',
										'slug' => 'forest-green',
									],
								],
							],
						],
						'description' => 'A cloak that renders the wearer invisible to the eye.',
						'slug' => 'cloak-of-invisibility-1',
						'updated-on' => '2020-04-01T22:40:19.329Z',
						'updated-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
						'created-on' => '2020-04-01T22:40:17.602Z',
						'created-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
						'published-on' => null,
						'published-by' => null,
						'default-sku' => '5e8518536e147040726cc416',
						'_cid' => '5dd44c493543b37d5449b3a5',
						'_id' => '5e8518516e147040726cc415',
					],
					'skus' => [
						[
							'price' => [
								'unit' => 'USD',
								'value' => 120000,
							],
							'_archived' => false,
							'_draft' => false,
							'sku-values' => [],
							'width' => 56,
							'length' => 0.3,
							'height' => 72,
							'weight' => 24,
							'name' => 'Cloak Of Invisibility Color: Obsidian Black',
							'main-image' => [
								'fileId' => '5e85161dabd9ea4072cf1414',
								'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
								'alt' => null,
							],
							'more-images' => [
								[
									'fileId' => '5e85161dabd9ea4072cf1414',
									'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
									'alt' => null,
								],
								[
									'fileId' => '5e85161dabd9ea4072cf1414',
									'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
									'alt' => null,
								],
							],
							'download-files' => [
								[
									'id' => '5ebb1676c3244c2c6ae18814',
									'name' => 'The modern web design process - Webflow Ebook.pdf',
									'url' => 'https://dropbox.com/files/modern-web-design-process.pdf',
								],
							],
							'slug' => 'cloak-of-invisibility-color-obsidian-black-7',
							'product' => '5e8518516e147040726cc415',
							'updated-on' => '2020-04-01T22:40:19.287Z',
							'updated-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
							'created-on' => '2020-04-01T22:40:19.287Z',
							'created-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
							'published-on' => null,
							'published-by' => null,
							'_cid' => '5dd44c493543b37d5449b383',
							'_id' => '5e8518536e147040726cc416',
						],
					],
				],
			],
			'count' => 1,
			'limit' => 100,
			'offset' => 0,
			'total' => 12,
		],

		'POST' => [
			'product' => [
				'shippable' => true,
				'_archived' => false,
				'_draft' => false,
				'name' => 'Cloak Of Invisibility',
				'ec-product-type' => 'ff42fee0113744f693a764e3431a9cc2',
				'sku-properties' => [
					[
						'id' => 'a37a7991f7ca1be0d349a805a2bddb5b',
						'name' => 'Color',
						'enum' => [
							[
								'id' => 'a9506da8e70a8b087f35a4094ec34a53',
								'name' => 'Obsidian Black',
								'slug' => 'obsidian-black',
							],
							[
								'id' => 'c92a465a1298c95fd1cd7f4c1c96c2ba',
								'name' => 'Smoke Grey',
								'slug' => 'smoke-grey',
							],
							[
								'id' => 'ef9511c0b56cc11ff47c5669f65030b4',
								'name' => 'Forest Green',
								'slug' => 'forest-green',
							],
						],
					],
				],
				'description' => 'A cloak that renders the wearer invisible to the eye.',
				'slug' => 'cloak-of-invisibility-1',
				'default-sku' => '5e8518536e147040726cc416',
			],
			'sku' => [
				'price' => [
					'unit' => 'USD',
					'value' => 120000,
				],
				'_archived' => false,
				'_draft' => false,
				'sku-values' => [],
				'width' => 56,
				'length' => 0.3,
				'height' => 72,
				'weight' => 24,
				'name' => 'Cloak Of Invisibility Color: Obsidian Black',
				'main-image' => [
					'fileId' => '5e85161dabd9ea4072cf1414',
					'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
					'alt' => null,
				],
				'more-images' => [
					[
						'fileId' => '5e85161dabd9ea4072cf1414',
						'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
						'alt' => null,
					],
					[
						'fileId' => '5e85161dabd9ea4072cf1414',
						'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
						'alt' => null,
					],
				],
				'download-files' => [
					[
						'id' => '5ebb1676c3244c2c6ae18814',
						'name' => 'The modern web design process - Webflow Ebook.pdf',
						'url' => 'https://dropbox.com/files/modern-web-design-process.pdf',
					],
				],
				'slug' => 'cloak-of-invisibility-color-obsidian-black-7',
				'product' => '5e8518516e147040726cc415',
				'updated-on' => '2020-04-01T22:40:19.287Z',
				'updated-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
				'created-on' => '2020-04-01T22:40:19.287Z',
				'created-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
				'published-on' => null,
				'published-by' => null,
				'_cid' => '5dd44c493543b37d5449b383',
				'_id' => '5e8518536e147040726cc416',
			],
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/products/5e8518536e147040726cc416' => [
		'GET' => [
			'items' => [
				[
					'product' => [
						'shippable' => true,
						'_archived' => false,
						'_draft' => false,
						'name' => 'Cloak Of Invisibility',
						'ec-product-type' => 'ff42fee0113744f693a764e3431a9cc2',
						'sku-properties' => [
							[
								'id' => 'a37a7991f7ca1be0d349a805a2bddb5b',
								'name' => 'Color',
								'enum' => [
									[
										'id' => 'a9506da8e70a8b087f35a4094ec34a53',
										'name' => 'Obsidian Black',
										'slug' => 'obsidian-black',
									],
									[
										'id' => 'c92a465a1298c95fd1cd7f4c1c96c2ba',
										'name' => 'Smoke Grey',
										'slug' => 'smoke-grey',
									],
									[
										'id' => 'ef9511c0b56cc11ff47c5669f65030b4',
										'name' => 'Forest Green',
										'slug' => 'forest-green',
									],
								],
							],
						],
						'description' => 'A cloak that renders the wearer invisible to the eye.',
						'slug' => 'cloak-of-invisibility-1',
						'updated-on' => '2020-04-01T22:40:19.329Z',
						'updated-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
						'created-on' => '2020-04-01T22:40:17.602Z',
						'created-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
						'published-on' => null,
						'published-by' => null,
						'default-sku' => '5e8518536e147040726cc416',
						'_cid' => '5dd44c493543b37d5449b3a5',
						'_id' => '5e8518516e147040726cc415',
					],
					'skus' => [
						[
							'price' => [
								'unit' => 'USD',
								'value' => 120000,
							],
							'_archived' => false,
							'_draft' => false,
							'sku-values' => [],
							'width' => 56,
							'length' => 0.3,
							'height' => 72,
							'weight' => 24,
							'name' => 'Cloak Of Invisibility Color: Obsidian Black',
							'main-image' => [
								'fileId' => '5e85161dabd9ea4072cf1414',
								'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
								'alt' => null,
							],
							'more-images' => [
								[
									'fileId' => '5e85161dabd9ea4072cf1414',
									'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
									'alt' => null,
								],
								[
									'fileId' => '5e85161dabd9ea4072cf1414',
									'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
									'alt' => null,
								],
							],
							'download-files' => [
								[
									'id' => '5ebb1676c3244c2c6ae18814',
									'name' => 'The modern web design process - Webflow Ebook.pdf',
									'url' => 'https://dropbox.com/files/modern-web-design-process.pdf',
								],
							],
							'slug' => 'cloak-of-invisibility-color-obsidian-black-7',
							'product' => '5e8518516e147040726cc415',
							'updated-on' => '2020-04-01T22:40:19.287Z',
							'updated-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
							'created-on' => '2020-04-01T22:40:19.287Z',
							'created-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
							'published-on' => null,
							'published-by' => null,
							'_cid' => '5dd44c493543b37d5449b383',
							'_id' => '5e8518536e147040726cc416',
						],
					],
				],
			],
			'count' => 1,
			'limit' => 100,
			'offset' => 0,
			'total' => 12,
		],

		'PATCH' => [
			'fields' => [
				'shippable' => true,
				'_archived' => false,
				'_draft' => false,
				'name' => 'Cloak Of Invisibility',
				'ec-product-type' => 'ff42fee0113744f693a764e3431a9cc2',
				'sku-properties' => [
					[
						'id' => 'a37a7991f7ca1be0d349a805a2bddb5b',
						'name' => 'Color',
						'enum' => [
							[
								'id' => 'a9506da8e70a8b087f35a4094ec34a53',
								'name' => 'Obsidian Black',
								'slug' => 'obsidian-black',
							],
							[
								'id' => 'c92a465a1298c95fd1cd7f4c1c96c2ba',
								'name' => 'Smoke Grey',
								'slug' => 'smoke-grey',
							],
							[
								'id' => 'ef9511c0b56cc11ff47c5669f65030b4',
								'name' => 'Forest Green',
								'slug' => 'forest-green',
							],
						],
					],
				],
				'description' => 'A cloak that renders the wearer invisible to the eye.',
				'slug' => 'cloak-of-invisibility-1',
				'published-on' => null,
				'published-by' => null,
				'default-sku' => '5e8518536e147040726cc416',
			],
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/products/5e8518536e147040726cc416/skus' => [
		'POST' => [
			'skus' => [
				[
					'slug' => 'cloak-of-invisibility-color-smoke-grey',
					'_archived' => false,
					'_draft' => false,
					'price' => [
						'unit' => 'USD',
						'value' => 120000,
					],
					'more-images' => [],
					'download-files' => [
						[
							'id' => '5ebb1945c3244c2c6ae18822',
							'name' => 'The modern web design process - Webflow Ebook.pdf',
							'url' => 'https://dropbox.com/files/modern-web-design-process.pdf',
						],
					],
					'sku-values' => [
						'a37a7991f7ca1be0d349a805a2bddb5b' => 'c92a465a1298c95fd1cd7f4c1c96c2ba',
					],
					'width' => 56,
					'length' => 0.3,
					'height' => 72,
					'weight' => 24,
					'name' => 'Cloak Of Invisibility Color: Smoke Grey',
					'main-image' => [
						'fileId' => '5e8512181ae993035b15f315',
						'file' => [
							'_id' => '5e8512181ae993035b15f315',
							'variants' => [
								[
									'_id' => '5e85121b1ae993035b15f316',
									'origFileName' => 'external-content.duckduckgo.com-p-500.jpeg',
									'fileName' => '5e8512181ae993035b15f315_external-content.duckduckgo.com-p-500.jpeg',
									'format' => 'jpeg',
									'size' => 54068,
									'width' => 500,
									'quality' => 100,
									's3Url' => 'https://s3.amazonaws.com/webflow-dev-assets/5e8402eb8a402e354bd469bb/5e8512181ae993035b15f315_external-content.duckduckgo.com-p-500.jpeg',
								],
							],
							'origFileName' => 'invisibility_cloak.jpg',
							'fileName' => '5e8512181ae993035b15f315_external-content.duckduckgo.com.jpg',
							'fileHash' => '860b1b99ce90aa6c175bfcd9fd59fd42',
							's3Url' => 'https://s3.amazonaws.com/webflow-dev-assets/5e8402eb8a402e354bd469bb/5e8512181ae993035b15f315_external-content.duckduckgo.com.jpg',
							'mimeType' => 'image/jpeg',
							'size' => 192263,
							'width' => 550,
							'height' => 550,
							'database' => '5e8402eb8a402e354bd469bb',
							'createdOn' => '2020-04-01T22:13:44.889Z',
							'__v' => 1,
							'updatedOn' => '2020-04-01T22:13:59.777Z',
						],
						'fileSize' => 192263,
						'url' => 'https://d1otoma47x30pg.cloudfront.net/5e8402eb8a402e354bd469bb/5e8512181ae993035b15f315_external-content.duckduckgo.com.jpg',
						'alt' => null,
					],
					'product' => '5e8518516e147040726cc415',
					'updated-on' => '2020-04-03T18:50:45.947Z',
					'updated-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
					'created-on' => '2020-04-03T18:50:45.947Z',
					'created-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
					'published-on' => null,
					'published-by' => null,
					'_cid' => '5e8402eb8a402e354bd469be',
					'_id' => '5e8785855617d73f34627a93',
				],
				[
					'_archived' => false,
					'_draft' => false,
					'price' => [
						'unit' => 'USD',
						'value' => 120000,
					],
					'more-images' => [],
					'download-files' => [
						[
							'id' => '5ebb1945c3244c2c6ae18823',
							'name' => 'The modern web design process - Webflow Ebook.pdf',
							'url' => 'https://dropbox.com/files/modern-web-design-process.pdf',
						],
					],
					'sku-values' => [
						'a37a7991f7ca1be0d349a805a2bddb5b' => 'ef9511c0b56cc11ff47c5669f65030b4',
					],
					'width' => 56,
					'length' => 0.3,
					'height' => 72,
					'weight' => 24,
					'name' => 'Cloak Of Invisibility Color: Forest Green',
					'main-image' => [
						'fileId' => '5e8512181ae993035b15f315',
						'file' => [
							'_id' => '5e8512181ae993035b15f315',
							'variants' => [
								[
									'_id' => '5e85121b1ae993035b15f316',
									'origFileName' => 'external-content.duckduckgo.com-p-500.jpeg',
									'fileName' => '5e8512181ae993035b15f315_external-content.duckduckgo.com-p-500.jpeg',
									'format' => 'jpeg',
									'size' => 54068,
									'width' => 500,
									'quality' => 100,
									's3Url' => 'https://s3.amazonaws.com/webflow-dev-assets/5e8402eb8a402e354bd469bb/5e8512181ae993035b15f315_external-content.duckduckgo.com-p-500.jpeg',
								],
							],
							'origFileName' => 'invisibility_cloak.jpg',
							'fileName' => '5e8512181ae993035b15f315_external-content.duckduckgo.com.jpg',
							'fileHash' => '860b1b99ce90aa6c175bfcd9fd59fd42',
							's3Url' => 'https://s3.amazonaws.com/webflow-dev-assets/5e8402eb8a402e354bd469bb/5e8512181ae993035b15f315_external-content.duckduckgo.com.jpg',
							'mimeType' => 'image/jpeg',
							'size' => 192263,
							'width' => 550,
							'height' => 550,
							'database' => '5e8402eb8a402e354bd469bb',
							'createdOn' => '2020-04-01T22:13:44.889Z',
							'__v' => 1,
							'updatedOn' => '2020-04-01T22:13:59.777Z',
						],
						'fileSize' => 192263,
						'url' => 'https://d1otoma47x30pg.cloudfront.net/5e8402eb8a402e354bd469bb/5e8512181ae993035b15f315_external-content.duckduckgo.com.jpg',
						'alt' => null,
					],
					'slug' => 'cloak-of-invisibility-color-forest-green',
					'product' => '5e8518516e147040726cc415',
					'updated-on' => '2020-04-03T18:50:45.949Z',
					'updated-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
					'created-on' => '2020-04-03T18:50:45.949Z',
					'created-by' => 'Person_5d8fcb6d94dd1853060fb3b3',
					'published-on' => null,
					'published-by' => null,
					'_cid' => '5e8402eb8a402e354bd469be',
					'_id' => '5e8785855617d73f34627a94',
				],
			],
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/products/5e8518536e147040726cc416/skus/5e8518516e147040726cc415' => [
		'PATCH' => [
			'price' => [
				'unit' => 'USD',
				'value' => 120000,
			],
			'_archived' => false,
			'_draft' => false,
			'sku-values' => [],
			'width' => 56,
			'length' => 0.3,
			'height' => 72,
			'weight' => 24,
			'name' => 'Cloak Of Invisibility Color: Obsidian Black',
			'main-image' => [
				'fileId' => '5e85161dabd9ea4072cf1414',
				'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
				'alt' => null,
			],
			'more-images' => [
				[
					'fileId' => '5e85161dabd9ea4072cf1414',
					'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
					'alt' => null,
				],
				[
					'fileId' => '5e85161dabd9ea4072cf1414',
					'url' => 'https://d1otoma47x30pg.cloudfront.net/5d93ba5e38c6b0160ab711d6/5e85161dabd9ea4072cf1414_5e8512181ae993035b15f315_external-content.duckduckgo.com.jpeg',
					'alt' => null,
				],
			],
			'download-files' => [
				[
					'id' => '5ebb1676c3244c2c6ae18814',
					'name' => 'The modern web design process - Webflow Ebook.pdf',
					'url' => 'https://dropbox.com/files/modern-web-design-process.pdf',
				],
			],
			'slug' => 'cloak-of-invisibility-color-obsidian-black-7',
			'product' => '5e8518516e147040726cc415',
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/orders' => [
		'GET' => [
			[
				'orderId' => 'dfa-3f1',
				'status' => 'unfulfilled',
				'comment' => '',
				'orderComment' => '',
				'acceptedOn' => '2018-12-03T22:06:15.761Z',
				'disputedOn' => null,
				'disputeUpdatedOn' => null,
				'disputeLastStatus' => null,
				'fulfilledOn' => null,
				'refundedOn' => null,
				'customerPaid' => [
					'unit' => 'USD',
					'value' => 6099,
					'string' => '$60.99',
				],
				'netAmount' => [
					'unit' => 'USD',
					'value' => 5892,
					'string' => '$58.92',
				],
				'requiresShipping' => true,
				'shippingProvider' => null,
				'shippingTracking' => null,
				'customerInfo' => [
					'fullName' => 'Customerio Namen',
					'email' => 'renning+customer@webflow.com',
				],
				'allAddresses' => [
					[
						'type' => 'billing',
						'addressee' => 'Customerio Namen',
						'line1' => '123 Example Rd',
						'line2' => '',
						'city' => 'Examplesville',
						'state' => 'CA',
						'country' => 'US',
						'postalCode' => '90012',
					],
					[
						'type' => 'shipping',
						'addressee' => 'Customerio Namen',
						'line1' => '123 Example Rd',
						'line2' => '',
						'city' => 'Examplesville',
						'state' => 'CA',
						'country' => 'US',
						'postalCode' => '90012',
					],
				],
				'shippingAddress' => [
					'type' => 'shipping',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
				'billingAddress' => [
					'type' => 'billing',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
				'purchasedItems' => [
					[
						'count' => 1,
						'rowTotal' => [
							'unit' => 'USD',
							'value' => 5500,
							'string' => '$55.00',
						],
						'productId' => '5eb9fd05caef491eb9757183',
						'productName' => 'White Cup',
						'productSlug' => 'white-cup',
						'variantId' => '5eb9fcace279761d8199790c',
						'variantName' => 'white-cup_default_sku',
						'variantSlug' => 'white-cup-default-sku',
						'variantImage' => [
							'fileId' => '5bfedb42bab0ad90fa7dad2e',
							'url' => 'https://d1otoma47x30pg.cloudfront.net/5bfedb42bab0ad90fa7dac03/5bfedb42bab0ad90fa7dad2e_5bb3d019b3465c6e8a324dd7_458036-unsplas.png',
						],
						'variantPrice' => [
							'unit' => 'USD',
							'value' => 5500,
							'string' => '$55.00',
						],
						'height' => 7,
						'length' => 2,
						'weight' => 5,
						'width' => 4,
					],
				],
				'purchasedItemsCount' => 1,
				'stripeDetails' => [
					'refundReason' => null,
					'refundId' => null,
					'disputeId' => null,
					'chargeId' => 'ch_1DdPYQKMjGA7k9mI2AKiBY6u',
					'customerId' => 'cus_E5ajeiWNHEtcAW',
				],
				'stripeCard' => [
					'last4' => '4242',
					'brand' => 'Visa',
					'ownerName' => 'Customerio Namen',
					'expires' => [
						'year' => 2023,
						'month' => 12,
					],
				],
				'totals' => [
					'subtotal' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'extras' => [
						[
							'type' => 'tax',
							'name' => 'State Taxes',
							'description' => 'CA Taxes (6.25%)',
							'price' => [
								'unit' => 'USD',
								'value' => 344,
								'string' => '$3.44',
							],
						],
						[
							'type' => 'tax',
							'name' => 'County Taxes',
							'description' => 'LOS ANGELES Taxes (1.00%)',
							'price' => [
								'unit' => 'USD',
								'value' => 55,
								'string' => '$0.55',
							],
						],
						[
							'type' => 'tax',
							'name' => 'Special District Taxes',
							'description' => 'Special District Taxes (2.25%)',
							'price' => [
								'unit' => 'USD',
								'value' => 124,
								'string' => '$1.24',
							],
						],
						[
							'type' => 'shipping',
							'name' => 'Flat Rate',
							'description' => '',
							'price' => [
								'unit' => 'USD',
								'value' => 599,
								'string' => '$5.99',
							],
						],
						[
							'type' => 'discount-shipping',
							'name' => 'Free Shipping (SHIP4FREE)',
							'description' => '',
							'price' => [
								'unit' => 'USD',
								'value' => -599,
								'string' => '-$ 5.99 USD',
							],
						],
					],
					'total' => [
						'unit' => 'USD',
						'value' => 6023,
						'string' => '$60.23',
					],
				],
				'customData' => [
					[
						'textInput' => '(415) 123-4567',
						'name' => 'Telephone',
					],
					[
						'textArea' => 'Happy birthday Mom!',
						'name' => 'Gift note',
					],
					[
						'checkbox' => true,
						'name' => 'Send as gift',
					],
				],
				'downloadFiles' => [
					[
						'id' => '5e9a5eba75e0ac242e1b6f64',
						'name' => 'The modern web design process - Webflow Ebook.pdf',
						'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5eb1aac72912ec06f561278c;5e9a5eba75e0ac242e1b6f63:ka2nehxy:4a1ee0a632feaab94294350087215ed89533f2f530903e3b933b638940e921aa',
					],
					[
						'id' => '5e9a5eba75e0ac242e1b6f63',
						'name' => 'The freelance web designers guide - Webflow Ebook.pdf',
						'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5dd44c493543b37d5449b3cd;5e9a5eba75e0ac242e1b6f63:ka2nehxy:6af5adf7c6fff7a3b0f54404fac1be492ac6f1ed5340416f1fe27c5fd4dd8079',
					],
				],
			],
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/orders/dfa-3f1' => [
		'GET' => [
			'orderId' => 'dfa-3f1',
			'status' => 'unfulfilled',
			'comment' => '',
			'orderComment' => '',
			'acceptedOn' => '2018-12-03T22:06:15.761Z',
			'disputedOn' => null,
			'disputeUpdatedOn' => null,
			'disputeLastStatus' => null,
			'fulfilledOn' => null,
			'refundedOn' => null,
			'customerPaid' => [
				'unit' => 'USD',
				'value' => 6099,
				'string' => '$60.99',
			],
			'netAmount' => [
				'unit' => 'USD',
				'value' => 5892,
				'string' => '$58.92',
			],
			'requiresShipping' => true,
			'shippingProvider' => null,
			'shippingTracking' => null,
			'customerInfo' => [
				'fullName' => 'Customerio Namen',
				'email' => 'renning+customer@webflow.com',
			],
			'allAddresses' => [
				[
					'type' => 'billing',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
				[
					'type' => 'shipping',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
			],
			'shippingAddress' => [
				'type' => 'shipping',
				'addressee' => 'Customerio Namen',
				'line1' => '123 Example Rd',
				'line2' => '',
				'city' => 'Examplesville',
				'state' => 'CA',
				'country' => 'US',
				'postalCode' => '90012',
			],
			'billingAddress' => [
				'type' => 'billing',
				'addressee' => 'Customerio Namen',
				'line1' => '123 Example Rd',
				'line2' => '',
				'city' => 'Examplesville',
				'state' => 'CA',
				'country' => 'US',
				'postalCode' => '90012',
			],
			'purchasedItems' => [
				[
					'count' => 1,
					'rowTotal' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'productId' => '5eb9fd05caef491eb9757183',
					'productName' => 'White Cup',
					'productSlug' => 'white-cup',
					'variantId' => '5eb9fcace279761d8199790c',
					'variantName' => 'white-cup_default_sku',
					'variantSlug' => 'white-cup-default-sku',
					'variantImage' => [
						'fileId' => '5bfedb42bab0ad90fa7dad2e',
						'url' => 'https://d1otoma47x30pg.cloudfront.net/5bfedb42bab0ad90fa7dac03/5bfedb42bab0ad90fa7dad2e_5bb3d019b3465c6e8a324dd7_458036-unsplas.png',
					],
					'variantPrice' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'height' => 7,
					'length' => 2,
					'weight' => 5,
					'width' => 4,
				],
			],
			'purchasedItemsCount' => 1,
			'stripeDetails' => [
				'refundReason' => null,
				'refundId' => null,
				'disputeId' => null,
				'chargeId' => 'ch_1DdPYQKMjGA7k9mI2AKiBY6u',
				'customerId' => 'cus_E5ajeiWNHEtcAW',
			],
			'stripeCard' => [
				'last4' => '4242',
				'brand' => 'Visa',
				'ownerName' => 'Customerio Namen',
				'expires' => [
					'year' => 2023,
					'month' => 12,
				],
			],
			'totals' => [
				'subtotal' => [
					'unit' => 'USD',
					'value' => 5500,
					'string' => '$55.00',
				],
				'extras' => [
					[
						'type' => 'tax',
						'name' => 'State Taxes',
						'description' => 'CA Taxes (6.25%)',
						'price' => [
							'unit' => 'USD',
							'value' => 344,
							'string' => '$3.44',
						],
					],
					[
						'type' => 'tax',
						'name' => 'County Taxes',
						'description' => 'LOS ANGELES Taxes (1.00%)',
						'price' => [
							'unit' => 'USD',
							'value' => 55,
							'string' => '$0.55',
						],
					],
					[
						'type' => 'tax',
						'name' => 'Special District Taxes',
						'description' => 'Special District Taxes (2.25%)',
						'price' => [
							'unit' => 'USD',
							'value' => 124,
							'string' => '$1.24',
						],
					],
					[
						'type' => 'shipping',
						'name' => 'Flat Rate',
						'description' => '',
						'price' => [
							'unit' => 'USD',
							'value' => 599,
							'string' => '$5.99',
						],
					],
					[
						'type' => 'discount',
						'name' => 'Discount (SAVE5)',
						'description' => '',
						'price' => [
							'unit' => 'USD',
							'value' => -500,
							'string' => '-$ 5.00 USD',
						],
					],
				],
				'total' => [
					'unit' => 'USD',
					'value' => 6122,
					'string' => '$61.22',
				],
			],
			'customData' => [
				[
					'textInput' => '(415) 123-4567',
					'name' => 'Telephone',
				],
				[
					'textArea' => 'Happy birthday Mom!',
					'name' => 'Gift note',
				],
				[
					'checkbox' => true,
					'name' => 'Send as gift',
				],
			],
			'downloadFiles' => [
				[
					'id' => '5e9a5eba75e0ac242e1b6f64',
					'name' => 'The modern web design process - Webflow Ebook.pdf',
					'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5eb1aac72912ec06f561278c;5e9a5eba75e0ac242e1b6f63:ka2nehxy:4a1ee0a632feaab94294350087215ed89533f2f530903e3b933b638940e921aa',
				],
				[
					'id' => '5e9a5eba75e0ac242e1b6f63',
					'name' => 'The freelance web designers guide - Webflow Ebook.pdf',
					'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5dd44c493543b37d5449b3cd;5e9a5eba75e0ac242e1b6f63:ka2nehxy:6af5adf7c6fff7a3b0f54404fac1be492ac6f1ed5340416f1fe27c5fd4dd8079',
				],
			],
		],

		'PATCH' => [
			'orderId' => 'dfa-3f1',
			'status' => 'unfulfilled',
			'comment' => '',
			'orderComment' => '',
			'acceptedOn' => '2018-12-03T22:06:15.761Z',
			'disputedOn' => null,
			'disputeUpdatedOn' => null,
			'disputeLastStatus' => null,
			'fulfilledOn' => null,
			'refundedOn' => null,
			'customerPaid' => [
				'unit' => 'USD',
				'value' => 6099,
				'string' => '$60.99',
			],
			'netAmount' => [
				'unit' => 'USD',
				'value' => 5892,
				'string' => '$58.92',
			],
			'requiresShipping' => true,
			'shippingProvider' => null,
			'shippingTracking' => null,
			'customerInfo' => [
				'fullName' => 'Customerio Namen',
				'email' => 'renning+customer@webflow.com',
			],
			'allAddresses' => [
				[
					'type' => 'billing',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
				[
					'type' => 'shipping',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
			],
			'shippingAddress' => [
				'type' => 'shipping',
				'addressee' => 'Customerio Namen',
				'line1' => '123 Example Rd',
				'line2' => '',
				'city' => 'Examplesville',
				'state' => 'CA',
				'country' => 'US',
				'postalCode' => '90012',
			],
			'billingAddress' => [
				'type' => 'billing',
				'addressee' => 'Customerio Namen',
				'line1' => '123 Example Rd',
				'line2' => '',
				'city' => 'Examplesville',
				'state' => 'CA',
				'country' => 'US',
				'postalCode' => '90012',
			],
			'purchasedItems' => [
				[
					'count' => 1,
					'rowTotal' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'productId' => '5eb9fd05caef491eb9757183',
					'productName' => 'White Cup',
					'productSlug' => 'white-cup',
					'variantId' => '5eb9fcace279761d8199790c',
					'variantName' => 'white-cup_default_sku',
					'variantSlug' => 'white-cup-default-sku',
					'variantImage' => [
						'fileId' => '5bfedb42bab0ad90fa7dad2e',
						'url' => 'https://d1otoma47x30pg.cloudfront.net/5bfedb42bab0ad90fa7dac03/5bfedb42bab0ad90fa7dad2e_5bb3d019b3465c6e8a324dd7_458036-unsplas.png',
					],
					'variantPrice' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'height' => 7,
					'length' => 2,
					'weight' => 5,
					'width' => 4,
				],
			],
			'purchasedItemsCount' => 1,
			'stripeDetails' => [
				'refundReason' => null,
				'refundId' => null,
				'disputeId' => null,
				'chargeId' => 'ch_1DdPYQKMjGA7k9mI2AKiBY6u',
				'customerId' => 'cus_E5ajeiWNHEtcAW',
			],
			'stripeCard' => [
				'last4' => '4242',
				'brand' => 'Visa',
				'ownerName' => 'Customerio Namen',
				'expires' => [
					'year' => 2023,
					'month' => 12,
				],
			],
			'totals' => [
				'subtotal' => [
					'unit' => 'USD',
					'value' => 5500,
					'string' => '$55.00',
				],
				'extras' => [
					[
						'type' => 'tax',
						'name' => 'State Taxes',
						'description' => 'CA Taxes (6.25%)',
						'price' => [
							'unit' => 'USD',
							'value' => 344,
							'string' => '$3.44',
						],
					],
					[
						'type' => 'tax',
						'name' => 'County Taxes',
						'description' => 'LOS ANGELES Taxes (1.00%)',
						'price' => [
							'unit' => 'USD',
							'value' => 55,
							'string' => '$0.55',
						],
					],
					[
						'type' => 'tax',
						'name' => 'Special District Taxes',
						'description' => 'Special District Taxes (2.25%)',
						'price' => [
							'unit' => 'USD',
							'value' => 124,
							'string' => '$1.24',
						],
					],
					[
						'type' => 'shipping',
						'name' => 'Flat Rate',
						'description' => '',
						'price' => [
							'unit' => 'USD',
							'value' => 599,
							'string' => '$5.99',
						],
					],
					[
						'type' => 'discount',
						'name' => 'Discount (SAVE5)',
						'description' => '',
						'price' => [
							'unit' => 'USD',
							'value' => -500,
							'string' => '-$ 5.00 USD',
						],
					],
				],
				'total' => [
					'unit' => 'USD',
					'value' => 6122,
					'string' => '$61.22',
				],
			],
			'customData' => [
				[
					'textInput' => '(415) 123-4567',
					'name' => 'Telephone',
				],
				[
					'textArea' => 'Happy birthday Mom!',
					'name' => 'Gift note',
				],
				[
					'checkbox' => true,
					'name' => 'Send as gift',
				],
			],
			'downloadFiles' => [
				[
					'id' => '5e9a5eba75e0ac242e1b6f64',
					'name' => 'The modern web design process - Webflow Ebook.pdf',
					'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5eb1aac72912ec06f561278c;5e9a5eba75e0ac242e1b6f63:ka2nehxy:4a1ee0a632feaab94294350087215ed89533f2f530903e3b933b638940e921aa',
				],
				[
					'id' => '5e9a5eba75e0ac242e1b6f63',
					'name' => 'The freelance web designers guide - Webflow Ebook.pdf',
					'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5dd44c493543b37d5449b3cd;5e9a5eba75e0ac242e1b6f63:ka2nehxy:6af5adf7c6fff7a3b0f54404fac1be492ac6f1ed5340416f1fe27c5fd4dd8079',
				],
			],
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/orders/dfa-3f1/fulfill' => [
		'POST' => [
			'orderId' => 'dfa-3f1',
			'status' => 'unfulfilled',
			'comment' => '',
			'orderComment' => '',
			'acceptedOn' => '2018-12-03T22:06:15.761Z',
			'disputedOn' => null,
			'disputeUpdatedOn' => null,
			'disputeLastStatus' => null,
			'fulfilledOn' => null,
			'refundedOn' => null,
			'customerPaid' => [
				'unit' => 'USD',
				'value' => 6099,
				'string' => '$60.99',
			],
			'netAmount' => [
				'unit' => 'USD',
				'value' => 5892,
				'string' => '$58.92',
			],
			'requiresShipping' => true,
			'shippingProvider' => null,
			'shippingTracking' => null,
			'customerInfo' => [
				'fullName' => 'Customerio Namen',
				'email' => 'renning+customer@webflow.com',
			],
			'allAddresses' => [
				[
					'type' => 'billing',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
				[
					'type' => 'shipping',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
			],
			'shippingAddress' => [
				'type' => 'shipping',
				'addressee' => 'Customerio Namen',
				'line1' => '123 Example Rd',
				'line2' => '',
				'city' => 'Examplesville',
				'state' => 'CA',
				'country' => 'US',
				'postalCode' => '90012',
			],
			'billingAddress' => [
				'type' => 'billing',
				'addressee' => 'Customerio Namen',
				'line1' => '123 Example Rd',
				'line2' => '',
				'city' => 'Examplesville',
				'state' => 'CA',
				'country' => 'US',
				'postalCode' => '90012',
			],
			'purchasedItems' => [
				[
					'count' => 1,
					'rowTotal' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'productId' => '5eb9fd05caef491eb9757183',
					'productName' => 'White Cup',
					'productSlug' => 'white-cup',
					'variantId' => '5eb9fcace279761d8199790c',
					'variantName' => 'white-cup_default_sku',
					'variantSlug' => 'white-cup-default-sku',
					'variantImage' => [
						'fileId' => '5bfedb42bab0ad90fa7dad2e',
						'url' => 'https://d1otoma47x30pg.cloudfront.net/5bfedb42bab0ad90fa7dac03/5bfedb42bab0ad90fa7dad2e_5bb3d019b3465c6e8a324dd7_458036-unsplas.png',
					],
					'variantPrice' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'height' => 7,
					'length' => 2,
					'weight' => 5,
					'width' => 4,
				],
			],
			'purchasedItemsCount' => 1,
			'stripeDetails' => [
				'refundReason' => null,
				'refundId' => null,
				'disputeId' => null,
				'chargeId' => 'ch_1DdPYQKMjGA7k9mI2AKiBY6u',
				'customerId' => 'cus_E5ajeiWNHEtcAW',
			],
			'stripeCard' => [
				'last4' => '4242',
				'brand' => 'Visa',
				'ownerName' => 'Customerio Namen',
				'expires' => [
					'year' => 2023,
					'month' => 12,
				],
			],
			'totals' => [
				'subtotal' => [
					'unit' => 'USD',
					'value' => 5500,
					'string' => '$55.00',
				],
				'extras' => [
					[
						'type' => 'tax',
						'name' => 'State Taxes',
						'description' => 'CA Taxes (6.25%)',
						'price' => [
							'unit' => 'USD',
							'value' => 344,
							'string' => '$3.44',
						],
					],
					[
						'type' => 'tax',
						'name' => 'County Taxes',
						'description' => 'LOS ANGELES Taxes (1.00%)',
						'price' => [
							'unit' => 'USD',
							'value' => 55,
							'string' => '$0.55',
						],
					],
					[
						'type' => 'tax',
						'name' => 'Special District Taxes',
						'description' => 'Special District Taxes (2.25%)',
						'price' => [
							'unit' => 'USD',
							'value' => 124,
							'string' => '$1.24',
						],
					],
					[
						'type' => 'shipping',
						'name' => 'Flat Rate',
						'description' => '',
						'price' => [
							'unit' => 'USD',
							'value' => 599,
							'string' => '$5.99',
						],
					],
					[
						'type' => 'discount',
						'name' => 'Discount (SAVE5)',
						'description' => '',
						'price' => [
							'unit' => 'USD',
							'value' => -500,
							'string' => '-$ 5.00 USD',
						],
					],
				],
				'total' => [
					'unit' => 'USD',
					'value' => 6122,
					'string' => '$61.22',
				],
			],
			'customData' => [
				[
					'textInput' => '(415) 123-4567',
					'name' => 'Telephone',
				],
				[
					'textArea' => 'Happy birthday Mom!',
					'name' => 'Gift note',
				],
				[
					'checkbox' => true,
					'name' => 'Send as gift',
				],
			],
			'downloadFiles' => [
				[
					'id' => '5e9a5eba75e0ac242e1b6f64',
					'name' => 'The modern web design process - Webflow Ebook.pdf',
					'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5eb1aac72912ec06f561278c;5e9a5eba75e0ac242e1b6f63:ka2nehxy:4a1ee0a632feaab94294350087215ed89533f2f530903e3b933b638940e921aa',
				],
				[
					'id' => '5e9a5eba75e0ac242e1b6f63',
					'name' => 'The freelance web designers guide - Webflow Ebook.pdf',
					'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5dd44c493543b37d5449b3cd;5e9a5eba75e0ac242e1b6f63:ka2nehxy:6af5adf7c6fff7a3b0f54404fac1be492ac6f1ed5340416f1fe27c5fd4dd8079',
				],
			],
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/orders/dfa-3f1/unfulfill' => [
		'POST' => [
			'orderId' => 'dfa-3f1',
			'status' => 'unfulfilled',
			'comment' => '',
			'orderComment' => '',
			'acceptedOn' => '2018-12-03T22:06:15.761Z',
			'disputedOn' => null,
			'disputeUpdatedOn' => null,
			'disputeLastStatus' => null,
			'fulfilledOn' => null,
			'refundedOn' => null,
			'customerPaid' => [
				'unit' => 'USD',
				'value' => 6099,
				'string' => '$60.99',
			],
			'netAmount' => [
				'unit' => 'USD',
				'value' => 5892,
				'string' => '$58.92',
			],
			'requiresShipping' => true,
			'shippingProvider' => null,
			'shippingTracking' => null,
			'customerInfo' => [
				'fullName' => 'Customerio Namen',
				'email' => 'renning+customer@webflow.com',
			],
			'allAddresses' => [
				[
					'type' => 'billing',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
				[
					'type' => 'shipping',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
			],
			'shippingAddress' => [
				'type' => 'shipping',
				'addressee' => 'Customerio Namen',
				'line1' => '123 Example Rd',
				'line2' => '',
				'city' => 'Examplesville',
				'state' => 'CA',
				'country' => 'US',
				'postalCode' => '90012',
			],
			'billingAddress' => [
				'type' => 'billing',
				'addressee' => 'Customerio Namen',
				'line1' => '123 Example Rd',
				'line2' => '',
				'city' => 'Examplesville',
				'state' => 'CA',
				'country' => 'US',
				'postalCode' => '90012',
			],
			'purchasedItems' => [
				[
					'count' => 1,
					'rowTotal' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'productId' => '5eb9fd05caef491eb9757183',
					'productName' => 'White Cup',
					'productSlug' => 'white-cup',
					'variantId' => '5eb9fcace279761d8199790c',
					'variantName' => 'white-cup_default_sku',
					'variantSlug' => 'white-cup-default-sku',
					'variantImage' => [
						'fileId' => '5bfedb42bab0ad90fa7dad2e',
						'url' => 'https://d1otoma47x30pg.cloudfront.net/5bfedb42bab0ad90fa7dac03/5bfedb42bab0ad90fa7dad2e_5bb3d019b3465c6e8a324dd7_458036-unsplas.png',
					],
					'variantPrice' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'height' => 7,
					'length' => 2,
					'weight' => 5,
					'width' => 4,
				],
			],
			'purchasedItemsCount' => 1,
			'stripeDetails' => [
				'refundReason' => null,
				'refundId' => null,
				'disputeId' => null,
				'chargeId' => 'ch_1DdPYQKMjGA7k9mI2AKiBY6u',
				'customerId' => 'cus_E5ajeiWNHEtcAW',
			],
			'stripeCard' => [
				'last4' => '4242',
				'brand' => 'Visa',
				'ownerName' => 'Customerio Namen',
				'expires' => [
					'year' => 2023,
					'month' => 12,
				],
			],
			'totals' => [
				'subtotal' => [
					'unit' => 'USD',
					'value' => 5500,
					'string' => '$55.00',
				],
				'extras' => [
					[
						'type' => 'tax',
						'name' => 'State Taxes',
						'description' => 'CA Taxes (6.25%)',
						'price' => [
							'unit' => 'USD',
							'value' => 344,
							'string' => '$3.44',
						],
					],
					[
						'type' => 'tax',
						'name' => 'County Taxes',
						'description' => 'LOS ANGELES Taxes (1.00%)',
						'price' => [
							'unit' => 'USD',
							'value' => 55,
							'string' => '$0.55',
						],
					],
					[
						'type' => 'tax',
						'name' => 'Special District Taxes',
						'description' => 'Special District Taxes (2.25%)',
						'price' => [
							'unit' => 'USD',
							'value' => 124,
							'string' => '$1.24',
						],
					],
					[
						'type' => 'shipping',
						'name' => 'Flat Rate',
						'description' => '',
						'price' => [
							'unit' => 'USD',
							'value' => 599,
							'string' => '$5.99',
						],
					],
					[
						'type' => 'discount',
						'name' => 'Discount (SAVE5)',
						'description' => '',
						'price' => [
							'unit' => 'USD',
							'value' => -500,
							'string' => '-$ 5.00 USD',
						],
					],
				],
				'total' => [
					'unit' => 'USD',
					'value' => 6122,
					'string' => '$61.22',
				],
			],
			'customData' => [
				[
					'textInput' => '(415) 123-4567',
					'name' => 'Telephone',
				],
				[
					'textArea' => 'Happy birthday Mom!',
					'name' => 'Gift note',
				],
				[
					'checkbox' => true,
					'name' => 'Send as gift',
				],
			],
			'downloadFiles' => [
				[
					'id' => '5e9a5eba75e0ac242e1b6f64',
					'name' => 'The modern web design process - Webflow Ebook.pdf',
					'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5eb1aac72912ec06f561278c;5e9a5eba75e0ac242e1b6f63:ka2nehxy:4a1ee0a632feaab94294350087215ed89533f2f530903e3b933b638940e921aa',
				],
				[
					'id' => '5e9a5eba75e0ac242e1b6f63',
					'name' => 'The freelance web designers guide - Webflow Ebook.pdf',
					'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5dd44c493543b37d5449b3cd;5e9a5eba75e0ac242e1b6f63:ka2nehxy:6af5adf7c6fff7a3b0f54404fac1be492ac6f1ed5340416f1fe27c5fd4dd8079',
				],
			],
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/orders/dfa-3f1/refund' => [
		'POST' => [
			'orderId' => 'dfa-3f1',
			'status' => 'unfulfilled',
			'comment' => '',
			'orderComment' => '',
			'acceptedOn' => '2018-12-03T22:06:15.761Z',
			'disputedOn' => null,
			'disputeUpdatedOn' => null,
			'disputeLastStatus' => null,
			'fulfilledOn' => null,
			'refundedOn' => null,
			'customerPaid' => [
				'unit' => 'USD',
				'value' => 6099,
				'string' => '$60.99',
			],
			'netAmount' => [
				'unit' => 'USD',
				'value' => 5892,
				'string' => '$58.92',
			],
			'requiresShipping' => true,
			'shippingProvider' => null,
			'shippingTracking' => null,
			'customerInfo' => [
				'fullName' => 'Customerio Namen',
				'email' => 'renning+customer@webflow.com',
			],
			'allAddresses' => [
				[
					'type' => 'billing',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
				[
					'type' => 'shipping',
					'addressee' => 'Customerio Namen',
					'line1' => '123 Example Rd',
					'line2' => '',
					'city' => 'Examplesville',
					'state' => 'CA',
					'country' => 'US',
					'postalCode' => '90012',
				],
			],
			'shippingAddress' => [
				'type' => 'shipping',
				'addressee' => 'Customerio Namen',
				'line1' => '123 Example Rd',
				'line2' => '',
				'city' => 'Examplesville',
				'state' => 'CA',
				'country' => 'US',
				'postalCode' => '90012',
			],
			'billingAddress' => [
				'type' => 'billing',
				'addressee' => 'Customerio Namen',
				'line1' => '123 Example Rd',
				'line2' => '',
				'city' => 'Examplesville',
				'state' => 'CA',
				'country' => 'US',
				'postalCode' => '90012',
			],
			'purchasedItems' => [
				[
					'count' => 1,
					'rowTotal' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'productId' => '5eb9fd05caef491eb9757183',
					'productName' => 'White Cup',
					'productSlug' => 'white-cup',
					'variantId' => '5eb9fcace279761d8199790c',
					'variantName' => 'white-cup_default_sku',
					'variantSlug' => 'white-cup-default-sku',
					'variantImage' => [
						'fileId' => '5bfedb42bab0ad90fa7dad2e',
						'url' => 'https://d1otoma47x30pg.cloudfront.net/5bfedb42bab0ad90fa7dac03/5bfedb42bab0ad90fa7dad2e_5bb3d019b3465c6e8a324dd7_458036-unsplas.png',
					],
					'variantPrice' => [
						'unit' => 'USD',
						'value' => 5500,
						'string' => '$55.00',
					],
					'height' => 7,
					'length' => 2,
					'weight' => 5,
					'width' => 4,
				],
			],
			'purchasedItemsCount' => 1,
			'stripeDetails' => [
				'refundReason' => null,
				'refundId' => null,
				'disputeId' => null,
				'chargeId' => 'ch_1DdPYQKMjGA7k9mI2AKiBY6u',
				'customerId' => 'cus_E5ajeiWNHEtcAW',
			],
			'stripeCard' => [
				'last4' => '4242',
				'brand' => 'Visa',
				'ownerName' => 'Customerio Namen',
				'expires' => [
					'year' => 2023,
					'month' => 12,
				],
			],
			'totals' => [
				'subtotal' => [
					'unit' => 'USD',
					'value' => 5500,
					'string' => '$55.00',
				],
				'extras' => [
					[
						'type' => 'tax',
						'name' => 'State Taxes',
						'description' => 'CA Taxes (6.25%)',
						'price' => [
							'unit' => 'USD',
							'value' => 344,
							'string' => '$3.44',
						],
					],
					[
						'type' => 'tax',
						'name' => 'County Taxes',
						'description' => 'LOS ANGELES Taxes (1.00%)',
						'price' => [
							'unit' => 'USD',
							'value' => 55,
							'string' => '$0.55',
						],
					],
					[
						'type' => 'tax',
						'name' => 'Special District Taxes',
						'description' => 'Special District Taxes (2.25%)',
						'price' => [
							'unit' => 'USD',
							'value' => 124,
							'string' => '$1.24',
						],
					],
					[
						'type' => 'shipping',
						'name' => 'Flat Rate',
						'description' => '',
						'price' => [
							'unit' => 'USD',
							'value' => 599,
							'string' => '$5.99',
						],
					],
					[
						'type' => 'discount',
						'name' => 'Discount (SAVE5)',
						'description' => '',
						'price' => [
							'unit' => 'USD',
							'value' => -500,
							'string' => '-$ 5.00 USD',
						],
					],
				],
				'total' => [
					'unit' => 'USD',
					'value' => 6122,
					'string' => '$61.22',
				],
			],
			'customData' => [
				[
					'textInput' => '(415) 123-4567',
					'name' => 'Telephone',
				],
				[
					'textArea' => 'Happy birthday Mom!',
					'name' => 'Gift note',
				],
				[
					'checkbox' => true,
					'name' => 'Send as gift',
				],
			],
			'downloadFiles' => [
				[
					'id' => '5e9a5eba75e0ac242e1b6f64',
					'name' => 'The modern web design process - Webflow Ebook.pdf',
					'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5eb1aac72912ec06f561278c;5e9a5eba75e0ac242e1b6f63:ka2nehxy:4a1ee0a632feaab94294350087215ed89533f2f530903e3b933b638940e921aa',
				],
				[
					'id' => '5e9a5eba75e0ac242e1b6f63',
					'name' => 'The freelance web designers guide - Webflow Ebook.pdf',
					'url' => 'https://webflow.com/dashboard/download-digital-product?payload=5d93ba5e38c6b0160ab711d3;e7634a;5dd44c493543b37d5449b3cd;5e9a5eba75e0ac242e1b6f63:ka2nehxy:6af5adf7c6fff7a3b0f54404fac1be492ac6f1ed5340416f1fe27c5fd4dd8079',
				],
			],
		],
	],

	'/collections/580e63fc8c9a982ac9b8b745/items/580e64008c9a982ac9b8b754/inventory' => [
		'GET' => [
			'_id' => '5bfedb42bab0ad90fa7dad39',
			'quantity' => 83,
			'inventoryType' => 'finite',
		],

		'PATCH' => [
			'_id' => '5bfedb42bab0ad90fa7dad39',
			'quantity' => 83,
			'inventoryType' => 'finite',
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/ecommerce/settings' => [
		'GET' => [
			'createdOn' => '2019-02-21T18:41:47.312Z',
			'site' => '62f3b1f7eafbc45d0c64ef93',
			'defaultCurrency' => 'USD',
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/users' => [
		'GET' => [
			'users' => [
				[
					'_id' => '6287ec36a841b25637c663df',
					'createdOn' => '2022-05-20T13:46:12.093Z',
					'updatedOn' => '2022-05-20T13:46:12.093Z',
					'emailVerified' => false,
					'status' => 'unverified',
					'data' => [
						'accept-privacy' => false,
						'accept-communications' => false,
						'email' => 'Person.One@home.com',
						'name' => 'Person One',
					],
				],
				[
					'_id' => '6287ec36a841b25637c663f0',
					'createdOn' => '2022-05-19T05:32:04.581Z',
					'updatedOn' => '2022-05-19T05:32:04.581Z',
					'emailVerified' => false,
					'status' => 'unverified',
					'data' => [
						'accept-privacy' => false,
						'accept-communications' => false,
						'email' => 'Person.Two@home.com',
						'name' => 'Person Two',
					],
				],
				[
					'_id' => '6287ec36a841b25637c663d9',
					'createdOn' => '2022-05-17T03:34:06.720Z',
					'updatedOn' => '2022-05-17T03:34:06.720Z',
					'emailVerified' => true,
					'status' => 'verified',
					'data' => [
						'accept-privacy' => false,
						'accept-communications' => false,
						'email' => 'Person.Three@home.com',
						'name' => 'Person Three',
					],
				],
				[
					'_id' => '6287ec37a841b25637c6641b',
					'createdOn' => '2022-05-15T03:46:09.748Z',
					'updatedOn' => '2022-05-15T03:46:09.748Z',
					'emailVerified' => false,
					'status' => 'unverified',
					'data' => [
						'accept-privacy' => false,
						'accept-communications' => false,
						'email' => 'Person.Four@home.com',
						'name' => 'Person Four',
					],
				],
				[
					'_id' => '6287ec37a841b25637c66449',
					'createdOn' => '2022-05-15T02:55:38.786Z',
					'updatedOn' => '2022-05-15T02:55:38.786Z',
					'emailVerified' => true,
					'status' => 'verified',
					'data' => [
						'accept-privacy' => false,
						'accept-communications' => false,
						'email' => 'Person.Five@home.com',
						'name' => 'Person Five',
					],
				],
			],
			'count' => 5,
			'limit' => 5,
			'offset' => 0,
			'total' => 201,
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/users/6287ec36a841b25637c663df' => [
		'GET' => [
			'_id' => '6287ec36a841b25637c663df',
			'createdOn' => '2022-05-20T13:46:12.093Z',
			'updatedOn' => '2022-05-20T13:46:12.093Z',
			'emailVerified' => true,
			'status' => 'verified',
			'data' => [
				'accept-privacy' => false,
				'accept-communications' => false,
				'email' => 'Some.One@home.com',
				'name' => 'Some One',
			],
		],

		'PATCH' => [
			'valid' => true,
			'user' => [
				'_id' => '6287ec36a841b25637c663df',
				'createdOn' => '2022-05-20T13:46:12.093Z',
				'updatedOn' => '2022-05-20T13:46:12.093Z',
				'emailVerified' => true,
				'status' => 'verified',
				'data' => [
					'accept-privacy' => false,
					'accept-communications' => false,
					'email' => 'Some.One@home.com',
					'name' => 'John Doe',
				],
			],
		],

		'DELETE' => [
			'deleted' => 1,
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/users/invite' => [
		'POST' => [
			'_id' => '6287ec36a841b25637c663df',
			'createdOn' => '2022-05-20T13:46:12.093Z',
			'updatedOn' => '2022-05-20T13:46:12.093Z',
			'emailVerified' => true,
			'status' => 'verified',
			'data' => [
				'accept-privacy' => false,
				'accept-communications' => false,
				'email' => 'Some.One@home.com',
				'name' => 'Some One',
			],
		],
	],

	'/sites/580e63e98c9a982ac9b8b741/accessgroups' => [
		'GET' => [
			'accessGroups' => [
				[
					'_id' => '62be58d404be8a6cc900c081',
					'name' => 'Webflowers',
					'shortId' => 'jo',
					'slug' => 'webflowers',
					'createdOn' => '2022-08-01T19:41:48.349Z',
				],
			],
			'count' => 1,
			'limit' => 10,
			'offset' => 0,
			'total' => 1,
		],
	],
];
