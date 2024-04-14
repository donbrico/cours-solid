<?php

namespace App\Reporting;

use DateTime;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class Report
{

    protected string $title;
    protected string $date;
    protected array $data;

    #[Pure]
    public function __construct(string $date, string $title, array $data)
    {
        $this->title = $title;
        $this->date  = $date;
        $this->data = $data;
    }

	/**
	 * Retourne un tableau associatif contenant la date et le titre du rapport
	 * Indice : tiens tiens, on pourrait donc récupérer ces données depuis l'extérieur ?
	 * @throws \Exception
	 */
    #[ArrayShape(['date' => "string", 'title' => "string", 'data' => "array"])]
    public function getContents(): array
    {
		//Transform the date to a DateTime object
	    $date = new Datetime($this->date);

        return [
            'title' => $this->title,
            'date'  => $date->format('d-m-Y'),
            'data' => $this->data
        ];
    }
}
