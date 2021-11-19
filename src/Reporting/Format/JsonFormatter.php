<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class JsonFormatter
{
    public function formatToJSON(Report $report): string
    {
        return json_encode($report->getContents());
    }
}