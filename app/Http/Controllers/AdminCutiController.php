<?php

namespace App\Http\Controllers;

use App\Cuti;
use Illuminate\Http\Request;

class AdminCutiController extends Controller
{
    public function index()
    {
        $cutis = Cuti::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.cuti_index', compact('cutis'));
    }

    public function approve($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->status = 'disetujui';
        $cuti->save();

        return back()->with('success', 'Pengajuan cuti disetujui.');
    }

    public function reject($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->status = 'ditolak';
        $cuti->save();

        return back()->with('success', 'Pengajuan cuti ditolak.');
    }
}
