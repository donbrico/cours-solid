<?php

namespace App\Reporting\Format;

use App\Reporting\Report;
use JsonException;

class JsonFormatter
{
	/**
	 * @throws JsonException
	 */
	public function formatToJSON(Report $report): string
    {
        return json_encode($report->getContents(), JSON_THROW_ON_ERROR);
    }
}