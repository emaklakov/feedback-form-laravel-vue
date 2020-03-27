<?php


namespace App\Models\Feedbacks;


use Illuminate\Support\Facades\DB;

class FeedbackDb extends Feedback
{
	public function save()
	{
		DB::table('feedback')->insert(
			['name' => $this->name, 'phone' => $this->phone, 'message' => $this->message]
		);
	}
}
