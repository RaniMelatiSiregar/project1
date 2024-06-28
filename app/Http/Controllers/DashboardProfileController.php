<?php

namespace App\Http\Controllers;
use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DashboardProfileController extends Controller
{
    public function index()
    {
        $profiles = Profiles::all();
        return view ('curdprofile', ['profiles'=>$profiles]);

    }

    public function create()
    {
        return view('layouts.createprofile');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'biografi' => 'required',
        'image' => 'image|file|max:1024'
    ]);

    if ($request->file('image')) {
        $validatedData['image'] = $request->file('image')->store('profile-images');
    }

    Profiles::create($validatedData);

    return redirect('/dashboard/profiles')->with('success', 'New Portofolio has been added!');
}

    public function show(Profiles $profile)
    {
        return view('layouts.showprofile', ['profiles' => $profile]);
    }

    public function edit(Profiles $profile)
    {
        return view('layouts.editprofile', [
            'profiles' => $profile,
        ]);
    }

    public function update(Request $request, Profiles $profile)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'biografi' => 'required',
        'image' => 'image|file|max:1024'
    ]);

    if ($request->file('image')) {
        if ($profile->image) {
            Storage::delete($profile->image);
        }
        $validatedData['image'] = $request->file('image')->store('profile-images');
    }

    $profile->update($validatedData);

    return redirect('/dashboard/profiles')->with('success', 'Portofolio has been updated!');
}

    public function destroy(Profiles $profile)
{
    $profile->delete();
    return redirect('/dashboard/profiles')->with('success', 'Portofolio has been deleted!');
}

}
