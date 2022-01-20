@extends('layouts.public')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-white">Form Pengajuan R. Rapat {{ $room->name }}</h1>
            </div>
            <div class="card shadow mb-2 p-3">
                <div class="row">
                    <div class="col-md-3 p-3">
                        <h4 class="text-center">Gambar Ruangan</h4>
                        @if ($room->img === null && !file_exists(public_path() . 'storage/img/' . $room->img))
                            <img data-toggle="modal" data-target="#exampleModal" class="rounded" width="100%"
                                src="{{ asset('images/nocontentyet.jpg') }}">
                        @else
                            <div class="row">
                                <div class="col-md-12 p-1">
                                    <img data-toggle="modal" data-target="#exampleModal" class="rounded" width="100%"
                                        src="{{ asset('storage/img/' . $room->img) }}" alt="">
                                </div>
                            </div>
                            <div class="row">
                                @if ($room->img2 !== null && file_exists(public_path() . 'storage/img/' . $room->img))
                                    <div class="col-md-6 p-1">
                                        <img data-toggle="modal" data-target="#exampleModal" class="rounded"
                                            width="100%" src="{{ asset('storage/img/' . $room->img2) }}" alt="">
                                    </div>
                                @endif
                                @if ($room->img3 !== null && file_exists(public_path() . 'storage/img/' . $room->img))
                                    <div class="col-md-6 p-1">
                                        <img data-toggle="modal" data-target="#exampleModal" class="rounded"
                                            width="100%" src="{{ asset('storage/img/' . $room->img3) }}" alt="">
                                    </div>
                                @endif
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                        class="active"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset('storage/img/' . $room->img) }}"
                                                            class="rounded d-block w-100" alt="...">
                                                    </div>
                                                    @if ($room->img2 !== null)
                                                        <div class="carousel-item">
                                                            <img src="{{ asset('storage/img/' . $room->img2) }}"
                                                                class="rounded d-block w-100" alt="...">
                                                        </div>
                                                    @endif

                                                    @if ($room->img3 !== null)
                                                        <div class="carousel-item">
                                                            <img src="{{ asset('storage/img/' . $room->img3) }}"
                                                                class="rounded d-block w-100" alt="...">
                                                        </div>
                                                    @endif
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-9 p-3">
                        <form action="/books" method="POST" enctype="multipart/form-data">
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
                                            <input value="{{ old('username') }}" type="text"
                                                class="@error('username') is-invalid
                                    @enderror form-control"
                                                id="username" name="username">
                                            @error('username')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="staff_nip">Nomor Induk Staff</label>
                                            <input value="{{ old('staff_nip') }}" type="text"
                                                class="@error('staff_nip') is-invalid
                                    @enderror form-control"
                                                id="staff_nip" name="staff_nip">
                                            @error('staff_nip')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="installation">Instalasi</label>
                                            <input value="{{ old('installation') }}" type="text"
                                                class="@error('installation') is-invalid
                                    @enderror form-control"
                                                id="installation" name="installation">
                                            @error('installation')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="pengajuan" role="tabpanel"
                                        aria-labelledby="history-tab">
                                        <div class="from-group mt-3">
                                            <h3>Pengajuan Ruangan</h3>
                                        </div>
                                        <div class="form-row ">
                                            <div class="form-group col-md-6">
                                                <label for="datetimepicker">Mulai Pada Tanggal</label>
                                                <input value="{{ old('date_start') }}" type="text"
                                                    class="@error('date_start') is-invalid
                                        @enderror form-control datetimepicker"
                                                    name="date_start">
                                                @error('date_start')
                                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="date_finish">Selesai Pada Tanggal</label>
                                                <input value="{{ old('date_finish') }}" type="text"
                                                    class="@error('date_finish') is-invalid
                                        @enderror form-control datetimepicker"
                                                    name="date_finish">
                                                @error('date_finish')
                                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="topic">Topik Rapat</label>
                                            <input value="{{ old('topic') }}" type="text"
                                                class="@error('topic') is-invalid
                                    @enderror form-control"
                                                id="topic" placeholder="Contoh. Kegiatan Meeting Harian" name="topic">
                                            @error('topic')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="entrant">Jumlah Peserta</label>
                                                <input value="{{ old('entrant') }}" type="number"
                                                    class="@error('entrant') is-invalid
                                    @enderror form-control"
                                                    id="entrant" name="entrant">
                                                @error('entrant')
                                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="type_meeting">Jenis Rapat</label>
                                                <select id="type_meeting"
                                                    class="@error('type_meeting') is-invalid
                                        @enderror form-control"
                                                    name="type_meeting">
                                                    <option selected>Pilih...</option>
                                                    <option value="Internal">Internal</option>
                                                    <option value="Eksternal">Eksternal</option>
                                                </select>
                                                @error('type_meeting')
                                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="room_id">Ruangan</label>
                                                <input value="{{ $room->name }}" type="text" class="form-control"
                                                    id="room_id" name="room_id" disabled>
                                                <input value="{{ $room->id }}" type="hidden" class="form-control"
                                                    id="room_id" name="room_id">
                                                @error('room_id')
                                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="color">Warna</label>
                                            <input value="{{ old('color') }}" type="text"
                                                class="@error('color') is-invalid
                                    @enderror form-control"
                                                id="colorpicker" name="color">
                                            @error('color')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <a href="/" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Ajukan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-white mt-3">Daftar Pengajuan R. Rapat {{ $room->name }}</h1>
            </div>
            <div class="card shadow mb-4 p-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th class="align-middle" scope="col">#</th>
                            <th class="align-middle" scope="col">Tanggal</th>
                            <th class="align-middle" scope="col">Waktu</th>
                            <th class="align-middle" scope="col">Topik</th>
                            <th class="align-middle" scope="col">Jenis Rapat</th>
                            <th class="align-middle" scope="col">Jumlah Peserta</th>
                            <th class="align-middle" scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr class="text-center" title="Pemesan &#9;: {{ $book->username }} &#13;NIP &#9;&#9;: {{ $book->staff_nip }}&#13;Instalasi &#9;: {{ $book->installation }}@if ($book->approved == 2)&#13;Ditolak karena {{ $book->reject_note }}">@else">@endif
                                                                                <td class="            align-middle"
                                scope=" row">
                                {{ $books->firstItem() + $loop->index }}
                                </td>
                                <td class="align-middle">{{ $book->date }}</td>
                                <td class="align-middle">{{ $book->time_start . '-' . $book->time_end }}</td>
                                <td class="text-left align-middle">{{ $book->topic }}</td>
                                <td class="align-middle">{{ $book->type_meeting }}</td>
                                <td class="align-middle">{{ $book->entrant }}</td>
                                @if ($book->approved == 1)
                                    <td class="align-middle bg-success text-white">Di Setujui</td>
                                @elseif($book->approved == 2)
                                    <td class="align-middle bg-danger text-white">Di Tolak</td>
                                @else
                                    <td class="align-middle bg-dark text-white">Pending</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $books->appends(request()->input())->links() !!}
            </div>
        </div>
    </div>

    <script>
        $('#menu-list a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script>

@endsection
