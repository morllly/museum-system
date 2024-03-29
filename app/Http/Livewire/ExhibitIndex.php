<?php

namespace App\Http\Livewire;

use App\Models\Exhibit;
use App\Models\MuseumCollection;
use App\Models\Keyword;

use App\Exports\ExhibitsExport;
use Maatwebsite\Excel\Facades\Excel;

use Livewire\Component;
use Livewire\WithPagination;

class ExhibitIndex extends Component
{
    use WithPagination;

    public $confirmDeletion = false;
    public $confirmDeletionSelected = false;
    public $showInfo = false;

    public $exhibitInfo = null;

    public $displayedRecords = 10;

    public $search = "";

    public $filterCollection = null;
    public $filterKeyword = null;

    public $selectRow = [];
    public $selectAllRows = false;
    public $countSelected = null;

    public function getExhibitsProperty()
    {
        return Exhibit::orderBy('id','ASC')
                        ->with('collection')
                        ->with('keyword')
                        ->when($this->filterCollection, function($query){
                            return $query->where('collection_id', $this->filterCollection);
                        })
                        ->when($this->filterKeyword, function($query){
                            return $query->where('keyword_id', $this->filterKeyword);
                        })
                        ->whereLike([
                                    'inventory_number',
                                    'title',
                                    'creator',
                                    'receipt_date',
                                    'entry_method',
                                    'creation_time',
                                    'characteristics',
                                    'description',
                                    'safety',
                                ], $this->search);
    }

    public function render()
    {
        $collections = MuseumCollection::all();
        $keywords = Keyword::all();

        $exhibits = $this->exhibits->paginate($this->displayedRecords);

        return view('livewire.exhibit-index', compact('exhibits'))
                                            ->with('collections', $collections)
                                            ->with('keywords', $keywords);
    }

    public function close()
    {
        $this->confirmDeletion = false;
        $this->confirmDeletionSelected = false;
        $this->showInfo = false;
    }

    public function show($id)
    {
        $this->showInfo = true;

        $collections = MuseumCollection::all();
        $keywords = Keyword::all();

        $this->exhibitInfo = Exhibit::with('collection')->with('keyword')->findOrFail($id);
    }

    public function confirmDeletion($id)
    {
        $this->confirmDeletion = $id;
    }

    public function delete($id)
    {
        Exhibit::find($id)->delete();

        $this->confirmDeletion = false;

        session()->flash('success', 'Данные успешно удалены!');
    }

    public function confirmDeletionSelected()
    {
        $this->confirmDeletionSelected = true;
    }

    public function deleteSelected()
    {
        Exhibit::whereIn('id', $this->selectRow)->delete();

        $this->selectRow = [];
        $this->selectAllRows = false;
        $this->countSelected = null;

        $this->confirmDeletionSelected = false;

        session()->flash('success', 'Данные успешно удалены!');
    }

    public function updatedSelectAllRows($value)
    {
        if($value){
            $this->selectRow = $this->exhibits->pluck('id');
        }else{
            $this->selectRow = [];
        };

        $this->countSelected = count($this->selectRow);
    }

    public function updatedSelectRow($value)
    {
        $sum = $this->exhibits->count();

        if(count($value) == $sum) {
            $this->selectAllRows = true;
        }else{
            $this->selectAllRows = false;
        }

        $this->countSelected = count($this->selectRow);
    }

    public function export()
    {
        return (new ExhibitsExport($this->selectRow))->download('Экспонаты.xls');
    }

}
