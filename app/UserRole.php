<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $primaryKey = 'user_id';
    protected $table = 'role_user';
    protected $guarded = ['id'];
    public $timestamps = false;


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getUserObject()
    {
        return $this->belongsTo(User::class);
    }

    public function getRoleObject()
    {
        return $this->belongsTo(Role::class);
    }
}
