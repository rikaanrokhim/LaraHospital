<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Status;

class Medichal extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' .$search. '%');
    }
}
