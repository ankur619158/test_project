<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Data;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $approved_users = User::where('status', '=', 'Approved')->paginate(10 , ['*'], 'approved_user');
        $rejected_users = User::where('status', '=', 'Rejected')->paginate(10 , ['*'], 'rejected_user');
        $pending_users  = User::where('status', '=', 'Pending' )->paginate (10 ,['*'], 'pending_user');
        $data = compact('approved_users', 'rejected_users' , 'pending_users');
        return view('admin.dashboard')->with($data);
    }

    public function admin_action(Request $request , $id , $type){
        $user = User::find($id);
        
        $user->status = $type;
        $user->save();
        return redirect()->route('admin.dashboard');
    }
}
