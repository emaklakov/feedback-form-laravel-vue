<?php


namespace App\Models\Feedbacks;


use Illuminate\Support\Facades\Mail;

class FeedbackEmail extends Feedback
{
	public function save()
	{
		$data = array('name' => $this->name, 'phone' => $this->phone, 'bodyMessage' => $this->message);

		Mail::send('emails.feedback', $data, function ($message) {
			$message->to(env('APP_FEEDBACK_EMAIL', ''));
			$message->subject(env('APP_FEEDBACK_SUBJECT', 'Feedback'));
		});
	}
}
