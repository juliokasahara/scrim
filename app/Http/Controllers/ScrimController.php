<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

use Illuminate\Http\Request;
use App\Models\Scrim;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Session;


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

    
    public function detalhe($idScrim,Request $request)
    {

        $users = DB::table('users')
        ->select('users.id as id_user','users.name as nick','groups.*')
        ->join('group_scrims', 'users.id', '=', 'group_scrims.user_id')
        ->join('groups', 'groups.id', '=', 'group_scrims.group_id')
        ->where('group_scrims.scrim_id','=',$idScrim)->orderBy('group_scrims.created_at')
        ->get();

        $time = array();
        foreach ($users as $user) {
            $time[] =array( 'name' => $user->name, 'user' => $user);
        }

        $collection = collect($time);
        $times = $collection->mapToGroups(function ($item, $key) {
            return [$item['name'] => $item['user']];
        });
              
        return view('scrim.list_scrim',compact('times'));
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

        $returnHTML = view('scrim.select_player')->with('scrim', $scrim)->with('users', $users)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function save(Request $request)
    {
        $count = sizeOf($request->player);
        $date = Carbon::now()->format('Y-m-d h:i:s');

        
        // dd($date);

        for ($i=1; $i <= $count; $i++) { 

            $existe = DB::table('group_scrims')->where([
                'scrim_id' => $request->idScrim,
                'user_id'  => $request->player[$i],
            ])->get(); 
            
            if($existe->get(0) == null){

                DB::table('group_scrims')->insert([
                    'scrim_id' => $request->idScrim,
                    'group_id' => $request->grupo,
                    'user_id'  => $request->player[$i],
                    'created_at' => $date,
                    'posicao'  => $i
                ]);  
            
            }else{
                //retornar a pessoa e o time que pertence
                // $user = DB::table('groups')
                //     ->join('group_scrims', 'group_scrims.group_id', '=', 'groups.id') 
                //     ->where('group_scrims.users.id','=',$request->player[$i]);             
                //     dd($user);
                // Session::flash('status', 'O' . $user->name . ' Está cadastrado com o squad' . $user->groups()->group_id); 
                Session::flash('custom-error', 'O ' . $request->player[$i] . ' Está cadastrado com o squad'); 

                return redirect()->action([ScrimController::class, 'index']);
            }
        }     

        Session::flash('status', 'Grupo deletado com sucesso!'); 

        return redirect()->action([ScrimController::class, 'index']);
        
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
