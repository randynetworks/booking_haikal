<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'rooms' => Room::all(),
            'books' => Book::orderBy('id', 'DESC')->paginate(5)
        ];

        return view('dashboard.books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $room_id = $request->get('room_id');

        if ($room_id != null) {
            # code...
            $data = [
                'room' => Room::find($room_id),
                'books' => Book::where('room_id', $room_id)->where('date_start', '>=', date("Y-m-d"))->paginate(5)
            ];
            return view('books.create', $data);
        }
        return redirect('/')->with('status', 'Ruangan Tidak Di pilih, Silahkan pilih ruangan terlebih dahulu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'staff_nip' => 'required',
            'installation' => 'required',
            'date_start' => 'required',
            'date_finish' => 'required',
            'time_start' => 'required',
            'time_finish' => 'required',
            'topic' => 'required',
            'entrant' => 'required',
            'type_meeting' => 'required',
            'room_id' => 'required',
            'color' => 'required',
        ]);
        $bookExist = Book::where('room_id', $request->room_id)
            ->whereBetween('date_start', [$request->date_start, $request->date_finish])
            ->whereBetween('time_start', [$request->time_start, date('h:i', strtotime("-1 minutes", strtotime($request->time_finish)))])
            ->exists();

        if ($bookExist) {
            return redirect('/books/create?room_id=' . $request->room_id)->with('status-error', 'Pengajuan Gagal diajukan, Jadwal bentrok!!');
        } else {

            $book = new Book;
            $book->username = $request->username;
            $book->staff_nip = $request->staff_nip;
            $book->installation = $request->installation;
            $book->date_start = $request->date_start;
            $book->date_finish = $request->date_finish;
            $book->time_start = $request->time_start;
            $book->time_finish = $request->time_finish;
            $book->topic = $request->topic;
            $book->entrant = $request->entrant;
            $book->type_meeting = $request->type_meeting;
            $book->room_id = $request->room_id;
            $book->approved = false;
            $book->color = $request->color;
            $book->save();

            return redirect('/books/create?room_id=' . $request->room_id)->with('status', 'Pengajuan Di ajukan!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('dashboard.books.show', compact('book'));
    }

    public function show_visitor(Book $book)
    {

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'approved' => 'required',
        ]);

        $book = Book::find($request->id);

        if ($request->reject_note !== null) {
            $book->reject_note = $request->reject_note;
        }
        $book->approved = $request->approved;
        $book->save();

        return redirect('/dashboard/books')->with('status', 'Data Pengajuan Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);
        return redirect('/dashboard/books')->with('status', 'Data Pengajuan Dihapus!!');
    }
}
