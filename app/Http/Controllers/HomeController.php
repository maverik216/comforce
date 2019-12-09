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
       
        $process = 10;
        $countProcess = 10;
        $requester = 10;
        $countRequester = 10;
        $approver = 10;
        $countApprover = 10;
        $approved = 10;
        $countApproved = 10;
        $unapproved = 10;
        $countUnapproved = 10;
        $finished = 10;
        $countFinished = 10;

        return view('home',compact('countProcess','countRequester','countApprover','countApproved','countUnapproved','countFinished'));
    }
}
