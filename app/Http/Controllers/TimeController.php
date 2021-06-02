<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TimeController extends Controller
{
    public function index(Request $request){


        $users = DB::table('users')
        ->select('users.name','groups.user_owner_id','group_user.id_user','group_user.id_group')
        ->join('group_user', 'users.id', '=', 'group_user.id_user')
        ->join('groups', 'groups.id', '=', 'group_user.id_group')
        ->where('group_user.id_group','=',$request->id)
        ->get();

        /* dd($users); */
        return view('time.index',compact('users'));

    }

    public function delete($id,$idGrupo)
    {

        DB::table('group_user')
        ->where('id_user', $id)
        ->where('id_group', $idGrupo)
        ->delete();

        Session::flash('status', 'Usuário deletado com sucesso!');  

        return redirect()->action([GroupController::class, 'index']);
    }
}
