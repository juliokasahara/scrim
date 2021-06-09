<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Scrim;

class ScrimController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addScrim($id,Request $request)
    {
        $scrim = Scrim::find($id);

        $user = $request->user();

        $groups = $user->groups()->where('user_id', '=', $user->id)->get();

        return view('scrim.add_scrim',compact('scrim','groups'));
    }

    public function loadTime($idGroup,$idScrim)
    {

        $users = DB::table('users')
        ->select('users.id','users.name')
        ->join('group_users', 'users.id', '=', 'group_users.user_id')
        ->join('groups', 'groups.id', '=', 'group_users.group_id')
        ->where('group_users.group_id','=',$idGroup)
        ->get();

        $scrim = Scrim::find($idScrim);

        // return view('scrim.select_player',compact('users','scrim'));

        $returnHTML = view('scrim.select_player')->with('scrim', $scrim)->with('users', $users)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $scrims = DB::table('scrims')->paginate(Config::get('constantes.paginacao.padrao'));

        return view('scrim.index',compact('scrims'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
