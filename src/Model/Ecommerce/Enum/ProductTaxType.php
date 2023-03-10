<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Ecommerce\Enum;

/**
 * Defines constants for Product tax types.
 */
class TaxType
{
	public const STANDARD_TAXABLE = 'standard-taxable';

	public const STANDARD_EXEMPT = 'standard-exempt';

	public const BOOKS = 'books';

	public const BOOKS_RELIGIOUS = 'books-religious';

	public const BOOKS_TEXTBOOK = 'books-textbook';

	public const CLOTHING = 'clothing';

	public const CLOTHING_SWIMWEAR = 'clothing-swimwear';

	public const DIGITAL_GOODS = 'digital-goods';

	public const DIGITAL_SERVICE = 'digital-service';

	public const DRUGS_NON_PRESCRIPTION = 'drugs-non-prescription';

	public const DRUGS_PRESCRIPTION = 'drugs-prescription';

	public const FOOD_BOTTLED_WATER = 'food-bottled-water';

	public const FOOD_CANDY = 'food-candy';

	public const FOOD_GROCERIES = 'food-groceries';

	public const FOOD_PREPARED = 'food-prepared';

	public const FOOD_SODA = 'food-soda';

	public const FOOD_SUPPLEMENTS = 'food-supplements';

	public const MAGAZINE_INDIVIDUAL = 'magazine-individual';

	public const MAGAZINE_SUBSCRIPTION = 'magazine-subscription';

	public const SERVICE_ADMISSION = 'service-admission';

	public const SERVICE_ADVERTISING = 'service-advertising';

	public const SERVICE_DRY_CLEANING = 'service-dry-cleaning';

	public const SERVICE_HAIRDRESSING = 'service-hairdressing';

	public const SERVICE_INSTALLATION = 'service-installation';

	public const SERVICE_MISCELLANEOUS = 'service-miscellaneous';
}
