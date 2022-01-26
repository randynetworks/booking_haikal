<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        .table {
            text-align: center;
            border
        }

        h3 {
            text-align: center;
        }

    </style>
</head>

<body>
    <div>
        @if ($label == 'pdf')
            <img src="https://64.media.tumblr.com/37d8aee3aadc7f494dc56a55c455fd75/25da4cb2e4a0b9c5-6b/s400x600/a8ef909f8270b894ee14a3416ad286b08f145f89.jpg"
                alt="" srcset="" width="100%">
            <hr>
        @endif
        <h3>Rekap Daftar Pengajuan Ruangan</h3>
        <table>
            <tr>
                <td colspan="2">Dibuat Oleh</td>
                <td>: {{ Auth::user()->name }} </td>
            </tr>
            <tr>
                <td colspan="2">Waktu Cetak</td>
                <td>: {{ date('F j, Y h:i a') }}</td>
            </tr>
            @if ($firstDate !== null)
                <tr>
                    <td colspan="2">Tanggal Awal</td>
                    <td>: {{ $firstDate }}</td>
                </tr>
            @endif
            @if ($lastDate !== null)
                <tr>
                    <td colspan="2">Tanggal Akhir</td>
                    <td>: {{ $lastDate }}</td>
                </tr>
            @endif
        </table>
    </div>
    <table class="table data-incomingGoods" id="dataTable" width="100%" cellspacing="0" border="1">
        <thead class="thead-light text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pemesan</th>
                <th scope="col">NIP</th>
                <th scope="col">Installasi</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Topik</th>
                <th scope="col">Jenis Rapat</th>
                <th scope="col">Jumlah Peserta</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Status</th>
                <th scope="col">Ketarangan Penolakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)

                <tr class="text-center" data-toggle="popover" data-trigger="hover" title="Informasi Detail"
                    data-html="true" data-content="Pemesan &#9;: {{ $book->username }}<br/>
                                                            NIP &#9;&#9;: {{ $book->staff_nip }}<br/>
                                                            Instalasi &#9;: {{ $book->installation }}<br/>
                                                                               @if ($book->approved == 2 && $book->reject_note !== null)
                    Info Ditolak : {{ $book->reject_note }}
            @endif
            ">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $book->username }}</td>
            <td>{{ $book->staff_nip }}</td>
            <td>{{ $book->installation }}</td>
            <td>{{ $book->date_start }}</td>
            <td>{{ $book->time_start }} - {{ $book->time_finish }}</td>
            <td>{{ $book->topic }}</td>
            <td>{{ $book->type_meeting }}</td>
            <td>{{ $book->entrant }}</td>
            <td>{{ $book->room->name ?? 'Ruangan Terhapus' }}</td>
            @if ($book->approved == 1)
                <td class="align-middle bg-success text-white">Di Setujui</td>
                <td class="align-middle bg-success text-white">-</td>
            @elseif($book->approved == 2)
                <td class="align-middle bg-danger text-white">Di Tolak</td>
                <td class="align-middle bg-danger text-white">{{ $book->reject_note }}</td>
            @else
                <td class="align-middle bg-dark text-white">Pending</td>
                <td class="align-middle bg-success text-white">-</td>
            @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
