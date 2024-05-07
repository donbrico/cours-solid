<?php
namespace App\Poo;

use DateTime;

class Person
{
	private string $name;
	private string $firstname;
	private string $email;
	private int $age;
	public const LOWEST_RATE = 5;
	public const HIGHEST_RATE = 15;

	public function __construct(string $name, string $firstname, string $email, int $age)
	{
		$this->setName($name);
		$this->setFirstname($firstname);
		$this->setEmail($email);
		$this->setAge($age);
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
	 * @return Person
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
	 * @return Person
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
	 * @return Person
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
	 * @return Person
	 */
	public function setAge(int $age): self
	{
		$this->age = $age;
		return $this;
	}
}