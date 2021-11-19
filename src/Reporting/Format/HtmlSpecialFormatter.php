<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class HtmlSpecialFormatter extends HtmlFormatter
{
    public function formatToHTML(Report $report): string
    {
        $html = parent::formatToHTML($report);

        return '<div style="font-weight:bold;">
                ' . $html . '
                </div>
        ';
    }

}