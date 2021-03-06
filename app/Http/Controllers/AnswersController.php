<?php namespace App\Http\Controllers;

use App\models\BaseModel;
use App\models\Answer;
use App\models\Question;
use App\models\User;

use \Validator, \Redirect, \Request, \Input, \View, \Paginator, \Auth, \Lang;

class AnswersController extends Controller {

	/**
	 * Enable csrf authenticity on post
	 */
	public function __construct() {
		$this->beforeFilter('csrf', array('on' => ['post']));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /answers
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Answer::validate(Input::all());

		$questionId = Input::get('question_id');

		if ($validator->passes()) {
			Answer::create(array(
				'answer' => Input::get('answer'),
				'question_id' => $questionId,
				'user_id' => Auth::user()->id
			));

			return Redirect::route('question', $questionId)
				->withMessage('Your answer has been posted!');
		} else {

			return Redirect::route('question', $questionId)
				->withErrors($validator)
				->withInput();
		}
	}

}