<?php

namespace App;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Profile extends Eloquent {

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}

