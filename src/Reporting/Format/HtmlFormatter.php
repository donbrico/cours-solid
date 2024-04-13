<?php

namespace App\Reporting\Format;

use App\Reporting\Report;
use JetBrains\PhpStorm\Pure;

class HtmlFormatter implements FormatterInterface
{
    #[Pure]
    public function format(Report $report): string
    {
        $contents = $report->getContents();
        $data = "";

        foreach ($contents['data'] as $value) {
            $data .= "<li>$value</li>";
        }

        return "
            <h2>{$contents['title']}</h2>
            <em>Date : {$contents['title']}</em>
            <h4>Données : </h4>
            <ul>
                $data
            </ul>
        ";
    }
}