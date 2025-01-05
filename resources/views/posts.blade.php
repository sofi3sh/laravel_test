@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container">
        <h1 class="text-center my-4">{{ __('blog_lang.blog_title') }}</h1>

        <div class="input-group mb-4">
            <input type="text" id="searchInput" class="form-control" name="search" placeholder="{{ __('blog_lang.search') }}">
        </div>

        <!-- Список статей -->
        <div id="articlesList" class="row">
            @include('partials.posts', ['posts' => $posts])
        </div>

        <!-- Пагінація -->
        <div class="d-flex justify-content-center" id="pagination">
            {{ $posts->links() }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var query = $(this).val();

                $.ajax({
                    url: '{{ route('posts.index') }}',
                    method: 'GET',
                    data: { search: query },
                    success: function(response) {
                        if (response.posts.trim() === "") {
                            $('#noResultsMessage').show();
                            $('#articlesList').html('');
                            $('#pagination').html('');
                        } else {
                            // Оновлюємо список статей та пагінацію
                            $('#noResultsMessage').hide();
                            $('#articlesList').html(response.posts);
                            $('#pagination').html(response.pagination);
                        }
                    }
                });
            });
        });
    </script>

@endsection
