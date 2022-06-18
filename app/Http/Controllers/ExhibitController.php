<?php

namespace App\Http\Controllers;

use App\Models\Exhibit;
use App\Models\MuseumCollection;
use App\Models\Keyword;
use Illuminate\Http\Request;
use App\Http\Requests\ExhibitRequest;

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
     * @param  ExhibitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExhibitRequest $request)
    {
        if($request->has('image')){
            $image = str_replace("public/images/", "", $request->file('image')->store('public/images'));
        };

        $exhibit = Exhibit::create($request->validated());

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
     * @param  ExhibitRequest  $request
     * @param  \App\Models\Exhibit  $exhibit
     * @return \Illuminate\Http\Response
     */
    public function update(ExhibitRequest $request, $id)
    {
        $exhibit = Exhibit::findOrFail($id);

        if($request->has('image')){
            $exhibit->image = str_replace("public/images/", "", $request->file('image')->store('public/images'));
        };

        $exhibit->update($request->validated());

        return redirect('dashboard/exhibits')->with('success','Данные успешно отредактированы!');
    }

    public function import(Request $request)
    {
        Excel::import(new ExhibitsImport, $request->file('exhibit_file'));

        return back()->with('success','Данные успешно загружены!');
    }
}
