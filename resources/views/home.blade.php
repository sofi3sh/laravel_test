@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ __('home_lang.welcome') }}</h1>
                <h4>
                    {{ __('home_lang.welcome_title') }}
                    <span style="font-size: 22px;">🔥</span>
                </h4>
                <div class="card">
                    <div class="card-header">{{ __('home_lang.menu') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mt-4">
                            <a href="{{ route('posts.index') }}" class="golden-button">
                                <span class="golden-text">{{ __('home_lang.show_all_bt') }}</span>
                            </a>
                            @guest
                                <span>{{ __('home_lang.warning') }}</span>
                            @endguest

                            @auth
                                <a href="{{ route('admin.categories.index') }}" class="golden-button"><span class="golden-text">{{ __('home_lang.cat_bt') }}</span></a>
                                <a href="{{ route('admin.posts.index') }}" class="golden-button"><span class="golden-text">{{ __('home_lang.show_add_bt') }}</span></a>
                                <a href="{{ route('admin.posts.create') }}" class="golden-button"><span class="golden-text">{{ __('home_lang.create_bt') }}</span></a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

