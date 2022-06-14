<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        "title",
    ];

    public function exhibits()
    {
        return $this->hasMany(Exhibit::class);
    }
}
