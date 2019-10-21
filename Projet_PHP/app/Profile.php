<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user() {
        return $this->hasOne('App\User');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'firstName',
        'lastName',
        'birthDate',
        'telNbr',
        'address',
    ];
}
