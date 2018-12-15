<?php

namespace App\Http\Controllers;

use App\Modality;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalities = Modality::all();
        return view('modalities.index',compact('modalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modalities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Modality::create($request->all());
        return redirect()->route('modalities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $modality = Modality::findOrFail($id);
       return view('modalities.show',compact('modality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modality = Modality::findOrFail($id);
        return view('modalities.edit',compact('modality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modality = Modality::findOrFail($id)->update($request->all());
        return redirect()->route('modalities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modality  $modality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modality = Modality::findOrFail($id)->delete();
        return redirect()->route('modalities.index');
    }
}
