<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    public function index()
    {
        return Contacts::all();
    }

    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
    ];
}

