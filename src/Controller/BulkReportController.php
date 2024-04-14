<?php

namespace App\Controller;

use App\Reporting\Format\CsvFormatter;
use App\Reporting\Format\HtmlFormatter;
use App\Reporting\Format\HtmlSpecialFormatter;
use App\Reporting\Format\JsonFormatter;
use App\Reporting\Report;
use App\Reporting\ReportExtractor;
use JsonException;

class BulkReportController
{
    public function show(): void
    {
        require_once(TEMPLATES_DIR . 'bulk-report/show.html.php');
    }

	/**
	 * @throws JsonException
	 */
	public function execute(): void
    {
        // Extraction des données, on fait au plus simple / rapide
	    // mais ce serait à revoir
        $date = $_POST['date'];
        $title = $_POST['title'];
        $data = $_POST['data'];

        // Début de l'algorithme
        $report = new Report($date, $title, $data);

        $extractor = new ReportExtractor();

		//Add formatters to the extractor
	    $extractor->addFormatters(new HtmlFormatter());
		$extractor->addFormatters(new JsonFormatter());
		$extractor->addFormatters(new CsvFormatter());
		$extractor->addFormatters(new HtmlSpecialFormatter());

		//Render the results with all stored formatters
        $results = $extractor->process($report);

	    require_once(TEMPLATES_DIR . 'bulk-report/result.html.php');
    }
}
