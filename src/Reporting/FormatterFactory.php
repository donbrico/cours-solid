<?php

namespace App\Reporting;

use App\Reporting\Format\FormatterInterface;
use LogicException;

class FormatterFactory
{
	public static function create(string $format): FormatterInterface
	{
		return match ($format) {
			'html' => new Format\HtmlFormatter(),
			'json' => new Format\JsonFormatter(),
			'csv' => new Format\CsvFormatter(),
			default => throw new \InvalidArgumentException("Format $format not supported"),
		};
	}
}