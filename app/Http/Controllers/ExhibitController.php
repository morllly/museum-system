<?php

namespace App\Http\Controllers;

use App\Models\Exhibit;
use App\Models\MuseumCollection;
use App\Models\Keyword;
use Illuminate\Http\Request;

use App\Imports\ExhibitsImport;
use Maatwebsite\Excel\Facades\Excel;

class ExhibitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.exhibits.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collections = MuseumCollection::all();
        $keywords = Keyword::all();
        return view('admin.exhibits.createAndEdit')->with('collections', $collections)->with('keywords', $keywords);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('image')){
            $image = str_replace("public/images/", "", $request->file('image')->store('public/images'));
        };

        $exhibit = new Exhibit([
            'inventory_number'  =>$request->get('inventory_number'),
            'title'             =>$request->get('title'),
            'keyword_id'        =>$request->get('keyword_id'),
            'collection_id'     =>$request->get('collection_id'),
            'creator'           =>$request->get('creator'),
            'receipt_date'      =>$request->get('receipt_date'),
            'entry_method'      =>$request->get('entry_method'),
            'creation_time'     =>$request->get('creation_time'),
            'characteristics'   =>$request->get('characteristics'),
            'description'       =>$request->get('description'),
            'safety'            =>$request->get('safety'),
            'image'             =>$image,
        ]);

        $exhibit->save();

        return redirect('dashboard/exhibits')->with('success','Данные успешно добавлены!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collections = MuseumCollection::all();
        $keywords = Keyword::all();

        $exhibit = Exhibit::with('collection')->with('keyword')->findOrFail($id);

        return view('admin.exhibits.createAndEdit', compact('exhibit'))->with('collections', $collections)->with('keywords', $keywords);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exhibit = Exhibit::find($id);

        if($request->has('image')){
            $exhibit->image = str_replace("public/images/", "", $request->file('image')->store('public/images'));
        };

        $exhibit->inventory_number  = $request->get('inventory_number');
        $exhibit->title             = $request->get('title');
        $exhibit->keyword_id        = $request->get('keyword_id');
        $exhibit->collection_id     = $request->get('collection_id');
        $exhibit->creator           = $request->get('creator');
        $exhibit->receipt_date      = $request->get('receipt_date');
        $exhibit->entry_method      = $request->get('entry_method');
        $exhibit->creation_time     = $request->get('creation_time');
        $exhibit->characteristics   = $request->get('characteristics');
        $exhibit->description       = $request->get('description');
        $exhibit->safety            = $request->get('safety');

        $exhibit->save();

        return redirect('dashboard/exhibits')->with('success','Данные успешно добавлены!');
    }

    public function import(Request $request)
    {
        Excel::import(new ExhibitsImport, $request->file('exhibit_file'));

        return back();
    }
}
