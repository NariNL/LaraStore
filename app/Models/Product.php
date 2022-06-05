<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'maker', 'description', 'color',
                            'size', 'image', 'price'];

    public function register()
    {
        return $this->hasmany(Order::class);
    }

}
