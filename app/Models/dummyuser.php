<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dummyuser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
}
