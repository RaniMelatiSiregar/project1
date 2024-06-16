<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homes extends Model
{
    use HasFactory;
    public function index()
    {
        return homes::all();
    }

    protected $fillable = [
        'title',
        'about',
        'image'
    ];
}
