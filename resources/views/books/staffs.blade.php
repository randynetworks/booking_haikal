@extends('layouts.public')

@section('content')
    <div class="flex-center">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    @if (Auth::user()->role === 0)

                        <a>Halo, {{ Auth::user()->name }}</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else

                        <a href="{{ url('/dashboard') }}">Ke Admin</a>
                    @endif
                @else
                    <a href="{{ route('login') }}">Login Admin</a>

                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif --}}
                @endauth
            </div>
        @endif
    </div>
    <div class="container mt-5">
        <h3 class="mt-5 text-center">FORM PENGISIAN PENGAJU</h3>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <form class="mt-4 col-md-6" action="/staffs_store" method="POST" enctype="multipart/form-data">
                @csrf
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
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <p class="mt-3">Sudah pernah daftar? atau ingin melihat informasi ruangan? <br><a href="/books">Ke
                        Daftar Pemesanan Ruangan</a></p>
            </form>
        </div>
    </div>
@endsection
