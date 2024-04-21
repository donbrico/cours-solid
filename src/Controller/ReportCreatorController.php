<?php

namespace App\Controller;

use App\Reporting\FormatterFactory;
use App\Reporting\Report;
use App\Reporting\StringReport;
use JsonException;

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

		// On utilise la factory pour créer le bon formateur
	    // Afin de respecter au maximum le principe SOLID
	    // Ce n'est pas au controller de choisir le formateur
	    // En fonction du format, on pourrait imaginer que la factory retourne un formateur différent
		$formatter = FormatterFactory::create($format);
		$reportResult = $formatter->format($report);

		$stringReportResult = $stringReport->getStringReport();
	    $reportResult .= $stringReportResult;

        require_once(TEMPLATES_DIR . 'report-creator/result.html.php');
    }
}
