<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Session;

use App\Models\Schedule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// it`s a function to fetch jobs data
public function getjobs()
{
    $jobs = Job::all();
    return view('home')->with('jobs',$jobs);
   
}
    

// it`s a function to fetch appointments  data if worker are security

    public function index(Request $request)
    { 
            if($request->ajax())
            {
                 $data = Schedule::whereDate('start', '>=', $request->start)
                        ->whereDate('end',   '<=', $request->end)
                      ->where('status','approved') 
                     // ->where('schedule_job',2) 
                        ->get(['id', 'start', 'end','title']);
                return response()->json($data);
            }
        return view('home');
    } 

    // it`s afunctuin to insert data 
    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Schedule::create([

    				'start'		=>	$request->start,
    				'end'		=>	$request->end,
                    'title'		=>	$request->title,
                    'schedule_user' => auth()->user()->id,
                    'schedule_job' => auth()->user()->user_job,
    			]);
                
    			return response()->json($event);
    		}
    	}
    }







}
