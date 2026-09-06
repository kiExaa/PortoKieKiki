<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $fillable = [
        'title', 'organization', 'location', 'start_date', 'end_date',
        'description', 'sort_order', 'status',
    ];
}
