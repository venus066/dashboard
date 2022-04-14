<?php

namespace App\Http\Controllers;

use App\Models\HubFile;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $files = HubFile::orderBy('id','DESC')->paginate();
        return view('admin.files.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HubFile  $hubFile
     * @return \Illuminate\Http\Response
     */
    public function show(HubFile $hubFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HubFile  $hubFile
     * @return \Illuminate\Http\Response
     */
    public function edit(HubFile $hubFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HubFile  $hubFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HubFile $hubFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HubFile  $hubFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(HubFile $file)
    {
        $file->forceDelete();
        //you have to remove it if you want
        flash()->success("تمت العملية بنجاح");
        return redirect()->back();
    }
}
