<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RoomType;
use App\Status;

class Room extends Model
{
    protected $guarded = ['id'];

    public function type()
    {
        return $this->belongsTo(RoomType::class);
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
