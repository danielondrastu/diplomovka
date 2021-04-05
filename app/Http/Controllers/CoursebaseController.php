<?php

namespace App\Http\Controllers;

use App\Models\coursebase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AllCourses;

class CoursebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseList = coursebase::all();
        return view ('new-term', ['courseList'=>$courseList]);

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
        $term = $request->term;
        $active_year = $request->active_year;
        $selection = $request->course_selection;
        foreach ($selection as $sel) {
            $course = DB::table('coursebases')
                        ->where('id', $sel)
                        ->select('ais_id', 'name', 'def_guarantor')
                        ->get();
            $name = $course[0]->name;
            $ais_id = $course[0]->ais_id;
            $lecturer = $course[0]->def_guarantor;

            $data = [
                'name' => $name,
                'lecturer' => $lecturer,
                'ais_id' => $ais_id,
                'active_year' => $active_year,
                'term' => $term,
                'type' => 'P',
                'active' => 'No',
                'limit_monday' => 0,
                'limit_tuesday' => 0,
                'limit_wednesday' => 0,
                'limit_thursday' => 0,
                'limit_friday' => 0
            ];

            AllCourses::create($data);
        }
        
        return redirect('allCourses');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coursebase  $coursebase
     * @return \Illuminate\Http\Response
     */
    public function show(coursebase $coursebase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coursebase  $coursebase
     * @return \Illuminate\Http\Response
     */
    public function edit(coursebase $coursebase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coursebase  $coursebase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coursebase $coursebase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coursebase  $coursebase
     * @return \Illuminate\Http\Response
     */
    public function destroy(coursebase $coursebase)
    {
        //
    }
}
