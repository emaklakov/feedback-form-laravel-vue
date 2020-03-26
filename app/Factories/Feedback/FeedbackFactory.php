<?php


namespace App\Factories\Feedback;


use App\Models\Feedback;
use Illuminate\Support\Facades\Mail;

class FeedbackFactory
{
	public $name;
	public $phone;
	public $message;

	public function save($type_save)
	{
		switch ($type_save) {
			case 'db':
				$feedback = new Feedback();
				$feedback->name = $this->name;
				$feedback->phone = $this->phone;
				$feedback->message = $this->message;
				$feedback->save();
				break;
			case 'email':
				$data = array('name' => $this->name, 'phone' => $this->phone, 'bodyMessage' => $this->message);

				Mail::send('emails.feedback', $data, function ($message) {
					$message->to(env('APP_FEEDBACK_EMAIL', ''));
					$message->subject(env('APP_FEEDBACK_SUBJECT', 'Feedback'));
				});
				break;
			default:
				throw new \Exception('Не верный тип сохранения');
		}
	}
}
