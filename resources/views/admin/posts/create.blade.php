@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/other.css') }}">
    <div class="container mt-5">
        <h1 class="text-center text-golden mb-4">{{ __('blog_lang.title_create') }}</h1>

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label text-golden">{{ __('blog_lang.name') }}</label>
                <input type="text" name="title" id="title" class="form-control border-gold" value="{{ old('title') }}">
                @error('title')
                <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label text-golden">{{ __('blog_lang.desc_create') }}</label>
                <textarea name="content" id="content" class="form-control border-gold">{{ old('content') }}</textarea>
                @error('content')
                <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label text-golden">{{ __('blog_lang.category') }}</label>
                <select name="category_id" id="category_id" class="form-control border-gold">
                    <option value="">{{ __('blog_lang.category_p') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn btn-golden">{{ __('blog_lang.title_create') }}</button>
        </form>
    </div>
@endsection