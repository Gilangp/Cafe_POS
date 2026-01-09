<?php
<aside class="w-64 bg-white shadow-sm min-h-screen">
    <div class="p-4">
        <h3 class="text-sm font-semibold text-gray-500 uppercase mb-4">Menu</h3>
        <nav class="space-y-1">
            @if(auth()->user()->role === 'admin')
                <!-- Admin Menu -->
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : '' }}">
                    📊 Dashboard
                </a>
                <a href="{{ route('users.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg {{ request()->routeIs('users.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                    👥 User Management
                </a>
                {{-- <a href="{{ route('menus.index') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                    📋 Menu Management
                </a>
                <a href="{{ route('reports.omzet') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                    📈 Reports
                </a> --}}
            @elseif(auth()->user()->role === 'kasir')
                <!-- Kasir Menu -->
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : '' }}">
                    🏪 Dashboard
                </a>
                {{-- <a href="{{ route('transactions.create') }}"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                    🛒 Transaksi Baru
                </a> --}}
            @endif
        </nav>
    </div>
</aside>
