@extends('layouts.app') {{-- Jika Anda menggunakan layout utama --}}

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <a href="{{ url('/daftar-ruangan') }}" class="text-blue-600 font-bold mb-8 block">← Kembali</a>

    <div class="bg-white rounded-[3rem] shadow-xl overflow-hidden border border-slate-100">
        <div class="h-64 bg-blue-600 p-12 flex items-end">
            <h1 class="text-4xl font-extrabold text-white capitalize">
                {{ str_replace('-', ' ', $slug) }} {{-- Mengubah slug jadi teks biasa --}}
            </h1>
        </div>

        <div class="p-8 md:p-12">
            <h2 class="text-xl font-bold mb-4">Informasi Ruangan</h2>
            <p class="text-slate-500 mb-8">
                Halaman ini menampilkan detail untuk <strong>{{ str_replace('-', ' ', $slug) }}</strong>. 
                Fasilitas dan jadwal ketersediaan dapat dilihat melalui panel di bawah.
            </p>
            
            {{-- Form pemesanan tetap sama seperti kodingan sebelumnya --}}
        </div>
    </div>
</div>
@endsection