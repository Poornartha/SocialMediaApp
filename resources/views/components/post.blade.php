@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->username }}</a> 
    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    <p class="mb-2">
        {{$post->body}}
    </p>
    <div class="flex items-center">
        @if (auth()->user())
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                    @csrf
                    @method('POST')
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else 
                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1 ml-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Unlike</button>
                </form>
            @endif
        @else 
            <div class="text-red-500 mr-5">
            Please Login To Like a Post
            </div> 
        @endif
        @auth
            @if ($post->user->id == auth()->user()->id)
                <form action="{{ route('posts.delete', $post->id) }}" method="post" class="mr-1 ml-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            @endif
        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
        <a href="{{ route('posts.show', $post->id) }}" class="ml-2 btn-blue-300">Go To Post</a>

    </div>

</div>