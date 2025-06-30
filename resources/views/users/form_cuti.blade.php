@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Form Pengajuan Cuti</h3>

    @if (session('success'))
    <div style="color: green">{{ session('success') }}</div>
    @endif

    @extends('layouts.app')

    @section('content')
    <div class="container mt-5 pt-5"> {{-- ← ini kuncinya --}}
        <h3>Form Pengajuan Cuti</h3>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('cuti.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="form-group mb-3">
                <label for="tanggal_mulai">Tanggal Mulai:</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control form-control-sm w-50" required>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_selesai">Tanggal Selesai:</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control form-control-sm w-50" required>
            </div>

            <div class="form-group mb-4">
                <label for="alasan">Alasan:</label>
                <textarea name="alasan" id="alasan" class="form-control w-75" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Ajukan Cuti</button>
        </form>
    </div>
    @endsection

</div>
@endsection