<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;
    
    public $userSearch = '';

    public function render()
    {
        return view('livewire.users-list',  [
            'users' =>User::all()
            
            // 'users' => User::search($this->userSearch)->toArray()

          
            ]);

        
    }
}
