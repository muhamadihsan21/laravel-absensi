@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Daftar Pengajuan Cuti</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>User</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Alasan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cutis as $cuti)
            <tr>
                <td>{{ $cuti->user->nama ?? '-' }}</td>
                <td>{{ $cuti->tanggal_mulai }}</td>
                <td>{{ $cuti->tanggal_selesai }}</td>
                <td>{{ $cuti->alasan }}</td>
                <td>
                    @if($cuti->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($cuti->status == 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
                <td>
                    @if($cuti->status == 'pending')
                        <form action="{{ route('admin.cuti.approve', $cuti->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-sm btn-success">Setujui</button>
                        </form>
                        <form action="{{ route('admin.cuti.reject', $cuti->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-sm btn-danger">Tolak</button>
                        </form>
                    @else
                        <em>-</em>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
