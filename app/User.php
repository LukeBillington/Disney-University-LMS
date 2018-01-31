<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'perner', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function quizzes () {
      return $this->belongsToMany('App\Quiz')
        ->withPivot('status', 'points');
    }

    public function questions () {
      return $this->belongsToMany('App\Quiz')
        ->withPivot('answer_id');
    }
}
