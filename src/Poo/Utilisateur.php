<?php
namespace App\Poo;

use DateTime;

class Utilisateur
{
	private string $name;
	private string $firstname;
	private string $email;
	private int $age;
	private int $rate;

	public const LOWEST_RATE = 5;
	public const HIGHEST_RATE = 15;

	public function __construct(string $name, string $firstname, string $email, int $age, int $rate)
	{
		$this->name = $name;
		$this->firstname = $firstname;
		$this->email = $email;
		$this->age = $age;
		$this->rate = $rate;
	}

	public function commitmentLevel(): string
	{
		if ($this->rate >= self::HIGHEST_RATE) {
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

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param  string  $name
	 *
	 * @return Utilisateur
	 */
	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFirstname(): string
	{
		return $this->firstname;
	}

	/**
	 * @param  string  $firstname
	 *
	 * @return Utilisateur
	 */
	public function setFirstname(string $firstname): self
	{
		$this->firstname = $firstname;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @param  string  $email
	 *
	 * @return Utilisateur
	 */
	public function setEmail(string $email): self
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getAge(): int
	{
		return $this->age;
	}

	/**
	 * @param  int  $age
	 *
	 * @return Utilisateur
	 */
	public function setAge(int $age): self
	{
		$this->age = $age;
		return $this;
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
	 * @return Utilisateur
	 */
	public function setRate(int $rate): self
	{
		$this->rate = $rate;
		return $this;
	}



}