<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    /*public function __construct()
    {
        $this->authorizeResource(Menu::class, 'menu'); 
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('menus-read'))abort(403);
        $menus =  Menu::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('location','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();
        return view('admin.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('menus-create'))abort(403);
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('menus-create'))abort(403);
        $request->validate([
            'title'=>"required|max:190",
            'location'=>"required|unique:menus,location"
        ]);
        Menu::create([
            'title'=>$request->title,
            'location'=>$request->location,
        ]);
        toastr()->success('تمت العملية بنجاح','عملية ناجحة');
        return redirect()->route('admin.menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        if(!auth()->user()->isAbleTo('menus-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        if(!auth()->user()->isAbleTo('menus-update'))abort(403);
        return view('admin.menus.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        if(!auth()->user()->isAbleTo('menus-update'))abort(403);
        $request->validate([
            'title'=>"required|max:190",
            'location'=>"required|unique:menus,location,".$menu->id,
        ]);
        $menu->update([
            'title'=>$request->title,
            'location'=>$request->location,
        ]);
        toastr()->success('تمت العملية بنجاح','عملية ناجحة');
        return redirect()->route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if(!auth()->user()->isAbleTo('menus-delete'))abort(403);
        $menu->delete();
        toastr()->success('تمت العملية بنجاح','عملية ناجحة');
        return redirect()->route('admin.menus.index');
    }
}
