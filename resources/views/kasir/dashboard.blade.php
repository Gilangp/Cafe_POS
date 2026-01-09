@extends('layouts.app')

@section('title', 'Dashboard Kasir')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard Kasir</h1>
        <p class="text-gray-600">Selamat datang, {{ auth()->user()->name }}</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
        <div class="text-6xl mb-4">🛒</div>
        <h2 class="text-xl font-semibold text-gray-900 mb-2">Siap Melayani</h2>
        <p class="text-gray-600 mb-6">Mulai transaksi penjualan sekarang</p>
        {{-- <a href="{{ route('transactions.create') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
            Mulai Transaksi Baru
        </a> --}}
    </div>
</div>
@endsection
