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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        $roles = Role::all();

        return $this->belongsToMany(Role::class);
    }

    public function putRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereRoleName($role)->first();
        }

        return $this->roles()->attach($role);
    }

    public function forgetRole()
    {
        if (is_string($role)) {
            $role = Role::whereRoleName($role)->first();
        }

        return $this->roles()->detach($role);
    }

    public function hasRole($roleName)
    {
        foreach ($this->roles as $role) {
            if ($role->role_name === $roleName) return true;
        }

        return false;
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' .$search. '%');
    }
}
