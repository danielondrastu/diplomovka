<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\TeachingActivities;
use App\Models\AllCourses;
use stdClass;

class TeachingActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $courseData = AllCourses::find($id);
        $allActivities = DB::table('teaching_activities')
                                ->where('course_id', $id)
                                ->leftJoin('users', 'teacher', '=', 'users.id' )
                                ->leftJoin('rooms', 'teaching_place', '=', 'rooms.id')
                                ->select('teaching_activities.*', 'name', 'room_name')
                                ->get();

        return view('teaching-activities', ['courseData' => $courseData, 'allActivities' => $allActivities]);
    }

    public function showActivityDetail($id)

    {
        $data = TeachingActivities::find($id);
        return view('dashboard', ['data' => $data]);
    }

    public function showActivity($id)
    {
        $data = TeachingActivities::find($id);
        $course = AllCourses::find($data['course_id']);
        return view('edit-activity', ['data' => $data, 'course' => $course]);
    }

    public function updateActivity(Request $req)
    {
        $data = TeachingActivities::find($req->id);

        $data->teacher = $req->teacher;
        $data->activity_type = $req->activity_type;
        $data->teaching_place = $req->teaching_place;
        $data->meeting_link = $req->meeting_link;
        $data->only_online = $req->only_online;
        $data->set_time_allocation = $req->set_time_allocation;
        $data->only_online = $req->only_online;
        $data->day = $req->activity_day;

        $h_start_time = $req->activity_start;
        $h_end_time = $req->activity_start + $req->set_time_allocation;

        $data->start_time = $h_start_time;
        $data->end_time = $h_end_time;
        $data->teaching_weeks = json_encode($req->weeks_selection);

        $data->save();

        $ins = array(
            'user_id' => $req->teacher,
            'activity_role' => 1
        );
        DB::table('user_activities_pairings')
            ->updateOrInsert(
                ['activity_id'=>$req->id], $ins                        
            );
        return redirect('allCourses');
    }

    public function newActivity($id)
    {
        $course = AllCourses::find($id);
        return view('new-activity', ['course' => $course]);
    }

    public function createActivity(Request $req)
    {
        $h_end_time=$req->activity_start+$req->set_time_allocation;

        $data = array(
            'course_id' => $req->course_id,
            'teacher' => $req->teacher,
            'activity_type' => $req->activity_type,
            'set_time_allocation' => $req->set_time_allocation,
            'day' => $req->activity_day,
            'start_time' => $req->activity_start,
            'end_time' => $h_end_time
        );
        TeachingActivities::create($data);
        return redirect('allCourses');
    }

    public function deleteActivity ($course_id, $activity_id)
    {
        $del = TeachingActivities::find($activity_id);
        $del->delete();

        return redirect('teachingActivities/'.$course_id);

    }

    public function showMyTeaching ()
    {
        $userID = Auth::user()->id;
        $actList = DB::table('user_activities_pairings')
                        ->where('user_id', $userID)
                        ->where('activity_role', 1)
                        ->leftJoin('teaching_activities', 'user_activities_pairings.activity_id', '=', 'teaching_activities.id')
                        ->leftJoin('all_courses', 'teaching_activities.course_id', '=', 'all_courses.id')
                        ->select('user_activities_pairings.*', 'name', 'activity_type', 'teaching_activities.day', 'start_time', 'end_time')
                        ->get();
        return view ('my-teachings', ['userID'=>$userID, 'actList'=>$actList]);
    }

    public function showStudentsList ($id) 
    {
        $studList = DB::table('user_activities_pairings')
        ->where('activity_id', $id)
        ->where('activity_role', 2)
        ->leftJoin('users', 'user_activities_pairings.user_id', '=', 'users.id')
        ->select('user_activities_pairings.*', 'name', 'email')
        ->get();
        return view ('my-teachings-detail', ['studList'=>$studList]);
    }

    public function removeStudentFromActivity ($record_id, $activity_id) 
    {
        DB::table('user_activities_pairings')->where('id', $record_id)->delete();
        $addrs = "/editTeachingActivity/".$activity_id;
        return redirect($addrs);
    }

    public function removeFromActivity ($record_id) 
    {
        DB::table('user_activities_pairings')->where('id', $record_id)->delete();
        return redirect ('dashboard');
    }

    public function registerUserToActivity (Request $req)
    {
        $toInsert = array(
            'user_id' => $req->user_id,
            'activity_id' => $req->activity_id,
            'activity_role' => $req->activity_role,
        );
        DB::table('user_activities_pairings')->insert($toInsert);
        $addrs = "/editTeachingActivity/".$req->activity_id;
        return redirect($addrs);
        
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
