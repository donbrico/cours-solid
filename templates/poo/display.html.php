<?php
use App\Poo\Person;
use App\Poo\Pilot;

try{
	$person = new Person('POTE', 'Brice', 'brice.pote@gmail.com', 50);
	$pilot = new Pilot('HAMILTON', 'Lewis', 'lewis.hamilton@gmail.com', 30, 20);
?>
    <div class="alert alert-light">
        <h4 class="alert-title"><?= str_replace('App\Poo\\', '', get_class($person)) ?></h4>
    </div>
<?php

	echo '<p style="border: 2px solid cornflowerblue;padding: 15px;">' .
		'<span style="font-weight: bold">Classe</span> : ' . get_class($person) . '<br>' .
		'<span style="font-weight: bold">Nom</span> : ' . $person->getName() . '<br>' .
		'<span style="font-weight: bold">Prénom</span> : ' . $person->getFirstname() . '<br>' .
		'<span style="font-weight: bold">Mail</span> : ' . $person->getEmail() . '<br>' .
		'<span style="font-weight: bold">Age</span> : ' . $person->getAge() . '<br>' .
		'</p>';

	echo "<hr>";
?>
    <div class="alert alert-light">
        <h4 class="alert-title"><?= str_replace('App\Poo\\', '', get_class($pilot)) ?></h4>
    </div>
<?php

	echo '<p style="border: 2px solid darkblue;padding: 15px;">' .
		'<span style="font-weight: bold">Classe</span> : ' . get_class($pilot) . '<br>' .
		'<span style="font-weight: bold">Nom</span> : ' . $pilot->getName() . '<br>' .
		'<span style="font-weight: bold">Prénom</span> : ' . $pilot->getFirstname() . '<br>' .
		'<span style="font-weight: bold">Mail</span> : ' . $pilot->getEmail() . '<br>' .
		'<span style="font-weight: bold">Age</span> : ' . $pilot->getAge() . '<br>' .
		'<span style="font-weight: bold">Note</span> : ' . $pilot->getRate() . '<br>' .
		'<span style="font-weight: bold">Engagement</span> : ' . $pilot->commitmentLevel() . '<br>' .
		'</p>';

	echo "<hr>";

} catch (Exception $e) {
?>
    <div class="alert alert-light">
        <h4 class="alert-title">Pilote</h4>
    </div>
<?php
	echo '<p style="border: 2px solid #f50000;padding: 15px;">'.
		'<span style="font-weight: bold">Erreur</span> : ' . $e->getTraceAsString() . '<br>' .
		'</p>';

	echo "<hr>";
}


