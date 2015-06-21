<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Answer extends BaseModel {
	
  protected $fillable = ['user_id', 'question_id', 'answer'];

  public static $rules = array(
    'answer' => 'required|min:2|max:255'
  );

  public function user() {
    return $this->belongsTo('App\models\User');
  }

  public function question() {
    return $this->belongsTo('App\models\Question');
  }
  
}