<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded =['id'];
    public $timestamps = false;

    public function getUserObject()
    {
        return $this->belongsToMany(User::class)->using(UserRole::class);
    }
}
