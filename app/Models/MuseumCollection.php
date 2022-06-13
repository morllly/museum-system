<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuseumCollection extends Model
{
    protected $table = "collections"

    protected $fillable = [
        "title",
        "designation",
        "description"
    ];

    public function exhibits()
    {
        return $this->hasMany(Exhibit::class);
    }
}
