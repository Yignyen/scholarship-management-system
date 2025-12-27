<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//scholarship models
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Scholarship extends Model
{   
    use HasFactory;
    //
    // Fields that can be mass assigned
    protected $fillable = [
        'name',
        'eligibility',
        'amount',
        'deadline',
        'funded_by',
    ];
}
