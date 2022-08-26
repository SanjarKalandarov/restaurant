<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CateoryRequest;
use App\Http\Requests\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus=Menu::paginate(10);
        return  view('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories=Category::all();

        return view('admin.menu.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
$menu=new Menu();
$menu->name=$request->name;
$menu->description=$request->description;
$menu->price=$request->price;


//dd($request->categories);
   /*     dd($request->has('categories'))
if($request->has('categories')){
    $menu->categories()->attach($request->categories);
}*/


        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/categories/'), $filename);
            $menu['image'] = $filename;
        }
        $menu->save();
        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }

        return  redirect(route('admin.menu.index'))->with('success','Menu yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu=Menu::find($id);
        $categories=Category::all();
        return view('admin.menu.edit',compact('menu','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $menu=Menu::find($id);
        $menu->name=$request->name;
        $menu->description=$request->description;
        if($request->hasFile('image')){
            $img=public_path('images/categories/').$menu->image;
            if(File::exists($img)){
                File::delete($img);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/categories/'), $filename);
            $menu['image'] = $filename;

        }
        $menu->update();
        return  redirect(route('admin.menu.index'))->with('success','Menu Tahrirlndi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $news = Menu::findOrFail($id);
        $image_path =public_path("images/menu/").$news->image;

        if (File::exists($image_path)) {
            //File::delete($image_path);
            unlink($image_path);
        }
        $news->delete();
        return  redirect(route('admin.menu.index'))->with('danger','menu ochirildi');
    }
}
