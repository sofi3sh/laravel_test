@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/other.css') }}">
    <div class="container mt-5">
        <h1 class="text-center text-golden mb-4">{{ __('cat_lang.title') }}</h1>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-golden mb-4">{{ __('cat_lang.add_cat') }}</a>

        @if(session('success'))
            <div class="alert alert-success text-golden">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <thead class="bg-light-gold">
            <tr>
                <th class="text-golden">{{ __('cat_lang.name') }}</th>
                <th class="text-golden">{{ __('cat_lang.action') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="text-golden">{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-golden">{{ __('cat_lang.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
