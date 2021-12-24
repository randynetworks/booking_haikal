@extends('layouts.public')

@section('content')
    <div class="container mt-5">
        <h3 class="mt-5 text-center">DETAIL PENGAJUAN {{ Str::ucfirst($book->topic) }}</h3>

        <form class="mt-4">
            <div class="form-group mt-3">
                @if ($book->approved)
                    <p class="bg-success text-white p-3">Di Setujui</p>
                @else
                    <p class="bg-danger text-white p-3">Belum Di Setujui</p>
                @endif
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
            <div class="form-group">
                <label for="staff_id">Yang Mengajukan</label>
                <input type="text" class="form-control" id="staff_id" name="staff_id" value="{{ $book->staff->username }}"
                    disabled>
            </div>



            <a href="/books" class="btn btn-success">Kembali</a>
        </form>
    </div>

@endsection
