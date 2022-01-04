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
            @if ($book->approved == 1)
                <p class="bg-success text-white p-3">Di Setujui</p>
            @elseif ($book->approved == 2)
                <p class="bg-dark text-white p-3">Di Tolak karena: {{ $book->reject_note }}</p>
            @else
                <p class="bg-danger text-white p-3">Belum Di Setujui</p>
            @endif
            <h3>Pengaju</h3>
            <h5>Nama Lengkap : {{ $book->username }}</h5>
            <h5>NIP : {{ $book->staff_nip }}</h5>
            <h5>Installasi : {{ $book->installation }}</h5>

            <h3 class="mt-3">Pengajuan Ruangan</h3>
            <h5>Tanggal Rapat : {{ $book->date }}</h5>
            <h5>Waktu Rapat : {{ $book->time_start . '-' . $book->time_end }}</h5>
            <h5>Topik Rapat : {{ $book->topic }}</h5>
            <h5>Jumlah Peserta : {{ $book->entrant }}</h5>
            <h5>Jenis Rapat : {{ $book->type_meeting }}</h5>
            <h5>Ruangan Rapat : {{ $book->room->name ?? 'Ruangan Terhapus' }}</h5>

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
