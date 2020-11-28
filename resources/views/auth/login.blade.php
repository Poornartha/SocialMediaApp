@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-5/12 bg-white p-6 rounded-lg mt-6 mb-6">
            <form action="{{ route('login') }}" method="post">
            @csrf
            <h1 class="mb-8 text-3xl text-center mt-5">Login</h1>
                <p class="text-red-500"> 
                    @if (session('status'))
                        {{ session('status') }}
                    @endif
                </p>
                <input 
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mt-4 @error('email') border-red-500 @enderror"
                    name="email"
                    placeholder="Email" value="{{ old('email') }}"/>

                @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <input 
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mt-4 @error('password') border-red-500 @enderror"
                    name="password"
                    placeholder="Password" />

                @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-4 mt-3">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
                
                <button
                    type="submit"
                    class="bg-blue-900 hover:bg-blue-500 mt-5 text-white font-bold py-2 px-4 border-b-4 border-blue-500 hover:border-blue-700 rounded">
                    Login
                </button>

            </form>
        </div>
    </div>
    <div class="text-grey-dark mt-3 mb-10 text-center">
        Haven't Registered yet,
        <a class="no-underline border-b border-blue text-blue" href="#">
            Register here
        </a>
    </div>
@endsection