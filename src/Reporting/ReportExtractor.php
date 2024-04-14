<?php

namespace App\Reporting;

use App\Reporting\Format\FormatterInterface;
use JsonException;

class ReportExtractor
{
	private string $title;
	private string $date;
	private array $data;
	private array $formatters = [];


	public function addFormatters(FormatterInterface $formatter):void
	{
		$this->formatters[] = $formatter;
	}

	/**
	 * Doit afficher l'ensemble des formats possibles pour un rapport en se servant
	 * des formatters ajoutés dans le tableau
	 * @throws JsonException
	 */
    public function process(Report $report, bool $withStringReport = false): array
    {
        $results = [];

		//add the formatters to the results
	    foreach ($this->formatters as $formatter) {
	        $results[] = $formatter->format($report);
	    }

		if ($withStringReport) {
			$results[] = $this->addStringReports($report);
		}

        return $results;
    }

	private function setStringReportsParams(Report $report): void
	{
		$this->title = $report->getContents()['title'];
		$this->date = $report->getContents()['date'];
		$this->data = $report->getContents()['data'];
	}

	private function addStringReports(Report $report): array
	{
		$results = [];
		//set the params for the StringReport
		$this->setStringReportsParams($report);
		$stringReport = new StringReport($this->title, $this->date, $this->data);

		//Add the new StringReport to the results
		$results[] = $stringReport->getStringReport();
		return $results;
	}
}
