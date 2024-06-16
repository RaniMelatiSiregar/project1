<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\homes;
class HomesController extends Controller
{
    public function index(){
        $homes = Homes::all();
        return view('home', compact('homes'));
    }
}
