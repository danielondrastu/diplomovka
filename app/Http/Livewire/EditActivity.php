<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditActivity extends Component
{

    public $data;
    public $course;
    public $teacherSelect = '';

    public function render()
    {

        $teachers = DB::table('users')
                        ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                        ->where('role_id', 2)
                        ->orWhere('role_id', 4)
                        ->orWhere('role_id', 1)
                        ->get(); 
        $limits = DB::table('user_limitations')
                        ->where('user_id', $this->teacherSelect)
                        ->first();         
        $rooms = DB::table('rooms')->get();

        $students = DB::table('users')
        ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
        ->where('role_id', 3)
        ->get(); 

        $studList = DB::table('user_activities_pairings')
        ->where('activity_id', $this->data->id)
        ->where('activity_role', 2)
        ->leftJoin('users', 'user_activities_pairings.user_id', '=', 'users.id')
        ->select('user_activities_pairings.*', 'name', 'email')
        ->get();

        return view('livewire.edit-activity', ['teachers'=>$teachers, 'limits'=>$limits, 'rooms'=>$rooms, 'students'=>$students, 'studList'=>$studList]);
    }
}
