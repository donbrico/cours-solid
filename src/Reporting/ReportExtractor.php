<?php

namespace App\Reporting;

use App\Reporting\Format\CsvFormatter;
use App\Reporting\Format\HtmlFormatter;
use App\Reporting\Format\HtmlSpecialFormatter;
use App\Reporting\Format\JsonFormatter;

class ReportExtractor
{

    /**
     * Doit afficher l'ensemble des formats possibles pour un rapport en se servant
     * des formatters ajoutés dans le tableau
     */
    public function process(Report $report): array
    {
        $results = [];

        $htmlFormatter = new HtmlFormatter();
        $htmlSpecialFormatter = new HtmlSpecialFormatter();
        $jsonFormatter = new JsonFormatter();
        $csvFormatter = new CsvFormatter();

        $results[] = $htmlFormatter->formatToHTML($report);
        $results[] = $htmlSpecialFormatter->formatToHTML($report);
        $results[] = $jsonFormatter->formatToJSON($report);
        $results[] = $csvFormatter->formatToCsv($report);

        return $results;
    }
}
