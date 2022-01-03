@extends('layouts.public')

@section('content')

    <!-- Page Heading -->
    <div class=" align-items-center justify-content-between mb-4">
        <h2 class="font-weight-light text-center">Daftar R. Rapat</h2>
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

        <h2 class="font-weight-light text-center">Daftar Pengajuan R. Rapat</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="bg-white table">
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
                                <a href="/books/{{ $book->id }}" class="badge badge-primary">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajukan Pengajuan Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="p-3" action="/books" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="from-group">
                        <h3>Pengaju</h3>
                    </div>
                    <div class="form-group">
                        <label for="username">Nama Lengkap</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="staff_nip">Nomor Induk Staff</label>
                        <input type="text" class="form-control" id="staff_nip" name="staff_nip">
                    </div>
                    <div class="form-group">
                        <label for="installation">Instalasi</label>
                        <input type="text" class="form-control" id="installation" name="installation">
                    </div>
                    <div class="from-group mt-3">
                        <h3>Pengajuan Ruangan</h3>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="datepicker">Tanggal</label>
                            <input type="text" class="form-control" id="datepicker" name="date">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="time-awal">Waktu Awal</label>
                            <input type="text" class="form-control timepicker" id="timepicker" name="time_awal">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="time-akhir">Waktu Akhir</label>
                            <input type="text" class="form-control timepicker" id="timepicker" name="time_akhir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="topic">Topik Rapat</label>
                        <input type="text" class="form-control" id="topic" placeholder="Contoh. Kegiatan Meeting Harian"
                            name="topic">
                    </div>
                    <div class="form-group">
                        <label for="entrant">Jumlah Peserta</label>
                        <input type="number" class="form-control" id="entrant" name="entrant">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="type_meeting">Jenis Rapat</label>
                            <select id="type_meeting" class="form-control" name="type_meeting">
                                <option selected>Pilih...</option>
                                <option value="Internal">Internal</option>
                                <option value="Eksternal">Eksternal</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="room_id">Ruangan</label>
                            <select id="room_id" class="form-control" name="room_id">
                                <option selected>Pilih...</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
