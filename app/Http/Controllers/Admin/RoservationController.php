<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RosevationRequest;
use App\Models\Roservation;
use App\Models\Table;
use Illuminate\Http\Request;

class RoservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roservations=Roservation::all();
        return  view('admin.roservation.index',compact('roservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables=Table::all();
        return  view('admin.roservation.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RosevationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store( RosevationRequest $request)
    {
        $table=Table::findORFail($request->table_id);
        if($request->guest_number>$table->guest_number)
        {
            return back()->with('warning','mehmonlar uchun stol bazasini tanlang');
        }
  Roservation::create($request->validated());

        return  redirect(route('admin.roservation.index'))->with('success','Reservation yaratildi');;
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
        $roservation=Roservation::find($id);
        $tables=Table::all();
        return  view('admin.roservation.edit',compact('roservation','tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RosevationRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RosevationRequest $request, $id)
    {
        $roser=Roservation::find($id);

        $roser->update($request->all());
        return  to_route('admin.roservation.index')->with('success','Reservation tahrirlndi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Roservation::find($id);
        $d->delete();
        return  to_route('admin.roservation.index')->with('danger','Reservation ochirildi');
    }
}
