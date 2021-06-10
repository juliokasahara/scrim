<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('usuario.index');
    }

    public function addTeam(Request $request){
      
        $idGroup = DB::table('groups')
        ->select('groups.id')
        ->where('groups.hash','=',$request->hash)->get();

        if (!empty($idGroup->get(0)->id)) {
            $int = (int) $idGroup->get(0)->id;
    
            $group = DB::table('group_users')
            ->select('group_id')
            ->where('user_id','=',$request->user()->id)
            ->where('group_id','=',$int)->get();          
                    
            if (empty($group->get(0)->group_id)) {
                DB::table('group_users')->insert([
                    'user_id' => $request->user()->id,
                    'group_id' => $idGroup->get(0)->id
                ]);
            }else{
                Session::flash('custom-error', 'Você já está cadastrado no grupo!');  
                return redirect()->action([GroupController::class, 'index']);
            }
        }else{
            Session::flash('custom-error', 'Convite inválido!'); 
            return redirect()->action([GroupController::class, 'index']);
        }
        
        return redirect()->action([GroupController::class, 'index']);
 
    }
    
}
