<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\SubmitFeedback;
use App\Repositories\Feedback\FeedbackRepository;

class FeedbackController extends Controller
{
	private $feedbackRepository;

	public function __construct(FeedbackRepository $feedbackRepository)
	{
		$this->feedbackRepository = $feedbackRepository;
	}

	public function submit(SubmitFeedback $request) {
		$this->feedbackRepository->save($request->all());

		return response(null, 200);
	}
}
