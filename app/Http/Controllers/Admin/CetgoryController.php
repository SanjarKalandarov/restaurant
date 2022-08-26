<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CateoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CetgoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories=Category::paginate(5);

        return  view('admin.category.index',[
            'categories'=>$categories
                ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateoryRequest $request)
    {
       $category=new Category();
       $category->name=$request->name;
        $category->description=$request->description;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/categories/'), $filename);
            $category['image'] = $filename;
        }
        $category->save();
      return  redirect(route('admin.category.index'))->with('success','Categoriya yaratildi');

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category=Category::find($id);

        return  view('admin.category.edit',compact('category'));
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
        $category=Category::find($id);
        $category->name=$request->name;
        $category->description=$request->description;
        if($request->hasFile('image')){
                $img=public_path('images/categories/').$category->image;
                if(File::exists($img)){
                    File::delete($img);
                }

                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/categories/'), $filename);
                $category['image'] = $filename;

        }
        $category->update();
return  redirect(route('admin.category.index'))->with('success','Categoriya tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $news = Category::findOrFail($id);
        $news->menus()->detach();
        $image_path =public_path("images/categories/").$news->image;

        if (File::exists($image_path)) {
            //File::delete($image_path);
            unlink($image_path);
        }

        $news->delete();
        return  redirect(route('admin.category.index'))->with('danger','Categoriya ochiirildi');
    }
}
