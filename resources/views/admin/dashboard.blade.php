<x-app-layout>
    <x-slot name="header">
        <h2>Admin Dashboard</h2>
    </x-slot>

    <div class="py-6 px-6">
        <p>Selamat datang, {{ auth()->user()->name }}</p>
        <a href="{{ url('/admin/users') }}" class="text-blue-500 underline">Lihat Senarai Pengguna</a>
    </div>
</x-app-layout>
