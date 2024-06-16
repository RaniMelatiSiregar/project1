<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profiles;
class ProfilesController extends Controller
{
    public function index(){
        $profiles = Profiles::all();
        return view('profile', compact('profiles'));
    }
}
