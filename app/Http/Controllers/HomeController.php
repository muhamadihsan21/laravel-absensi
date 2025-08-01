<?php

namespace App\Http\Controllers;

use App\Present;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $present = Present::whereUserId(auth()->user()->id)->whereTanggal(date('Y-m-d'))->first();
        $url = 'https://kalenderindonesia.com/api/' . config('absensi.api_key') . '/libur/masehi/' . date('Y/m');
        $response = @file_get_contents($url);
        $kalender = json_decode($response, true);

        if (is_array($kalender) && isset($kalender['data'])) {
            // lanjut logika kamu
        } else {
            // fallback kalau gagal
            $libur = false;
            $holiday = null;
        }

        if ($kalender['data'] != false) {
            if ($kalender['data']['holidays']) {
                foreach ($kalender['data']['holidays'] as $key => $value) {
                    if ($value['masehi'] == date('Y-m-d')) {
                        $holiday = $value['holiday']['name'];
                        $libur = true;
                        break;
                    }
                }
            }
        }
        return view('home', compact('present', 'libur', 'holiday'));
    }
}
