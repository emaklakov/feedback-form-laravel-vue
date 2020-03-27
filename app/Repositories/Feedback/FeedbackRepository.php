<?php


namespace App\Repositories\Feedback;


use App\Factories\Feedback\FeedbackFactory;

class FeedbackRepository
{
	public static function save(array $data)
	{
		$feedbackDB = FeedbackFactory::makeFeedback('db');
		$feedbackDB->setName($data['name']);
		$feedbackDB->setPhone($data['phone']);
		$feedbackDB->setMessage($data['message']);
		$feedbackDB->save();

		$feedbackEmail = FeedbackFactory::makeFeedback('email');
		$feedbackEmail->setName($data['name']);
		$feedbackEmail->setPhone($data['phone']);
		$feedbackEmail->setMessage($data['message']);
		$feedbackEmail->save();
	}
}
