<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Special;

class SpecialController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $olduniversity = Olduniversity::all();
        $specials = Special::latest()->paginate(10);
        return view('specials.index',compact('specials'));

    }
    public function index2()
    {
       // $olduniversity = Olduniversity::all();
       $specials = Special::latest()->paginate(10);
        return view('/welcome',compact('specials'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $collage_id =  $request -> collage_id;
        return view('specials.create',compact('collage_id'));
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
        $namespecial =  $request -> name;
        $special =(new Special)->create($request->all());
        return redirect()->route('specials.index')
        ->with('success','Special created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Special  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function show(Special $special)
    {

        return view('specials.show',compact('special'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Special  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function edit(Special $special)
    {
        return view('specials.edit',compact('special'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Olduniversity  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Special $special)
    {
        $request->validate([
            'name'=>'required',
            'collage_id'=>'required'

        ]);
        $special -> update($request->all());
        return redirect()->route('specials.index')
        ->with('success','Special updatet');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Olduniversity  $olduniversity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Special $special)
    {
        $special->delete();
        return redirect()->route('specials.index')
        ->with('success','Special deleted');
    }
}
