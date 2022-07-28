<?php

namespace App\Http\Controllers;
use App\Models\Olduniversity;
use Illuminate\Http\Request;

class OlduniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $olduniversity = Olduniversity::all();
        $olduniversities = Olduniversity::latest()->paginate(10);
        return view('olduniversities.index',compact('olduniversities'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('olduniversities.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $olduniversity =(new Olduniversity)->create($request->all());
        return redirect()->route('olduniversities.index')
        ->with('success','uni created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Olduniversity  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function show(Olduniversity $olduniversity)
    {

        return view('olduniversities.show',compact('olduniversity'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Olduniversity  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function edit(Olduniversity $olduniversity)
    {
        return view('olduniversities.edit',compact('olduniversity'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Olduniversity  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Olduniversity $olduniversity)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $olduniversity -> update($request->all());
        return redirect()->route('olduniversities.index')
        ->with('success','uni updatet');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Olduniversity  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Olduniversity $olduniversity)
    {
        $olduniversity->delete();
        return redirect()->route('olduniversities.index')
        ->with('success','uni deleted');
    }
}
