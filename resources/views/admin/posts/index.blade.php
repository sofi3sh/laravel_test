@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/other.css') }}">
    <div class="container mt-5">
        <h1 class="text-center text-golden mb-4">{{ __('blog_lang.title') }}</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-golden mb-3">{{ __('blog_lang.create_bt') }}</a>

        @if(session('success'))
            <div class="alert alert-success text-golden">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <thead class="bg-light-gold">
            <tr>
                <th class="text-golden">#</th>
                <th class="text-golden">{{ __('blog_lang.name') }}</th>
                <th class="text-golden">{{ __('blog_lang.category') }}</th>
                <th class="text-golden">{{ __('blog_lang.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td class="text-golden">{{ $post->id }}</td>
                    <td class="text-golden">{{ $post->title }}</td>
                    <td class="text-golden">{{ $post->category->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">{{ __('blog_lang.edit_bt') }}</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-golden" onclick="return confirm('Are you sure?')">{{ __('blog_lang.del_bt') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
@endsection