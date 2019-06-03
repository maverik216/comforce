<?php

namespace App\Http\Controllers\Admin;

use App\Process;
use App\States;
use App\Cities;
use App\Status;
use App\Audits;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class ProcessesController extends Controller
{
    /**
    * Display a listing of Process.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
        
        $processes = Process::all();

        return view('admin.process.index', compact('processes'));
       
   }
   public function general()
   {
       if (! Gate::allows('requester_manage')) {
           return abort(401);
       }

       $processes = Process::all();

       return view('admin.process.index', compact('processes'));
   }
    /**
    * Display a listing of Process.
    *
    * @return \Illuminate\Http\Response
    */
   public function requester()
   {
       if (! Gate::allows('requester_manage')) {
           return abort(401);
       }

       $processes = Process::whereHas("status", function($q){ $q->where("role_id", "2"); })->get();

       return view('admin.process.index', compact('processes'));
   }
    
   /**
    * Display a listing of Process.
    *
    * @return \Illuminate\Http\Response
    */
   public function approver()
   {
       if (! Gate::allows('approver_manage')) {
           return abort(401);
       }

       $processes = Process::whereHas("status", function($q){ $q->where("role_id", "3"); })->get();

       return view('admin.process.index', compact('processes'));
   }

   
    /**
     * Show the form for creating new Process.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('requester_manage')) {
            return abort(401);
        }
        // $roles = Role::get()->pluck('name', 'name');
        $states = States::all()->pluck('name', 'id');;

        
        return view('admin.process.create', compact('states'));
    }

    /**
     * Store a newly created Process in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (! Gate::allows('requester_manage')) {
        //     return abort(401);
        // }
        // $Process = Process::create($request->all());
        $cid = Process::orderBy('id', 'desc')->first()->id + 1;
        $pid = rand(10000,999999).$cid;

        $process = new Process();
        $process->process_id = $pid;
        $process->description = $request->input("description");
        $process->approved = 0;
        $process->finished = 0;

        
        $selectedCity = $request->input('city_id') ? $request->input('city_id') : 0;

        $city =  Cities::findOrFail($selectedCity);
        $process->city()->associate($city);
        $status =  Status::findOrFail(1);
        $process->status()->associate($status);

        $process->save();
        
        $user = Auth::user();
        $action = array("action"=>"Solicitante crea un proceso","process"=>$process->id);
        $audit = new Audits();
        $audit->action = json_encode($action);
        $audit->user()->associate($user);
        $audit->save();
        return $this->requester();
    }


    /**
     * Show the form for editing UseProcessr.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        // $roles = Role::get()->pluck('name', 'name');
        $users = User::whereHas("roles", function($q){ $q->where("name", "coach"); })->get()->pluck('name','id');
        

        $Process = Process::findOrFail($id);

        $days = json_decode($Process->days);

        $day['lunes'] = in_array('lunes',$days);
        $day['martes'] = in_array('martes',$days);
        $day['miercoles'] = in_array('miercoles',$days);
        $day['jueves'] = in_array('jueves',$days);
        $day['viernes'] = in_array('viernes',$days);
        $day['sabado'] = in_array('sabado',$days);
        

        return view('admin.Processs.edit', compact('Process', 'users', 'day'));
    }

    public function show($id)
    {
        $this->next($id);
    }

    /**
     * Show the form for editing UseProcessr.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function next($id)
    {
        
        // var_dump($id);exit;
        $process = Process::findOrFail($id);
        
        $status = $process->status->id;

        switch($status){
            case 1:
            
                return view('admin.process.step2', compact('process', 'users', 'day'));
            break;
            case 2:
            
                return view('admin.process.step3', compact('process', 'users', 'day'));
            break;
            case 3:
            
                return view('admin.process.step4', compact('process', 'users', 'day'));
            break;
            case 4:
            
                return view('admin.process.step5', compact('process', 'users', 'day'));
            break;
        }


    }

    /**
     * Update Process in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        // echo '<pre>';
        // var_dump($request->all());exit;
        $Process = Process::findOrFail($id);
        $Process->name = $request->input("name");
        $Process->description = $request->input("description");
        $Process->place = $request->input("place");
        $Process->hour = $request->input("hour");
        $Process->start = $request->input("start");
        $Process->end = $request->input("end");
        $Process->days = json_encode($request->input("schedule"));

        $selectedUser = $request->input('user') ? $request->input('user') : [];
        $user =  User::findOrFail($selectedUser[0]);
        $Process->user()->associate($user);

        // $Process->user()->associate([$request->input("user_id")]);
        $Process->save();
        // $Process->update($request->all());
        // $roles = $request->input('roles') ? $request->input('roles') : [];
        // $Process->syncRoles($roles);

        return redirect()->route('admin.process.index');
    }
    /**
     * Update Process in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, $id)
    {
        $process = Process::findOrFail($id);
        $process->start = $request->input("start");
        $process->end = $request->input("end");
        $status =  Status::findOrFail(2);
        $process->status()->associate($status);

        $process->save();


        $user = Auth::user();
        $action = array("action"=>"Aprobador asigna fechas","process"=>$process->id);
        $audit = new Audits();
        $audit->action = json_encode($action);
        $audit->user()->associate($user);
        $audit->save();

        return redirect()->route('admin.processes.index');
    }
    /**
     * Update Process in storage.
     *
     * @param  \App\Http\Requests\Admin\UploadFileRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update3(Request $request, $id)
    {
        $file = $request->file('file');
        $process = Process::findOrFail($id);
        $process->document = $process->process_id.".".$file->getClientOriginalExtension();
        $status =  Status::findOrFail(3);
        $process->status()->associate($status);
        $process->save();
        
        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$process->process_id.".".$file->getClientOriginalExtension());
        
        $user = Auth::user();
        $action = array("action"=>"Solicitante carga documento","process"=>$process->id);
        $audit = new Audits();
        $audit->action = json_encode($action);
        $audit->user()->associate($user);
        $audit->save();
        
        return redirect()->route('admin.processes.index');
    }
    /**
     * Update Process in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update4(Request $request, $id)
    {
        $process = Process::findOrFail($id);
        $process->approved = $request->input("approved");
        $process->comment = $request->input("comment");
        $status =  Status::findOrFail(4);
        $process->status()->associate($status);

        $process->save();


        $user = Auth::user();
        $action = array("action"=>"Aprobador Aprueba o comenta","process"=>$process->id);
        $audit = new Audits();
        $audit->action = json_encode($action);
        $audit->user()->associate($user);
        $audit->save();

        return redirect()->route('admin.processes.index');
    }
    
    /**
     * Update Process in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update5(Request $request, $id)
    {
        $process = Process::findOrFail($id);
        $process->finished = 1;
        $process->approved = 2;
        $status =  Status::findOrFail(5);
        $process->status()->associate($status);

        $process->save();


        $user = Auth::user();
        $action = array("action"=>"Solicitante finaliza proceso","process"=>$process->id);
        $audit = new Audits();
        $audit->action = json_encode($action);
        $audit->user()->associate($user);
        $audit->save();

        return redirect()->route('admin.processes.index');
    }
    
    /**
     * Remove Process from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $process = Process::findOrFail($id);
        $process->delete();

        return redirect()->route('admin.process.index');
    }

    /**
     * Delete all selected Process at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Process::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
    
}
