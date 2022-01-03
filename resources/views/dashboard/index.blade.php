@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Ruangan Yang Digunakan</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-wrapper-scroll-y my-custom-scrollbar">
                <thead class="thead-light">
                    @foreach ($rooms as $room)
                        <th>{{ $room->name }}</th>
                    @endforeach
                </thead>
                <tbody>
                    <tr>
                        @foreach ($rooms as $room)
                            <td>
                                @foreach ($books as $book)
                                    @if ($book->approved == 1 && $book->room_id == $room->id)
                                        <a href="/books/{{ $book->id }}">{{ $book->topic }} | {{ $book->date }}
                                            {{ $book->time }}</a><br>
                                    @else
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="row mx-0">
        <div class="col-md-3 card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Daftar Pengajuan</h5>
                <p class="card-text">Di Setujui : <u>{{ $approved }} </u><br>Belum disetujui :
                    <u>{{ $unapproved }}</u>
                </p>
                <a href="/dashboard/books" class="btn btn-warning">Ke Pengajuan</a>
            </div>
        </div>

        <div class="col-md-3 card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Daftar Ruangan</h5>
                <p class="card-text">Total Ruangan terdata: <u>{{ $roomsCount }}</u>.</p>
                <a href="/dashboard/rooms" class="btn btn-danger">Ke Daftar Ruangan</a>
            </div>
        </div>
    </div>
@endsection
