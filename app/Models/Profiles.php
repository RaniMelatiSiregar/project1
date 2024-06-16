<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
    public function index()
    {
        return profiles::all();
    }

    protected $fillable = [
        'title',
        'biografi',
        'image'
    ];
}
