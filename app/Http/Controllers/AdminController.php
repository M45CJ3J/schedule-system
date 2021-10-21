<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Response;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')  ; 
    }

    public function index()
    {
        $schedules = Schedule::with('user')->get()->where('status','not approved');
        return view('admin.index')->with('schedules',$schedules);
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit')->with('schedules',Schedule::Where('id',$id)->first());
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
         Schedule::where('id', $id)
            ->update([
                'status' => $request->input('status'),
               ]);

        return redirect('admin')
            ->with('message', 'request status has been updated!');
    }


}
