<?php

namespace App\Models\Feedbacks;

abstract class Feedback
{
	protected $name;
	protected $phone;
	protected $message;

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name)
	{
		$this->name = $name;
	}

	public function getPhone(): string
	{
		return $this->phone;
	}

	public function setPhone(string $phone)
	{
		$this->phone = $phone;
	}

	public function getMessage(): string
	{
		return $this->message;
	}

	public function setMessage(string $message)
	{
		$this->message = $message;
	}

	abstract function save();
}
