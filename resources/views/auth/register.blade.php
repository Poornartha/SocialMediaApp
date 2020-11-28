@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-5/12 bg-white p-6 rounded-lg mt-6 mb-6">
            <form action="{{ route('register') }}" method="post">
            @csrf
            <h1 class="mb-8 text-3xl text-center mt-5">Register</h1>
                <input 
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mt-4 @error('name') border-red-500 @enderror"
                    name="name"
                    placeholder="Full Name" 
                    value="{{ old('name') }}"
                    />

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                <input 
                    type="text"
                    class="block border border-grey-light w-full p-3 rounded mt-4 @error('username') border-red-500 @enderror"
                    name="username"
                    placeholder="Username" value="{{ old('username') }}"/>
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
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
                    

                <input 
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mb-4 mt-4 @error('password') border-red-500 @enderror"
                    name="password_confirmed"
                    placeholder="Confirm Password" />

                <button
                    type="submit"
                    class="bg-blue-900 hover:bg-blue-500 text-white font-bold py-2 px-4 border-b-4 border-blue-500 hover:border-blue-700 rounded">
                    Create Account
                </button>
            </form>
            <div class="text-center text-sm text-grey-dark mt-4">
                By signing up, you agree to the 
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                    Terms of Service
                </a> and 
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                    Privacy Policy
                </a>
            </div>
        </div>
    </div>
    <div class="text-grey-dark mt-3 mb-10 text-center">
        Already have an account? 
        <a class="no-underline border-b border-blue text-blue" href="#">
            Log in
        </a>
    </div>
@endsection