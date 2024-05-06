<?php

namespace App\Poo;

use App\Poo\Person;

class Pilot extends Person
{
	private int $rate;

	public function __construct(string $name, string $firstname, string $email, int $age, int $rate)
	{
		parent::__construct($name, $firstname, $email, $age);
		$this->setRate($rate);
	}

	/**
	 * @return int
	 */
	public function getRate(): int
	{
		return $this->rate;
	}

	/**
	 * @param  int  $rate
	 *
	 * @return Pilot
	 */
	public function setRate(int $rate): self
	{
		$this->rate = $rate;
		return $this;
	}

	public function commitmentLevel(): string
	{
		if ($this->rate >= Person::HIGHEST_RATE) {
			return sprintf(
				'%s a une implication très forte grâce à sa note de %d', $this->getName(), $this->getRate()
			);
		}

		if ($this->rate < self::LOWEST_RATE) {
			return sprintf(
				'%s a une implication très faible à cause de sa note de %d', $this->getName(), $this->getRate()
			);
		}

		return sprintf(
			'%s a une implication normale en raison de sa note de %d', $this->getName(), $this->getRate()
		);
	}
}
