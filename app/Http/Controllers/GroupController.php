<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\Scrim;

class GroupController extends Controller
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

    public function index(Request $request){

        $user = $request->user();
        $group = new Group;
        $groups = $user->groups()->where('user_id', '=', $user->id)->paginate(Config::get('constantes.paginacao.padrao'));

        return view('group.index',compact('groups','user'));

    }

    public function add(){

        return view('group.add');
    }

    public function save(Request $request){

        $input = $request->all();
        $input['user_owner_id'] = $request->user()->id;
        $input['hash'] = md5($request->user()->id.$request->name);

        $group = \App\Models\Group::create($input);

        DB::table('group_users')->insert([
            'user_id' => $request->user()->id,
            'group_id' => $group->id
        ]);

        Session::flash('status', 'Salvo com sucesso!'); 

        return redirect()->route('group.add');
    }

    public function edit($id,Request $request){

        $user = $request->user();

        $idGroup = DB::table('users')
        ->select('groups.id')
        ->join('groups', 'users.id', '=', 'groups.user_owner_id')
        ->where('users.id','=',$user->id)
        ->where('groups.id','=',$id)
        ->get();


        if($idGroup->get(0) == false ){
            Session::flash('status', 'Não existeee!!!!!!!!!eee esse grupo'); 

            return redirect()->action([GroupController::class, 'index']);
        }

        $group = \App\Models\Group::find($id);

        if(!$group){
            Session::flash('status', 'Não existe esse grupo'); 

            return redirect()->view('group.add'); 
        }

        return view('group.edit',compact('group'));
    }

    public function update(Request $request,$id)
    {
        \App\Models\Group::find($id)->update($request->all());

        Session::flash('status', 'Atualizado com sucesso!'); 

        return redirect()->action([GroupController::class, 'index']);
    }

    public function delete($id)
    {
        DB::table('group_users')->where('group_id', $id)->delete();

        $group = \App\Models\Group::find($id);
        $group->delete();

        Session::flash('status', 'Grupo deletado com sucesso!'); 

        return redirect()->action([GroupController::class, 'index']);
    }


}
