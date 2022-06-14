<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibit extends Model
{
    protected $fillable = [
        "inventory_number",
        "title",
        "keyword_id",
        "collection_id",
        "creator",
        "receipt_date",
        "entry_method",
        "creation_time",
        "characteristics",
        "description",
        "safety",
        "image"
    ];

    public static $KEYWORDS = [
        'Кухонная утварь' => 'Кухонная утварь',
        'Предмет быта'    => 'Предмет быта',
        'Прочие'          => 'Прочие',
    ];

    public function collection()
    {
        return $this->belongsTo(MuseumCollection::class);
    }

    public function keyword()
    {
        return $this->belongsTo(Keyword::class);
    }
}
