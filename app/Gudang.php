<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany('App\User', 'gudang_users', 'gudang_id', 'user_id');
    }
}
