<?php


namespace App\Factories\Feedback;


use App\Models\Feedbacks\Feedback;
use App\Models\Feedbacks\FeedbackDb;
use App\Models\Feedbacks\FeedbackEmail;

class FeedbackFactory
{
	public $name;
	public $phone;
	public $message;

	public function makeFeedback($type_save): Feedback
	{
		switch ($type_save) {
			case 'db':
				return new FeedbackDb();
				break;
			case 'email':
				return new FeedbackEmail();
				break;
			default:
				throw new \Exception('Не верный тип сохранения');
		}
	}
}
