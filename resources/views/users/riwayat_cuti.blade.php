@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Riwayat Pengajuan Cuti</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Alasan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cutis as $cuti)
                <tr>
                    <td>{{ $cuti->tanggal_mulai }}</td>
                    <td>{{ $cuti->tanggal_selesai }}</td>
                    <td>{{ $cuti->alasan }}</td>
                    <td>
                        @if($cuti->status === 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($cuti->status === 'disetujui')
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada pengajuan cuti</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
