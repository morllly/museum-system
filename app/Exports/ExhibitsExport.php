<?php

namespace App\Exports;

use App\Models\Exhibit;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExhibitsExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $selectRow;

    public function __construct($selectRow)
    {
        $this->selectRow = $selectRow;
    }

    public function map($exhibit): array
    {
        return [
            $exhibit->inventory_number,
            $exhibit->title,
            $exhibit->keyword->title,
            $exhibit->collection->title,
            $exhibit->creator,
            $exhibit->receipt_date,
            $exhibit->entry_method,
            $exhibit->creation_time,
            $exhibit->characteristics,
            $exhibit->description,
            $exhibit->safety,
        ];
    }

    public function headings(): array
    {
        return [
            'Инвентарный номер',
            'Наименование',
            'Ключевое слово',
            'Коллекция',
            'Автор, изготовитель',
            'Дата поступления',
            'Способ поступления',
            'Время создания',
            'Размер, материал, техника',
            'Краткое описание',
            'Сохранность',
        ];
    }

    public function query()
    {
        return Exhibit::with('collection:id,title')->with('keyword:id,title')->whereIn('id', $this->selectRow);
    }
}
