<?php

namespace App\Http\Livewire;

use App\Models\Exhibit;
use App\Models\MuseumCollection;
use App\Models\Keyword;

use Livewire\Component;
use Livewire\WithPagination;

class ExhibitIndex extends Component
{
    use WithPagination;

    public $confirmDeletion = false;
    public $showInfo = false;

    public $exhibitInfo = null;

    public function render()
    {
        $exhibits = Exhibit::orderBy('inventory_number','ASC')
                            ->with('collection')
                            ->with('keyword')
                            ->paginate(3);

        return view('livewire.exhibit-index', [
            'exhibits' => $exhibits
        ]);
    }

    public function close(){
        $this->reset();
    }

    public function confirmDeletion($id){

        $this->confirmDeletion = $id;

    }

    public function delete($id){

        $del = Exhibit::find($id)->delete();

        $this->confirmDeletion = false;

    }

    public function show($id){

        $this->showInfo = true;

        $collections = MuseumCollection::all();
        $keywords = Keyword::all();

        $this->exhibitInfo = Exhibit::with('collection')->with('keyword')->findOrFail($id);

    }

}
