@extends('layouts.public')

@section('content')
    <div class="container my-5">
        <h3 class="mt-5 text-center">Detail Pengajuan Kegiatan {{ Str::ucfirst($book->topic) }}</h3>

        <form class="mt-4">
            <div class="form-group mt-3">
                @if ($book->approved)
                    <p class="bg-success text-white p-3">Di Setujui</p>
                @else
                    <p class="bg-danger text-white p-3">Belum Di Setujui</p>
                @endif
            </div>
            <div class="from-group">
                <h3>Pengaju</h3>
            </div>
            <div class="form-group">
                <label for="username">Nama Lengkap</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $book->username }}" disabled>
            </div>
            <div class="form-group">
                <label for="staff_nip">Nomor Induk Staff</label>
                <input type="text" class="form-control" id="staff_nip" name="staff_nip" value="{{ $book->staff_nip }}" disabled>
            </div>
            <div class="form-group">
                <label for="installation">Instalasi</label>
                <input type="text" class="form-control" id="installation" name="installation" value="{{ $book->installation }}" disabled>
            </div>
            <div class="from-group mt-3">
                <h3>Pengajuan Ruangan</h3>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="datepicker">Tanggal</label>
                    <input type="text" class="form-control" id="datepicker" name="date" value="{{ $book->date }}"
                        disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="time">Waktu</label>
                    <input type="text" class="form-control" id="time" name="time" value="{{ $book->time }}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="topic">Topik Rapat</label>
                <input type="text" class="form-control" id="topic" placeholder="Contoh. Kegiatan Meeting Harian"
                    name="topic" value="{{ $book->topic }}" disabled>
            </div>
            <div class="form-group">
                <label for="entrant">Jumlah Peserta</label>
                <input type="text" class="form-control" id="entrant" name="entrant" value="{{ $book->entrant }}"
                    disabled>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="type_meeting">Jenis Rapat</label>
                    <input type="text" class="form-control" id="type_meeting" name="type_meeting"
                        value="{{ $book->type_meeting }}" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="room_id">Ruangan</label>
                    <input type="text" class="form-control" id="room_id" name="room_id" value="{{ $book->room->name }}"
                        disabled>
                </div>
            </div>



            <a href="/" class="btn btn-success">Kembali</a>
        </form>
    </div>

@endsection
