<?php

namespace App\Reporting\Format;

use App\Reporting\Report;
use JsonException;

class JsonFormatter implements FormatterInterface, DeserializerInterface
{
	/**
	 * @throws JsonException
	 */
	public function format(Report $report): string
    {
        return json_encode($report->getContents(), JSON_THROW_ON_ERROR);
    }

	/**
	 * @throws JsonException
	 */
	public function deserialize(string $str): Report
	{
		$contents = json_decode($str, true, 512, JSON_THROW_ON_ERROR);

		return new Report($contents['title'], $contents['date'], $contents['data']);
	}
}