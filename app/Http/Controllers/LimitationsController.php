<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LimitationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $data = DB::table('user_limitations')
                    ->where('user_id', $userID)
                    ->first();
        if ($data == null) {
            
            $lm = array (
                'limit_monday' => '0000000000000',
                'limit_tuesday' => '0000000000000',
                'limit_wednesday' => '0000000000000',
                'limit_thursday' => '0000000000000',
                'limit_friday' => '0000000000000',
            );
            $data = json_decode(json_encode($lm));

        }
        return view ('my-time-preferences', ['data'=>$data, 'userID'=>$userID]);
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
    public function store(Request $req)
    {


        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        $start = 7;
        $stop = 20;
        $ins = [];

        foreach ($days as $day) {
            $limName = "limit_".$day;

            $$limName = "";
            for ($i=$start; $i<$stop; $i++) {
                $inpName = "in".$day.$i;
                
                if ($req->$inpName=="0") {
                    $$limName = $$limName."0";
                } else if ($req->$inpName=="1") {
                    $$limName = $$limName."1";
                } else if ($req->$inpName=="2") {
                    $$limName = $$limName."2";
                } 

            }

            $ins[$limName] = $$limName;

        }

        DB::table('user_limitations')
                    ->updateOrInsert(
                        ['user_id'=>$req->id], $ins                        
                    );
        return redirect()->route('dashboard');            

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
