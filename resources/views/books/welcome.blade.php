@extends('layouts.public')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-white text-center">Daftar R. Rapat</h1>
                <a href="#calender" class="btn btn-success">Ke Kalender</a>
            </div>
            <div class="row justify-content-center mb-5">
                @foreach ($rooms as $room)
                    <div class="col-md-2 m-1">
                        <a class="card card-body text-center img-hover-zoom"
                            href="/books/create?room_id={{ $room->id }}">
                            @if ($room->img === null && !file_exists(public_path() . 'storage/img/' . $room->img))
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
                <div class="col-md-12 card shadow mb-4 p-3">
                    <table class="bg-white table text-center">
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
                                    <td>{{ $books->firstItem() + $loop->index }}</td>
                                    <td>{{ $book->date }}</td>
                                    <td>{{ $book->time_start . '-' . $book->time_end }}</td>
                                    <td>{{ $book->topic }}</td>
                                    <td>{{ $book->type_meeting }}</td>
                                    <td>{{ $book->entrant }}</td>
                                    <td>{{ $book->room->name ?? 'Ruangan Terhapus' }}</td>
                                </tr>
                                {{-- @if ($book->date >= date('Y-m-d'))
                        @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                    {!! $books->appends(request()->input())->links() !!}
                </div>
            </div>
            <div id="calender" class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-white mt-3">Kalender Pengajuan R. Rapat {{ $room->name }}</h1>
            </div>
            <div class="card shadow mb-4 p-3">
                <h3 class="text-center my-3">Kalender bulan
                    @switch(date('m'))
                        @case(1)
                            Januari
                        @break
                        @case(2)
                            Februari
                        @break
                        @case(3)
                            Maret
                        @break
                        @case(4)
                            April
                        @break
                        @case(5)
                            Mei
                        @break
                        @case(6)
                            Juni
                        @break
                        @case(7)
                            Juli
                        @break
                        @case(8)
                            Agustus
                        @break
                        @case(9)
                            September
                        @break
                        @case(10)
                            Oktober
                        @break
                        @case(11)
                            November
                        @break
                        @case(12)
                            Desember
                        @break
                        @default
                    @endswitch {{ date('Y') }}
                </h3>
                <div class="row justify-content-center">
                    @for ($i = 1; $i <= 31; $i++)
                        <div class="m-1 col-md-2 card shadow-sm in-card-scroll" data-toggle="modal"
                            data-target="#exampleModal{{ $i }}">
                            <div class="mt-2 text-center">
                                <span
                                    class="@if ($i == date('d')) py-2 badge badge-primary badge-pill @endif ">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</span><br>
                                @php
                                    $date = date('Y') . '-' . date('m') . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);

                                    switch (date('l', strtotime($date))) {
                                        case 'Monday':
                                            $namaHari = 'Senin';
                                            break;
                                        case 'Tuesday':
                                            $namaHari = 'Selasa';
                                            break;
                                        case 'Wednesday':
                                            $namaHari = 'Rabu';
                                            break;
                                        case 'Thursday':
                                            $namaHari = 'Kamis';
                                            break;
                                        case 'Friday':
                                            $namaHari = "Jum'at";
                                            break;
                                        case 'Saturday':
                                            $namaHari = 'Sabtu';
                                            break;
                                        case 'Sunday':
                                            $namaHari = 'Minggu';
                                            break;
                                    }
                                @endphp
                                <span>{{ $namaHari }}</span>
                            </div>
                            <hr>
                            <div class="in-card-scroll pb-1">

                                @foreach ($ListBooks as $book)
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
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
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
                                            @foreach ($ListBooks as $book)
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
    </div>

@endsection
