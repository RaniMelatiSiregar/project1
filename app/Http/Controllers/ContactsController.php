<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contacts;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function index(){
        $contacts = Contacts::all();
        return view('contact', compact('contacts'));
    }

    public function store(Request $request)
    {
    if (empty($request->nama) || empty($request->email) || empty($request->nomor_hp) || empty($request->pesan_user)) {
        return redirect()->route('contact')->with('error', 'Tidak boleh ada inputan kosong. Semua wajib diisi!');
    }
    
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'nomor_hp' => 'required',
        'pesan_user' => 'required',
    ]);

    try {
        DB::beginTransaction();
        $contacts = new Contacts();
        $contacts->nama = $request->nama;
        $contacts->email = $request->email;
        $contacts->nomor_hp = $request->nomor_hp;
        $contacts->pesan = $request->pesan_user;
        $contacts->save();

        $this->sendEmail($request->all());
        DB::commit();
        return redirect()->route('contact')->with('success', 'Yeeyy! Pesan Anda Telah Terkirim!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('contact')->with('error', 'Oh no! Gagal Mengirim Pesan');
    }
}

private function sendEmail($data)
{
    Mail::send('emails.contact', $data, function($message) use ($data) {
        $message->to($data['email'], $data['nama'])
                ->subject('Email dari Buku Tamu');
    });
}
}

