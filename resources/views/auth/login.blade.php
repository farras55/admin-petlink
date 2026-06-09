@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex justify-center items-center min-h-[80vh]">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border border-gray-100">
        <h2 class="text-3xl font-bold text-center text-primary mb-6">PetLink Admin</h2>
        
        @if ($errors->any())
            <div class="bg-dangerLight text-danger p-3 rounded mb-6 text-sm border border-red-200">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="login_id" class="block text-sm font-medium text-gray-700 mb-1">Email atau Username</label>
                <input type="text" id="login_id" name="login_id" value="{{ old('login_id') }}" required autofocus
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary outline-none transition">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary outline-none transition">
            </div>
            <button type="submit" class="w-full bg-primary hover:bg-primaryDark text-white font-bold py-3 px-4 rounded-lg transition duration-200 shadow-md">
                Login
            </button>
        </form>
    </div>
</div>
@endsection