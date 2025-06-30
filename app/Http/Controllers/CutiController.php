<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuti;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function create()
    {
        return view('users.form_cuti');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
        ]);

        Cuti::create([
            'user_id' => Auth::id(),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pengajuan cuti berhasil dikirim.');
    }

    public function riwayat()
    {
        $cutis = Cuti::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('users.riwayat_cuti', compact('cutis'));
    }
}
