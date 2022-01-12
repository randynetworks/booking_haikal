@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <p class="h3 mb-0 text-gray-800">Hari ini tanggal: {{ date('d-M-Y') }}</p>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kalender Ruangan</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @for ($i = 1; $i <= 31; $i++)
                    <div class="m-1 col-md-2 card shadow-sm in-card-scroll" data-toggle="modal"
                        data-target="#exampleModal{{ $i }}">
                        <div class="mt-2 text-center">
                            <span class="@if ($i == date('d')) py-2 badge badge-primary badge-pill @endif ">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <hr>
                        <div class="in-card-scroll pb-1">

                            @foreach ($books as $book)
                                @php
                                    $date = explode('-', $book->date);
                                    $month = $date[1];
                                    $day = $date[2];
                                @endphp
                                @if ($month == date('m') && $day == $i && $book->approved == 1)
                                    <a class="badge btn-block badge-success" href="/books/{{ $book->id }}">R.
                                        {{ $book->room->name }}<br>
                                        @if (strlen($book->topic) > 15)
                                            {{ substr($book->topic, 0, 15) . '...' }}
                                        @else
                                            {{ $book->topic }}
                                        @endif |
                                        {{ $book->time_start }}-{{ $book->time_end }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1"
                        aria-labelledby="exampleModal{{ $i }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <span
                                            class="py-2 badge badge-primary badge-pill">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                    @foreach ($rooms as $room)
                                        <span>R. {{ $room->name }}</span><br>
                                        @foreach ($books as $book)
                                            @php
                                                $date = explode('-', $book->date);
                                                $month = $date[1];
                                                $day = $date[2];
                                            @endphp
                                            @if ($month == date('m') && $day == $i && $book->approved == 1 && $book->room_id == $room->id)
                                                <div class="mb-1"><a class="btn btn-success btn-sm btn-block"
                                                        href="/books/{{ $book->id }}">{{ $book->topic }} |
                                                        {{ $book->time_start }}-{{ $book->time_end }}</a></div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
