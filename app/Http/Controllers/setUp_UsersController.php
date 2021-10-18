<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Collective\Html\FormFacade;
use App\Models\SetUpMenu;
use Illuminate\Support\Facades\DB;

class setUp_UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     /*   $users = DB::table('menus')
        ->rightJoin('set_up_menus', 'menus.id', '=', 'set_up_menus.idname')
        ->where("set", '=', '1')
        //->orWhere("lv2", '=', '1')
        ->get();
*/
        //dd( $users);
        return view('setUsers.index');
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
      //  Form::checkbox('name', 'value');
      // dd( $request->all());

      SetUpMenu::create([
            'rolename' => $request['rolename'],
            'scripting' => $request['scripting'],
            'manageusers' => $request['switch1'],
            'viewusers' => $request['switch2'],
            'adduser' => $request['switch3'],
            'deleteuser' => $request['switch4'],
            'edituser' => $request['switch5'],
            'setuproles' => $request['switch6'],
            'manageaccount' => $request['switch7'],
            'manageinvoices' => $request['switch8'],
            'manageCOD' => $request['switch9'],
            'managecommissions' => $request['switch10'],
            'settings' => $request['switch11'],
            'viewshipping' => $request['switch12'],
            'editshipping' =>  $request['switch13'],
            'viewcommission' => $request['switch14'],
            'editcommission' =>  $request['switch15'],
            'report' =>  $request['switch16'],
        ]);

        return response()->json(['message'=>'บันทึก เรียบร้อย']);


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
