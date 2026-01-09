@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('sidebar')
<div class="p-4">
    <h3 class="text-sm font-semibold text-gray-500 uppercase mb-4">Menu Admin</h3>
    <nav class="space-y-1">
        
    </nav>
</div>
@endsection

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Dashboard Admin</h1>
        <p class="text-gray-600">Selamat datang, {{ auth()->user()->name }}</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="text-sm font-medium text-gray-600">Total User</div>
            <div class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\User::count() }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="text-sm font-medium text-gray-600">Total Menu</div>
            <div class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Menu::count() }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="text-sm font-medium text-gray-600">Transaksi Hari Ini</div>
            <div class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Transaction::whereDate('created_at', today())->count() }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="text-sm font-medium text-gray-600">Omset Hari Ini</div>
            <div class="text-3xl font-bold text-gray-900 mt-2">Rp {{ number_format(\App\Models\Transaction::whereDate('created_at', today())->where('payment_status', 'paid')->sum('total_price'), 0, ',', '.') }}</div>
        </div>
    </div>
</div>
@endsection
