@extends('layouts.app')

@section('title', 'Manajemen User')

@section('sidebar')
<div class="p-4">
    <h3 class="text-sm font-semibold text-gray-500 uppercase mb-4">Menu Admin</h3>
    <nav class="space-y-1">
        <a href="{{ route('users.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg">Users</a>
    </nav>
</div>
@endsection

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Manajemen User</h1>
            <p class="text-gray-600">Kelola akun pengguna sistem</p>
        </div>
        <a href="{{ route('users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Tambah User
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Role</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ strtoupper($user->role) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $user->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $user->status === 'active' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm space-x-2">
                        <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                        <form method="POST" action="{{ route('users.destroy', $user) }}" class="inline" onsubmit="return confirm('Yakin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                        </form>
                        <form method="POST" action="{{ route('users.toggle-status', $user) }}" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-yellow-600 hover:text-yellow-800">
                                {{ $user->status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
</div>
@endsection
