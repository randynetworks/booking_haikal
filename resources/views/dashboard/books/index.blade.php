@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengajuan Ruangan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajuan Ruangan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Topik</th>
                            <th scope="col">Jumlah Peserta</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Yang Mengajukan</th>
                            <th scope="col">Status Penyetujuan</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $book->date }}</td>
                                <td>{{ $book->time }}</td>
                                <td>{{ $book->topic }}</td>
                                <td>{{ $book->entrant }}</td>
                                <td>{{ $book->room->name }}</td>
                                <td>{{ $book->username }}</td>
                                @if ($book->approved)
                                    <td class="bg-success text-white">Di Setujui</td>
                                @else
                                    <td class="bg-danger text-white">Belum Di Setujui</td>
                                @endif
                                <td>
                                    <a href="/dashboard/books/{{ $book->id }}" class="badge badge-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
