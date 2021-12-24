@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Pengajuan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pengajuan</h6>
        </div>
        <div class="card-body">
            <h5>Tanggal Rapat : {{ $book->date }}</h5>
            <h5>Waktu Rapat : {{ $book->time }}</h5>
            <h5>Topik Rapat : {{ $book->topic }}</h5>
            <h5>Jumlah Peserta : {{ $book->entrant }}</h5>
            <h5>Jenis Rapat : {{ $book->type_meeting }}</h5>
            <h5>Ruangan Rapat : {{ $book->room->name }}</h5>
            <h5>Yang mengajukan Rapat : {{ $book->user->name }}</h5>
            <h5>File : <a href="{{ asset('storage/files') . '/' . $book->file }}" target="_blank">{{ $book->file }}</a></h5>
            @if ($book->approved)
                <p class="bg-success text-white p-3">Di Setujui</p>
            @else
                <p class="bg-danger text-white p-3">Belum Di Setujui</p>
            @endif
            <form action="" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Hapus</button>
                <a href="/dashboard/books/{{ $book->id }}/edit" class="btn btn-primary">Pengesahan Rapat</a>
                <a href="/dashboard/books" class="btn btn-success">Kembali</a>
            </form>
        </div>
    </div>
@endsection
