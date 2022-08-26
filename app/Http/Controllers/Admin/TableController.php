<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables=Table::all();
        return  view('admin.table.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {return  view('admin.table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TableRequest $request)
    {
      $table=new Table();
      $table->name=$request->name;
      $table->guest_number=$request->guest_number;
//      dd($request->status);
      $table->status=$request->status;

      $table->location=$request->location;
      $table->save();
      return redirect(route('admin.table.index'))->with('success','Table yaratildi');
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
        $tables=Table::find($id);
        return  view('admin.table.edit',compact('tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(TableRequest $request, $id)
    {
        $table=Table::find($id);
        $table->name=$request->name;
        $table->guest_number=$request->guest_number;
        $table->status=$request->status;
        $table->location=$request->location;
        $table->save();
        return  redirect(route('admin.table.index'))->with('success','Table tahrirlndi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table=Table::find($id);
        $table->delete();
        return  redirect(route('admin.table.index'))->with('danger','Table ochirildi');
    }
}
