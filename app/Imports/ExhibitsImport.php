<?php

namespace App\Imports;

use App\Models\Exhibit;
use App\Models\MuseumCollection;
use App\Models\Keyword;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;

class ExhibitsImport implements ToCollection, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $museum_collection = MuseumCollection::where('title', $row[3])->first();
            $keyword = Keyword::where('title', $row[2])->first();

            $data=[
                "inventory_number" => $row[0],
                "title"            => $row[1],
                "keyword_id"       => $keyword->id,
                "collection_id"    => $museum_collection->id,
                "receipt_date"     => date("Y-m-d", strtotime(request($row[4]))),
                "entry_method"     => $row[5],
                "creator"          => $row[6],
                "creation_time"    => $row[7],
                "characteristics"  => $row[8],
                "description"      => $row[9],
                "safety"           => $row[10],
                "image"            => $row[11]
            ];
            Exhibit::create($data);
        }
    }

    public function rules(): array
    {
        return[
            0  => "required|unique:exhibits,inventory_number",
            1  => "required",
            2  => "required",
            3  => "required|exists:collections,title",
            4  => "required|date",
            5  => "required",
            6  => "required",
            7  => "required",
            8  => "required",
            9  => "required",
            10 => "required",
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Инвентарный номер',
            '1' => 'Наименование',
            '2' => 'Ключевое слово',
            '3' => 'Коллекция',
            '4' => 'Дата поступления',
            '5' => 'Способ поступления',
            '6' => 'Создатель',
            '7' => 'Время создания',
            '8' => 'Характеристики',
            '9' => 'Краткое описание',
            '10' => 'Сохранность',
        ];
    }

}
