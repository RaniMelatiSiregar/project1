<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacts;
class ContactsController extends Controller
{
    public function index(){
        $contacts = contacts::all();
        return view('contact', compact('contacts'));
    }
}
