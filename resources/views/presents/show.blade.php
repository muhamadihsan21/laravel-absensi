@extends('layouts.app')

@section('title')
Detail User - {{ config('app.name') }}
@endsection


@section('header')
<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Masuk</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $masuk }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Telat</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $telat }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-yellow text-white rounded-circle shadow">
                            <i class="fas fa-business-time"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Cuti</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $cuti }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                            <i class="fas fa-user-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Alpha</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $alpha }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div class="card shadow h-100">
        <div class="card-header">
            <h5 class="m-0 pt-1 font-weight-bold float-left">Kehadiran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('daftar-hadir.cari') }}" class="mb-3" method="get">
                <div class="form-group row mb-3 ">
                    <label for="bulan" class="col-form-label col-sm-2">Bulan</label>
                    <div class="input-group col-sm-10">
                        <input type="month" class="form-control" name="bulan" id="bulan" value="{{ request('bulan',date('Y-m')) }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Cuti</th>
                            <th>Total Jam</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!$presents->count())
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data yang tersedia</td>
                        </tr>
                        @else
                        @foreach ($presents as $present)
                        <tr>
                            <td>{{ date('d/m/Y', strtotime($present->tanggal)) }}</td>
                            <td>{{ auth()->user()->nrp }}</td>
                            <td>{{ auth()->user()->nama }}</td>
                            <td>{{ auth()->user()->jabatan ?? '-' }}</td>

                            <td>{{ $present->jam_masuk ? date('H:i:s', strtotime($present->jam_masuk)) : '-' }}</td>
                            <td>{{ $present->jam_keluar ? date('H:i:s', strtotime($present->jam_keluar)) : '-' }}</td>

                            <td>{{ $present->keterangan == 'cuti' ? 'Ya' : '-' }}</td>

                            <td>
                                @if ($present->jam_masuk && $present->jam_keluar)
                                @php
                                $masuk = \Carbon\Carbon::parse($present->jam_masuk);
                                $keluar = \Carbon\Carbon::parse($present->jam_keluar);
                                $total = $masuk->diffInMinutes($keluar);
                                $jam = floor($total / 60);
                                $menit = $total % 60;
                                @endphp
                                {{ $jam }} jam {{ $menit }} menit
                                @else
                                -
                                @endif
                            </td>
                        </tr>

                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="float-right">
                    {{ $presents->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection