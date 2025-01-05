@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/other.css') }}">
    <div class="container mt-5">
        <h1 class="text-center text-golden mb-4">Додати категорію</h1>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="text-golden">Назва категорії</label>
                <input type="text" name="name" id="name" class="form-control bg-light-gold border-gold" required>
            </div>
            <button type="submit" class="btn btn-golden mt-3">Зберегти</button>
        </form>
    </div>
@endsection
