<?php

namespace App\Reporting\Format;

use App\Reporting\Report;
use JetBrains\PhpStorm\Pure;

class CsvFormatter
{
    public function formatToCsv(Report $report): string
    {
        $contents = $report->getContents();
        $data = implode(';', $contents['data']);

        unset($contents['data']);

        return implode(';', $contents) . ';' . $data;
    }

}