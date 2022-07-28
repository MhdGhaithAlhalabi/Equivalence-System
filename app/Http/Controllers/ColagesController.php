<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Collage;

class ColagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $olduniversity = Olduniversity::all();
        $collages = Collage::latest()->paginate(10);
        return view('collages.index',compact('collages'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $olduniversity_id = $request->olduniversity_id;
        return view('collages.create',compact('olduniversity_id'));
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
            'name'=>'required',
            'olduniversity_id'=>'required'
        ]);
        $namecollage = $request->name;
        $collage =(new Collage)->create($request->all());
        return redirect()->route('collages.index')
        ->with('success','Collage created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Olduniversity  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function show(Collage $collage)
    {

        return view('collages.show',compact('collage'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Olduniversity  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function edit(Collage $collage)
    {
        return view('collages.edit',compact('collage'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Olduniversity  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collage $collage)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $collage -> update($request->all());
        return redirect()->route('collages.index')
        ->with('success','Collage updatet');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Olduniversity  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collage $collage)
    {
        $collage->delete();
        return redirect()->route('collages.index')
        ->with('success','collage deleted');
    }
}
