<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){


        $users = DB::table('users')
        ->select('users.name','groups.user_owner_id','group_users.user_id','group_users.group_id')
        ->join('group_users', 'users.id', '=', 'group_users.user_id')
        ->join('groups', 'groups.id', '=', 'group_users.group_id')
        ->where('group_users.group_id','=',$request->id)
        ->get();

        /* dd($users); */
        return view('time.index',compact('users'));

    }

    public function delete($id,$idGrupo)
    {

        DB::table('group_users')
        ->where('user_id', $id)
        ->where('group_id', $idGrupo)
        ->delete();

        Session::flash('status', 'Usuário deletado com sucesso!');  

        return redirect()->action([GroupController::class, 'index']);
    }
}
