<?php

namespace App\Http\Controllers;

use Acaronlex\LaravelCalendar\Calendar;
use App\Models\Book;
use App\Models\Room;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $books = Book::where('approved', true)->get();
        $book = [];
        foreach ($books as $row) {
            $book[] = Calendar::event(
                $row->topic,
                false,
                $row->date_start,
                $row->date_finish,
                $row->id,
                ['color' => '#' . $row->color,]
            );
        }

        $calendar = new Calendar();


        $data = [
            "title" => "Selamat Datang, " . Auth::user()->name,
            "users" => User::count(),
            "roomsCount" => Room::count(),
            "rooms" => Room::all(),
            "books" => Book::all(),
            "calendar" => $calendar->addEvents($book)
                ->setOptions([
                    'selectable' => true,
                ]),
            "unapproved" => Book::where('approved', 0)->count(),
            "approved" => Book::where('approved', 1)->count(),
        ];
        return view('dashboard.index', $data);
    }
}
