<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Room;
use App\Models\User;
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
        $data = [
            "title" => "Selamat Datang, " . Auth::user()->name,
            "users" => User::count(),
            "roomsCount" => Room::count(),
            "rooms" => Room::all(),
            "books" => Book::all(),
            "unapproved" => Book::where('approved', 0)->count(),
            "approved" => Book::where('approved', 1)->count(),
        ];
        return view('dashboard.index', $data);
    }
}
