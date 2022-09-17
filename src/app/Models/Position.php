<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'position';

    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }
}
