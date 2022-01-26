@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengajuan Ruangan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajuan Ruangan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Topik</th>
                            <th scope="col">Jenis Rapat</th>
                            <th scope="col">Jumlah Peserta</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($books->count() == 0)
                            <tr>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>

                        @else
                            @foreach ($books as $book)

                                <tr class="text-center" data-toggle="popover" data-trigger="hover"
                                    title="Informasi Detail" data-html="true" data-content="Pemesan &#9;: {{ $book->username }}<br/>
                                            NIP &#9;&#9;: {{ $book->staff_nip }}<br/>
                                            Instalasi &#9;: {{ $book->installation }}">
                                    <th scope="row">{{ $books->firstItem() + $loop->index }}</th>
                                    <td>{{ $book->date_start }}</td>
                                    <td>{{ $book->time_start }} - {{ $book->time_finish }}</td>
                                    <td>{{ $book->topic }}</td>
                                    <td>{{ $book->type_meeting }}</td>
                                    <td>{{ $book->entrant }}</td>
                                    <td>{{ $book->room->name ?? 'Ruangan Terhapus' }}</td>
                                    @if ($book->approved == 1)
                                        <td class="align-middle bg-success text-white">Di Setujui</td>
                                    @elseif($book->approved == 2)
                                        <td class="align-middle bg-danger text-white">Di Tolak</td>
                                    @else
                                        <td class="align-middle bg-dark text-white">Pending</td>
                                    @endif
                                    <td>
                                        <button data-toggle="modal" data-target="#basicExampleModal{{ $book->id }}"
                                            class="btn btn-sm btn-primary">Aksi</button>
                                    </td>

                                    {{-- modal --}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="basicExampleModal{{ $book->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="basicExampleModal{{ $book->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Pengesahan Peengajuan
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <form action="/dashboard/books/{{ $book->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name">Disetujui?</label>
                                                            <input type="hidden" class="form-control" id="name" name="id"
                                                                value="{{ $book->id }}">
                                                            <select id="approved" class="form-control" name="approved">
                                                                <option selected>Pilih...</option>
                                                                <option value="1">Di Setujui</option>
                                                                <option value="2">Di Tolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Informasi Penolakan <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="reject_note">
                                                            <small class="text-danger">*) Isi jika ditolak</small>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Edit Data</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {!! $books->appends(request()->input())->links() !!}
            </div>
        </div>
    </div>


@endsection
