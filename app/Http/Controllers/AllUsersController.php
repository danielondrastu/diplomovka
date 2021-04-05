<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\TeachingActivities;

class AllUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('all-users');
    }

    public function showUser ($id)
    {
        $data = User::find($id);
        $userRole = DB::table('role_user')->where('user_id', $id)->first(); // this is stdClass object
        $actList = DB::table('user_activities_pairings')
                        ->where('user_id', $id)
                        ->leftJoin('teaching_activities', 'user_activities_pairings.activity_id', '=', 'teaching_activities.id')
                        ->leftJoin('all_courses', 'teaching_activities.course_id', '=', 'all_courses.id')
                        ->leftJoin('educ_role', 'user_activities_pairings.activity_role', '=', 'educ_role.role_id')
                        ->select('user_activities_pairings.*', 'name', 'teaching_activities.day', 'start_time', 'role_name')
                        ->get();
        $roleList = DB::table('roles')->get();
        $allActivities = DB::table('teaching_activities')
                            ->leftJoin('all_courses', 'course_id', '=', 'all_courses.id')
                            ->select('teaching_activities.*', 'name')
                            ->get();
        return view('edit-user', ['data'=>$data, 'userRole'=>$userRole, 'actList'=>$actList, 'allActivities'=>$allActivities, 'roleList'=>$roleList]);
    }

    public function registerToActivity (Request $req)
    {
        $toInsert = array(
            'user_id' => $req->user_id,
            'activity_id' => $req->select_activity,
            'activity_role' => $req->activity_role,
        );
        DB::table('user_activities_pairings')->insert($toInsert);
        $addrs = "/editUser/".$req->user_id;
        return redirect($addrs);
        
    }

    public function removeFromActivity ($record_id, $user_id) 
    {
        DB::table('user_activities_pairings')->where('id', $record_id)->delete();
        $addrs = "/editUser/".$user_id;
        return redirect($addrs);

        return view ('all-users');
    }

    public function updateUser(Request $req)
    {
        $userData = User::find($req->id);
        $userData->email = $req->email;
        $userData->username = $req->username;
        $userData->save();

        if ($req->role != null) {
            $role = DB::table('role_user')
            ->where('user_id', $req->id)
            ->update(['role_id'=>$req->role]);
        }
        return view ('all-users');

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
