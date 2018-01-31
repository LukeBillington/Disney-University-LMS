<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'quiz_id', 'prompt', 'answer_id', 'answer_text', 'resource_url',
    ];

    public function quiz () {
        return $this->belongsTo('App\Quiz');
    }

    public function answers () {
        return $this->hasMany('App\Answer');
    }

    public function users () {
      return $this->belongsToMany('App\User')
        ->withPivot('answer_id');
    }

    public function setResourceUrlAttribute ($value) {
      if($value) {
          $str = file_get_contents($value);
          if(strlen($str) > 0) {
              $str = trim(preg_replace('/\s+/', ' ', $str));
              preg_match("/\<title\>(.*)\<\/title\>/i", $str,$title);
              $this->attributes['resource_title'] = $title[1];
          }
          $this->attributes['resource_title'] = $title[1];
      } else {
        $this->attributes['resource_title'] = null;
      }
      $this->attributes['resource_url'] = $value;

    }
}
