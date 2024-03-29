<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllCourses extends Model
{
    use HasFactory;

    public $guarded = [];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('lecturer', 'like', '%'.$search.'%');
    }

    public static function filterMe($filterTerm)
    {
        return empty($sefilterTermarch) ? static::query()
            : static::query()->where('term', 'like', '%'.$filterTerm.'%');
    }
}

