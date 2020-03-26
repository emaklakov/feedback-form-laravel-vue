<?php


namespace App\Repositories\Feedback;


use App\Factories\Feedback\FeedbackFactory;

class FeedbackRepository
{
	public static function save(array $data)
	{
		$factory = new FeedbackFactory();
		$factory->name = $data['name'];
		$factory->phone = $data['phone'];
		$factory->message = $data['message'];

		$factory->save('db');
		$factory->save('email');
		//$factory->save('file');
	}
}
