<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

use \Validator;

class BaseModel extends Model {

  /**
   * Base validator
   * @return Validator 
   */
  public static function validate($data) {
    return Validator::make($data, static::$rules);
  }
}