<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use Illuminate\Http\Request;

class DashboardContactController extends Controller
{
    public function index()
    {
        $contacts = Contacts::all();
        return view('curdcontact', ['contacts'=>$contacts]);
        }

        public function show(Contacts $contact)
        {
            return view('layouts.showcontact', ['contact' => $contact]);
        }
    
        public function edit(Contacts $contact)
        {
            return view('layouts.editcontact', ['contact' => $contact]);
        }
    
        public function update(Request $request, Contacts $contact)
        {
            $validatedData = $request->validate([
                'nama' => 'required|max:255',
                'email' => 'required|email',
                'nomor_hp' => 'required'
            ]);
    
            $contact->update($validatedData);
    
            return redirect('/dashboard/contacts')->with('success', 'Contact has been updated!');
        }
}