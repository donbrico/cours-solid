<?php

namespace App\Controller;

use App\Reporting\Report;
use App\Reporting\ReportExtractor;
use App\Reporting\StringReport;

class BulkReportController
{
    public function show(): void
    {
        require_once(TEMPLATES_DIR . 'bulk-report/show.html.php');
    }

	/**
	 * @throws \JsonException
	 */
	public function execute(): void
    {
        // Extraction des données, on fait au plus simple / rapide mais ce serait à revoir
        $date = $_POST['date'];
        $title = $_POST['title'];
        $data = $_POST['data'];

        // Début de l'algorithme
        $report = new Report($date, $title, $data);

        $extractor = new ReportExtractor();

        $results = $extractor->process($report);

	    require_once(TEMPLATES_DIR . 'bulk-report/result.html.php');
    }
}
