@extends('layouts.public')

@section('content')

    <!-- Page Heading -->
    <div class=" align-items-center justify-content-between mb-4">
        <h2 class="text-white text-center">Daftar R. Rapat</h2>
    </div>
    <div class="row justify-content-center mb-5">
        @foreach ($rooms as $room)
            <div class="col-md-2 m-1">
                <a class="card card-body text-center img-hover-zoom" href="/books/create?room_id={{ $room->id }}">
                    @if ($room->img === null)
                        <img class="rounded h-100" width="100%" style="object-fit:cover;"
                            src="{{ asset('images/nocontentyet.jpg') }}">
                    @else
                        <img class="rounded h-100" width="100%" style="object-fit:cover;"
                            src="{{ asset('storage/img/' . $room->img) }}" alt="">
                    @endif
                    <div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-12">
                                <h5 class="text-center"><b>Ruangan {{ $room->name }}</b></h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">

        <h2 class="text-white text-center">Daftar Pengajuan R. Rapat</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="bg-white table">
                <thead>
                    <tr class="bg-primary text-white">
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
                        <tr
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
            {!! $books->links() !!}
        </div>
    </div>

@endsection
