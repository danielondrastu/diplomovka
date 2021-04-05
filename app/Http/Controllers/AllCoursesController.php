<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\AllCourses;

class AllCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        // $allCourses = AllCourses::paginate(5);
        $allCourses = AllCourses::all();
        return view('all-courses', compact('allCourses'));

    
    }

    public function getData()
    {
        $allCourses = AllCourses::all();
        return $allCourses;
    
    }

    public function showData($id)
    {
        $data = AllCourses::find($id);
        $rooms = DB::table('rooms')->get();
        return view ('edit-course', ['data'=>$data, 'rooms'=>$rooms]);
    }

    public function editCourse(Request $req)
    {
        $data = AllCourses::find($req->id);
        $data->lecturer=$req->lecturer;
        $data->type=$req->type;
        $data->active_year=$req->active_year;
        $data->guaranting_department=$req->guaranting_department;
        $data->time_allocation_lecture=$req->time_allocation_lecture;
        $data->time_allocation_exercise=$req->time_allocation_exercise;
        $data->max_stud=$req->max_stud;
        $data->not_parallel=$req->notexisting;
        $data->time_from=$req->time_from;
        $data->time_to=$req->time_to;
        $data->special_requirements=$req->special_requirements;
        $data->message_for_students=$req->message_for_students;
        $data->preferred_room=$req->preferred_room;


        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        $start = 7;
        $stop = 20;

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


            $data->$limName = $$limName;

        }

        $data->save();
        return redirect('allCourses');

    }

    public function showList () {

        return view ('list-all-courses');

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
