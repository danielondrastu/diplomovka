<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AllCourses;
use Livewire\WithPagination;

class CoursesList extends Component
{
    use WithPagination;

    public $search = '';
    public $filterTerm = '';
    public $filterYear = '';

    public function render()
    {
        return view('livewire.courses-list', [
            'courses' => AllCourses::search($this->search)
            ->where('term', 'like', '%'.$this->filterTerm.'%')
            ->where('active_year', 'like', '%'.$this->filterYear.'%')
            ->simplePaginate(10),
        ]);

        // return view('livewire.courses-list', );
    }
}
