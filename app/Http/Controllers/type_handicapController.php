<?php

namespace App\Http\Controllers;

use App\Exports\exportTypeHandicap;
use App\Imports\importTypeHandicap;
use App\Models\type_handicap;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class type_handicapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = type_handicap::paginate(2);
        return view('type handicap.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type handicap.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type_handicap' => 'required|string',
            'description' => 'required|string',
        ]);

        $type_handicap = new type_handicap;
        $type_handicap->nom = $request->type_handicap;
        $type_handicap->description = $request->description;
        $type_handicap->save();
        return redirect('typeHandicap');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\type_handicap  $type_handicap
     * @return \Illuminate\Http\Response
     */
    public function show(type_handicap $type_handicap)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\type_handicap  $type_handicap
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_handicap = type_handicap::find($id);
        return view('type handicap.edit',compact('type_handicap'));
    }

    /**
     * Update the specified resource in storag
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\type_handicap  $type_handicap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type_handicap' => 'required|string',
            'description' => 'required|string',
        ]);
        $type_handicap =type_handicap::find($id);
        $type_handicap->nom = $request->type_handicap;
        $type_handicap->description = $request->description;
        $type_handicap->save();
        return redirect('typeHandicap');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\type_handicap  $type_handicap
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = type_handicap::find($id)->delete();
        return redirect('typeHandicap');
    }

  
    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        $query = $request->get('query');
      $data = DB::table('type_handicaps')
                    ->where('nom', 'like', '%'.$query.'%')
                    // ->orWhere('Nom_tache', 'like', '%'.$query.'%')
                    ->paginate(2);
                    // dd($data);
      return view('type handicap.paginate_table', compact('data'))->render();
     }
    }

    public function export()
    {
        return Excel::download(new exportTypeHandicap, 'type-handicap.xlsx');
    }


    public function import(Request $request)
    {
        Excel::import(new importTypeHandicap,$request->file);
        return back();
    }

    

}
