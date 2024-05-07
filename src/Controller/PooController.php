<?php

namespace App\Controller;

class PooController
{
	public function show(): void
	{
		require_once(TEMPLATES_DIR . 'poo/display.html.php');
	}
}