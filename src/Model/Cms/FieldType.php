<?php

declare(strict_types=1);

namespace Koalati\Webflow\Model\Cms;

/**
 * @see https://developers.webflow.com/docs/models#fieldtype
 */
enum FieldType
{
	
	/** Yes/no switch used for filtering data that's displayed in your site, ex: featured */
	case Bool;

	/** CSS Color value (ie: 'red' or '#e3e3e3') */
	case Color;

	/** Date field used to display any combination of month, day, year, and time */
	case Date;

	/** An object containing name (string) and URL (string) properties */
	case ExtFileRef;

	/** Field containing multiple objects for external files or unique ids for images in CMS */
	case Set;

	/** Unique id for images in CMS */
	case ImageRef;

	/** Field containing item referenced from another Collection */
	case ItemRef;

	/** Field containing multiple items referenced from another Collection */
	case ItemRefSet;

	/** URL field where the value can be used as a link destination for buttons, link text, and link blocks */
	case Link;

	/** Single line input field used only for numbers */
	case Number;

	/** Dropdown field with multiple options */
	case Option;

	/** Unformatted text (no images, styles, etc.) */
	case PlainText;

	/** Formatted text (with headers, hyperlinks, images, etc.) */
	case RichText;

	/** Video link field used to embed videos from YouTube and Vimeo */
	case Video;

	/** Webflow user */
	case User;

	public static function fromString(string $fieldType): self
	{
		return match($fieldType) {
			"Bool" => self::Bool,
			"Color" => self::Color,
			"Date" => self::Date,
			"ExtFileRef" => self::ExtFileRef,
			"Set" => self::Set,
			"ImageRef" => self::ImageRef,
			"Set" => self::Set,
			"ItemRef" => self::ItemRef,
			"ItemRefSet" => self::ItemRefSet,
			"Link" => self::Link,
			"Number" => self::Number,
			"Option" => self::Option,
			"PlainText" => self::PlainText,
			"RichText" => self::RichText,
			"User" => self::User,
			"Video" => self::Video,
		};
	}

	public static function toString(self $fieldType): string
	{
		return match($fieldType) {
			self::Bool => "Bool",
			self::Color => "Color",
			self::Date => "Date",
			self::ExtFileRef => "ExtFileRef",
			self::Set => "Set",
			self::ImageRef => "ImageRef",
			self::Set => "Set",
			self::ItemRef => "ItemRef",
			self::ItemRefSet => "ItemRefSet",
			self::Link => "Link",
			self::Number => "Number",
			self::Option => "Option",
			self::PlainText => "PlainText",
			self::RichText => "RichText",
			self::User => "User",
			self::Video => "Video",
		};
	}
}
