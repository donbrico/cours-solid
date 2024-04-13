<?php

namespace App\Reporting;

use App\Reporting\Report;

class StringReport extends Report
{
	public function getStringReport(): string
	{
		$data = implode(',', $this->data);
		return "Title: {$this->title} -- Date: {$this->date} -- Data: {$data}";
	}

}