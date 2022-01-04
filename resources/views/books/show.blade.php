@extends('layouts.public')

@section('content')
    <!-- Page Heading -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4 p-3 text-dark">
                <div class="align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Detail Pengajuan R. Rapat {{ $book->topic }}</h1>
                </div>
                <div class="form-group mt-3">
                    @if ($book->approved == 1)
                        <p class="bg-success text-white p-3">Di Setujui</p>
                    @elseif ($book->approved == 2)
                        <p class="bg-dark text-white p-3">Di Tolak karena: {{ $book->reject_note }}</p>
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
                    <input type="text" class="form-control" id="staff_nip" name="staff_nip" value="{{ $book->staff_nip }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="installation">Instalasi</label>
                    <input type="text" class="form-control" id="installation" name="installation"
                        value="{{ $book->installation }}" disabled>
                </div>
                <div class="from-group mt-3">
                    <h3>Pengajuan Ruangan</h3>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="datepicker">Tanggal</label>
                        <input type="text" class="form-control" id="datepicker" name="date" value="{{ $book->date }}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="time">Waktu</label>
                        <input type="text" class="form-control" id="time" name="time" value="{{ $book->time_start . '-' . $book->time_end }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="topic">Topik Rapat</label>
                    <input type="text" class="form-control" id="topic" placeholder="Contoh. Kegiatan Meeting Harian" name="topic"
                        value="{{ $book->topic }}" disabled>
                </div>
                <div class="form-group">
                    <label for="entrant">Jumlah Peserta</label>
                    <input type="text" class="form-control" id="entrant" name="entrant" value="{{ $book->entrant }}" disabled>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="type_meeting">Jenis Rapat</label>
                        <input type="text" class="form-control" id="type_meeting" name="type_meeting"
                            value="{{ $book->type_meeting }}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="room_id">Ruangan</label>
                        <input type="text" class="form-control" id="room_id" name="room_id" value="{{ $book->room->name ?? 'Ruangan Terhapus' }}"
                            disabled>
                    </div>
                </div>
                </form>
                <a href="/" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>

@endsection
