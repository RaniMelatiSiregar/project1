<?php

namespace App\Http\Controllers;
use App\Models\homes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DashboardHomeController extends Controller
{
    public function index()
    {
    $homes = Homes::all();
    return view('curdhome', ['homes'=>$homes]);
    }

    public function show(Homes $home)
    {
        return view('layouts.showhome', ['home' => $home]);
    }

    public function edit(Homes $home)
    {
        return view('layouts.edithome', [
            'home' => $home,
        ]);
    }

    public function update(Request $request, Homes $home)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'about' => 'required',
        'image' => 'image|file|max:1024'
    ]);

    if ($request->file('image')) {
        if ($home->image) {
            Storage::delete($home->image);
        }
        $validatedData['image'] = $request->file('image')->store('assets');
    }

    $home->update($validatedData);

    return redirect('/dashboard/homes')->with('success', 'Home has been updated!');

}
}