<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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

    public function index(){

        $groups = \App\Models\Group::paginate(5);

       // Dispatch::where('user_id', Auth::id())->paginate(10);

        return view('group.index',compact('groups'));

    }

    public function add(){

        return view('group.add');
    }

    public function save(Request $request){
        \App\Models\Group::create($request->all());

        Session::flash('status', 'Salvo com sucesso!'); 

        return redirect()->route('group.add');
    }

    public function edit($id){
        $group = \App\Models\Group::find($id);

        if(!$group){
            Session::flash('status', 'Não existe esse grupo'); 

            return redirect()->route('group.add');  
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
        $group = \App\Models\Group::find($id);
        $group->delete();

        Session::flash('status', 'Grupo deletado com sucesso!'); 

        return redirect()->action([GroupController::class, 'index']);
    }

    public function detail($id)
    {
        
    }

}
