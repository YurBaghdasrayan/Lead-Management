<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
