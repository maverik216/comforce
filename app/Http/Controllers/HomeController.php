<?php

namespace App\Http\Controllers;

use App\User;
use App\Process;
use App\Admin\Session;
use App\Admin\Register;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $process = Process::all();
        $countProcess = count($process);
        $requester = Process::whereHas("status", function($q){ $q->where("role_id", "2"); })->get();
        $countRequester = count($requester);
        $approver = Process::whereHas("status", function($q){ $q->where("role_id", "3"); })->get();
        $countApprover = count($approver);
        $approved = Process::where("approved", 1)->get();
        $countApproved = count($approved);
        $unapproved = Process::where("approved", 0)->get();
        $countUnapproved = count($unapproved);
        $finished = Process::where("approved", 2)->get();
        $countFinished = count($finished);

        return view('home',compact('countProcess','countRequester','countApprover','countApproved','countUnapproved','countFinished'));
    }
}
