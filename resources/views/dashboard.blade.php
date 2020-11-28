@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mt-6">
            @if (auth()->user())
                <div align="center" class="text-2xl font-medium mb-1"><b> Welcome {{ auth()->user()->username }}  </b></div>
                <h1 align="center" class="text-xl font-medium mb-1 mt-4">People You Follow</h1>
            @else 
                Welcome <br> Please Login to Access Dashboard
            @endif
            @foreach ($friends as $friend)
        <div class="mt-10">
            <div class="grid mb-8 text-center p-2 border border-grey-600 rounded">
              <div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold dark:text-gray-300">
                <a href="{{ route('users.posts', $friend) }}" class="font-bold">{{ $friend->username }}</a> 
                </h4>
                <p class="text-gray-600 dark:text-gray-400 mb-5">
                  {{$friend->email}}
                </p>
                <a href="{{ route('users.posts', $friend) }}" class="bg-blue-500 text-white px-4 mt-6 py-2 rounded font-medium">
                    Profile
                </a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
@endsection