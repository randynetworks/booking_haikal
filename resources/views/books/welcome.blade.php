@extends('layouts.public')

@section('content')

    <!-- Page Heading -->
    <div class=" align-items-center justify-content-between mb-4">
        <h2 class="text-white text-center">Daftar R. Rapat</h2>
    </div>
    <div class="row justify-content-center mb-5">
        @foreach ($rooms as $room)
            <div class="col-md-2">
                <div class="card card-body text-center">
                    @if ($room->img === null)
                        <img class="card-img-top rounded" src="{{ asset('images/nocontentyet.jpg') }}">
                    @else
                        <img class="card-img-top rounded" src="{{ asset('storage/img/' . $room->img) }}" alt="">
                    @endif
                    <h5 class="text-dark mt-2">{{ $room->name }}</h5>
                    <a class="btn btn-success" href="/books/create?room_id={{ $room->id }}">Ajukan Ruangan di
                        <br>{{ $room->name }}</a>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">

        <h2 class="text-white text-center">Daftar Pengajuan R. Rapat</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="bg-white table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Topik</th>
                        <th scope="col">Jenis Rapat</th>
                        <th scope="col">Jumlah Peserta</th>
                        <th scope="col">Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr data-toggle="modal" data-target="#exampleModal{{ $book->id }}"
                            title="Pemesan &#9;: {{ $book->username }} &#13;NIP &#9;&#9;: {{ $book->staff_nip }}&#13;Instalasi &#9;: {{ $book->installation }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->date }}</td>
                            <td>{{ $book->time_start . '-' . $book->time_end }}</td>
                            <td>{{ $book->topic }}</td>
                            <td>{{ $book->type_meeting }}</td>
                            <td>{{ $book->entrant }}</td>
                            <td>{{ $book->room->name ?? 'Ruangan Terhapus' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
