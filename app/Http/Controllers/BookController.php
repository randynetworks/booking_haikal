<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'date' => 'required',
            'time_awal' => 'required',
            'time_akhir' => 'required',
            'topic' => 'required',
            'entrant' => 'required',
            'type_meeting' => 'required',
            'room_id' => 'required',
        ]);

        $book = new Book;
        $book->username = $request->username;
        $book->staff_nip = $request->staff_nip;
        $book->installation = $request->installation;
        $book->date = $request->date;
        $book->time = $request->time_awal . '-' .$request->time_akhir  ;
        $book->topic = $request->topic;
        $book->entrant = $request->entrant;
        $book->type_meeting = $request->type_meeting;
        $book->room_id = $request->room_id;
        $book->approved = false;
        $book->save();

        return redirect('/')->with('status', 'Pengajuan Di ajukan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
