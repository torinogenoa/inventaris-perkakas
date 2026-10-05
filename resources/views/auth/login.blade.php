@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Login Sistem</h2>
    
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-indigo-300">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
            <input type="password" name="password" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-indigo-300">
        </div>
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Login</button>
    </form>

    <!-- <div class="mt-4 text-xs text-gray-500 bg-gray-50 p-3 rounded">
        <p><b>Akun Demo Admin:</b> admin@mail.com | password: password</p>
        <p><b>Akun Demo User:</b> user@mail.com | password: password</p>
    </div> -->
</div>
@endsection