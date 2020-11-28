@extends('layouts.app')

@section('content')
    <div class="flex justify-center mb-5">
        <div class="w-8/12 bg-white p-6 rounded-lg mt-6">
            @auth
            <form action="{{ route('posts') }}" method="post">
                @csrf
                <div class="mb-4">
                    <textarea name="body" id="body" cols="30" rows="4"
                    class="bg-green-50 border-2 w-full p-4 border-green-800 rounded-lg
                    @error('body') border-red-500 @enderror"
                    placeholder="Post Something!"></textarea>
                    
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="bg-blue-500 text-white px-4 mt-3 mb-5 py-2 rounded font-medium">
                        Post
                    </button>
                </div>
            </form>
            @endauth
            @if($posts -> count())  
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                {{ $posts->links() }}
            @else
                No Posts at the moment. 
            @endif
        </div>
    </div>
@endsection