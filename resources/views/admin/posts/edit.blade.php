@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/other.css') }}">
    <div class="container mt-5">
        <h1 class="text-center text-golden mb-4">Edit Post</h1>

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label text-golden">Title</label>
                <input type="text" name="title" id="title" class="form-control border-gold" value="{{ $post->title }}">
                @error('title')
                <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label text-golden">Content</label>
                <textarea name="content" id="content" class="form-control border-gold">{{ $post->content }}</textarea>
                @error('content')
                <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label text-golden">Category</label>
                <select name="category_id" id="category_id" class="form-control border-gold">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn btn-golden">Update</button>
        </form>
    </div>
@endsection