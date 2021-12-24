@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Ruangan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Ruangan</h6>
        </div>
        <div class="card-body">
            <form action="/dashboard/rooms/{{ $room->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Lengkap Ruangan</label>
                    <input type="hidden" class="form-control" id="name" name="id" value="{{ $room->id }}">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
                <a href="/dashboard/rooms/{{ $room->id }}" class="btn btn-success">Kembali</a>
            </form>
        </div>
    </div>
@endsection
