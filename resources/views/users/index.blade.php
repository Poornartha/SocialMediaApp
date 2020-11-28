@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
        <div class="mt-5" style="text-align: left;">
            <h1 class="text-2xl font-medium mb-1">{{$user->name}}</h1>
            <h2 class="text-l font-small mb-1"><b>Email:</b> {{$user->email}}</h2>
            <h2 class="text-l font-small mb-1"><b>Number of Posts:</b> {{$posts->count()}} {{Str::plural('post', $posts->count())}}</h2>
            @if (!auth()->user()->isFriend($user))
            <form action="{{ route('addFriend', $user->id) }}" method="post">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 mt-3 mb-5 py-2 rounded font-medium">
                    Add as a friend
                </button>
            </form>
            @else
                <button type="submit" class="bg-gray-500 text-white px-4 mt-3 mb-5 py-2 rounded font-medium disabled:opacity-75" disabled>
                    Already a friend
                </button>
            @endif
        </div>
        <div class="bg-white p-6 rounded-lg mt-6">
            <div class="text-center border p-5 border-blue-500 rounded mb-5">
                <b>{{ $user->username }}</b> Posts
            </div>

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
    </div>
@endsection