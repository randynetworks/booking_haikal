@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pengajuan R. Rapat</h1>
    </div>
    <div class="card shadow mb-4 p-3">
        <form class="p-3" action="/books" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="menu-list" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#data-diri" role="tab" aria-controls="data-diri"
                            aria-selected="true">Data Diri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pengajuan" role="tab" aria-controls="pengajuan"
                            aria-selected="false">Pengajuan</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content mt-3">
                    <div class="tab-pane active" id="data-diri" role="tabpanel">
                        <div class="from-group mt-3">
                            <h3>Data Diri</h3>
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
                    </div>

                    <div class="tab-pane" id="pengajuan" role="tabpanel" aria-labelledby="history-tab">
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
                            <input type="text" class="form-control" id="topic"
                                placeholder="Contoh. Kegiatan Meeting Harian" name="topic">
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
                            <a href="/" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Ajukan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $('#menu-list a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>

@endsection
