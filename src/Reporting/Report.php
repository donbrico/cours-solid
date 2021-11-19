<?php

namespace App\Reporting;

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
     */
    #[ArrayShape(['date' => "string", 'title' => "string", 'data' => "array"])]
    public function getContents(): array
    {
        return [
            'title' => $this->title,
            'date'  => $this->date,
            'data' => $this->data
        ];
    }
}
