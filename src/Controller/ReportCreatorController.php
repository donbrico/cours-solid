<?php

namespace App\Controller;

use App\Reporting\Format\CsvFormatter;
use App\Reporting\Format\HtmlFormatter;
use App\Reporting\Format\JsonFormatter;
use App\Reporting\Report;
use App\Reporting\StringReport;
use JsonException;
use LogicException;

class ReportCreatorController
{
    public function show(): void
    {
        require_once(TEMPLATES_DIR . 'report-creator/show.html.php');
    }

	/**
	 * @throws JsonException
	 */
	public function execute(): void
    {
        // Extraction des données, on fait au plus simple / rapide, mais ce serait à revoir
        $date = $_POST['date'];
        $title = $_POST['title'];
        $data = $_POST['data'];
        $format = $_POST['format'];

        // Début de l'algorithme
        $report = new Report($date, $title, $data);
		$stringReport = new StringReport($date, $title, $data);

        switch ($format) {

            case 'html':
                $formatter = new HtmlFormatter();
                $reportResult = $formatter->format($report);
                break;
            case 'json':
                $formatter = new JsonFormatter();
                $reportResult = $formatter->format($report);
                break;
            case 'csv':
                $formatter = new CsvFormatter();
                $reportResult = $formatter->format($report);
                break;

            default:
                throw new LogicException('no format selected');
        }
		$stringReportResult = $stringReport->getStringReport();
	    $reportResult .= $stringReportResult;

        require_once(TEMPLATES_DIR . 'report-creator/result.html.php');
    }
}
