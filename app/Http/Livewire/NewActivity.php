<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use stdClass;

class NewActivity extends Component
{
    public $course;
    public $teacherSelect;

    public function render()
    {

        $teachers = DB::table('users')
            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_id', 2)
            ->get();
        $limits = DB::table('user_limitations')
            ->where('user_id', $this->teacherSelect)
            ->first();
        $rooms = DB::table('rooms')->get();

        if($limits == null) {

            $lim = array (
                'limit_monday' => '0000000000000',
                'limit_tuesday' => '0000000000000',
                'limit_wednesday' => '0000000000000',
                'limit_thursday' => '0000000000000',
                'limit_friday' => '0000000000000',
            );

            $limits = json_decode(json_encode($lim));

        }
        

        return view('livewire.new-activity', ['teachers'=>$teachers, 'limits'=>$limits, 'rooms'=>$rooms]);
    }
}
