<div class="row">
    @forelse($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text short-content">{{ Str::limit($post->content, 100) }}</p>
                        <div class="full-content">
                            <p>{{ $post->content }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @empty
        <p>{{ __('blog_lang.search_res') }}</p>
    @endforelse
</div>
