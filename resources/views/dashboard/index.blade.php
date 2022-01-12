@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kalender Ruangan</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @for ($i = 1; $i <= 31; $i++)
                    <div class="m-1 col-md-2 card shadow-sm text-center p-2">
                        <span>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span>
                        <hr>
                        @foreach ($books as $book)
                            @php
                                $date = explode('-', $book->date);
                                $month = $date[1];
                                $day = $date[2];
                            @endphp
                            @if ($month == date('m') && $day == $i && $book->approved == 1)
                                <a href="/books/{{ $book->id }}">{{ $book->topic }} |
                                    {{ $book->time_start }}-{{ $book->time_end }}</a><br>
                            @endif
                        @endforeach
                    </div>
                @endfor
            </div>
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
