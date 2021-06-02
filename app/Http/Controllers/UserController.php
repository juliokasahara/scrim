<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    
            $group = DB::table('group_user')
            ->select('id_group')
            ->where('id_user','=',$request->user()->id)
            ->where('id_group','=',$int)->get();          
                    
            if (empty($group->get(0)->id_group)) {
                DB::table('group_user')->insert([
                    'id_user' => $request->user()->id,
                    'id_group' => $idGroup->get(0)->id
                ]);
            }else{
                dd('JÁ ESTA NO TIME');  
            }
        }else{
            dd('não existe');
        }
        
        return redirect()->action([GroupController::class, 'index']);
 
    }
    
}
