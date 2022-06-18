<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exhibit;
use App\Models\MuseumCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $sumExhibits = Exhibit::all()->count();
        $sumCollections = MuseumCollection::all()->count();

        return view('admin.index', compact('sumExhibits', 'sumCollections'));
    }
}
