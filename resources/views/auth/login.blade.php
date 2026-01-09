@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 px-4">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg">
        <!-- Header -->
        <div class="text-center">
            <div class="text-5xl mb-4">☕</div>
            <h2 class="text-3xl font-bold text-gray-900">Cafe POS</h2>
            <p class="mt-2 text-sm text-gray-600">Silakan login untuk melanjutkan</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    required
                    autofocus
                    value="{{ old('email') }}"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="admin@coffee.test">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="••••••••">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input
                    id="remember"
                    name="remember"
                    type="checkbox"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    Ingat saya
                </label>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                Masuk
            </button>
        </form>

        {{-- <!-- Demo Credentials -->
        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
            <p class="text-xs text-gray-600 font-semibold mb-2">Demo Akun:</p>
            <div class="text-xs text-gray-500 space-y-1">
                <p><strong>Admin:</strong> admin@coffee.test / password</p>
                <p><strong>Kasir:</strong> kasir1@coffee.test / password</p>
            </div>
        </div> --}}
    </div>
</div>
@endsection
