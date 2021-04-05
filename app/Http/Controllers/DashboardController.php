<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\TeachingActivities;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $tableData = [];

        foreach ($days as $dday) {
            $toData = DB::table('user_activities_pairings')
            ->where('user_id', $userID)
            ->leftJoin('teaching_activities', 'user_activities_pairings.activity_id', '=', 'teaching_activities.id')
            ->where('teaching_activities.day', $dday)
            ->leftJoin('all_courses', 'teaching_activities.course_id', '=', 'all_courses.id')
            ->select('name', 'teaching_activities.id', 'start_time', 'end_time')
            ->orderBy('start_time', 'asc')
            ->get();
            $tableData[$dday] = $toData;
        }

        return view ('dashboard', ['tableData'  =>$tableData]);
    }

    public function showActivityDetail($id)
    {

    $data = DB::table('teaching_activities')
            ->where('teaching_activities.id', $id)
            ->leftJoin('all_courses', 'teaching_activities.course_id', '=', 'all_courses.id')
            ->leftJoin('users', 'teacher', '=', 'users.id')
            ->leftJoin('rooms', 'teaching_place', '=',  'rooms.id')
            ->selectRaw('teaching_activities.*, all_courses.name AS name, users.name AS teacher_name, room_name')
            ->get();

    $userID = Auth::user()->id;
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    $tableData = [];

    foreach ($days as $dday) {
        $toData = DB::table('user_activities_pairings')
        ->where('user_id', $userID)
        ->leftJoin('teaching_activities', 'user_activities_pairings.activity_id', '=', 'teaching_activities.id')
        ->where('teaching_activities.day', $dday)
        ->leftJoin('all_courses', 'teaching_activities.course_id', '=', 'all_courses.id')
        ->select('name', 'teaching_activities.id', 'start_time', 'end_time')
        ->orderBy('start_time', 'asc')
        ->get();
        $tableData[$dday] = $toData;
    }
// dd($data);
    return view('dashboard', ['data' => $data, 'tableData'  =>$tableData]);

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
