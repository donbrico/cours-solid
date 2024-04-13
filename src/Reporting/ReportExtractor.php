<?php

namespace App\Reporting;

use App\Reporting\Format\CsvFormatter;
use App\Reporting\Format\HtmlFormatter;
use App\Reporting\Format\HtmlSpecialFormatter;
use App\Reporting\Format\JsonFormatter;
use JsonException;

class ReportExtractor
{
	private string $title;
	private string $date;
	private array $data;

	/**
	 * Doit afficher l'ensemble des formats possibles pour un rapport en se servant
	 * des formatters ajoutés dans le tableau
	 * @throws JsonException
	 */
    public function process(Report $report): array
    {
        $results = [];

		//set the params for the StringReport
		$this->setStringReportsParams($report);
		$stringReport = new StringReport($this->title, $this->date, $this->data);

        $htmlFormatter = new HtmlFormatter();
        $htmlSpecialFormatter = new HtmlSpecialFormatter();
        $jsonFormatter = new JsonFormatter();
        $csvFormatter = new CsvFormatter();

        $results[] = $htmlFormatter->format($report);
        $results[] = $htmlSpecialFormatter->format($report);
        $results[] = $jsonFormatter->format($report);
        $results[] = $csvFormatter->format($report);

		//Add the new StringReport to the results
        $results[] = $stringReport->getStringReport();

        return $results;
    }

	private function setStringReportsParams(Report $report): void
	{
		$this->title = $report->getContents()['title'];
		$this->date = $report->getContents()['date'];
		$this->data = $report->getContents()['data'];
	}
}
