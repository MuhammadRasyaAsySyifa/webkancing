@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Promo</h1>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('promo.create') }}" class="btn btn-primary mb-3">Tambah Promo</a>

    <div class="row">
        @foreach ($promos as $promo)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/promos/' . $promo->photo) }}" class="card-img-top" alt="Foto Promo {{ $promo->id }}">
                    <div class="card-body">
                        <h5 class="card-title">Promo {{ $promo->id }}</h5>
                        <a href="{{ route('promo.edit', $promo->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('promo.destroy', $promo->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
