<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Lapangan Basket - RoomEase</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .plus-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #f1f5f9;
        }
        .form-input-custom { 
            background: #ffffff; 
            border: 1.5px solid #f1f5f9; 
            transition: all 0.3s ease;
        }
        .form-input-custom:focus { 
            border-color: #f59e0b; /* Warna Amber/Orange untuk Basket */
            box-shadow: 0 10px 20px -10px rgba(245, 158, 11, 0.15);
            outline: none;
        }
    </style>
</head>
<body class="bg-[#fcfcfd] plus-jakarta">

    <nav class="glass-nav sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center shadow-lg shadow-orange-100">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <span class="text-xl font-extrabold tracking-tight text-slate-900">Room<span class="text-orange-500">Ease</span></span>
                    </div>
                    <div class="hidden sm:flex items-center gap-2">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-bold text-orange-600 bg-orange-50 rounded-lg">Dashboard</a>
                        <a href="{{ route('rooms.index') }}" class="px-4 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 transition-all">Daftar Fasilitas</a>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 leading-none mb-1">Mahasiswa</p>
                        <p class="text-sm font-bold text-slate-900 leading-none">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold border-2 border-white shadow-sm">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="py-16">
        <div class="max-w-2xl mx-auto px-6">
            
            <div class="mb-10 text-center">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-[10px] font-bold uppercase tracking-wider mb-4">
                    Fasilitas Olahraga
                </div>
                <h2 class="text-4xl font-extrabold tracking-tight text-slate-900">
                    Booking <span class="text-orange-500">Lap. Basket</span>
                </h2>
                <p class="text-slate-500 mt-2 text-sm font-medium opacity-70 italic">Area Sport Center • Lantai Dasar</p>
            </div>

            @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-100 rounded-2xl">
                <p class="text-[10px] font-black uppercase text-red-500 mb-2 tracking-widest">Terjadi Kesalahan</p>
                <ul class="list-disc list-inside text-xs font-bold text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-[0_20px_50px_-12px_rgba(0,0,0,0.05)] rounded-[2.5rem] border border-slate-100">
                <div class="p-8 sm:p-12">
                    <form action="/booking/basket" method="POST" class="space-y-8">
                        @csrf
                        <input type="hidden" name="room_id" value="11">
                        
                        <div class="group">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 block ml-1 group-focus-within:text-orange-500 transition-colors">Nama UKM / Tim</label>
                            <input type="text" name="organization" value="{{ old('organization') }}" placeholder="Contoh: UKM Basket / Teknik FC" required
                                class="form-input-custom w-full px-6 py-4 rounded-2xl text-base font-semibold text-slate-700 placeholder:text-slate-300">
                        </div>

                        <div class="group">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 block ml-1 group-focus-within:text-orange-500 transition-colors">Kegiatan</label>
                            <input type="text" name="purpose" value="{{ old('purpose') }}" placeholder="Contoh: Latihan Rutin / Pertandingan Persahabatan" required
                                class="form-input-custom w-full px-6 py-4 rounded-2xl text-base font-semibold text-slate-700 placeholder:text-slate-300">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 block ml-1 group-focus-within:text-orange-500 transition-colors">Tanggal Pakai</label>
                                <input type="date" name="booking_date" value="{{ old('booking_date') }}" required class="form-input-custom w-full px-6 py-4 rounded-2xl text-base font-semibold text-slate-700">
                            </div>

                            <div class="group">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 block ml-1 group-focus-within:text-orange-500 transition-colors">Durasi Waktu</label>
                                <div class="flex items-center gap-2">
                                    <input type="time" name="start_time" value="{{ old('start_time') }}" required class="form-input-custom w-full px-4 py-4 rounded-2xl text-sm font-semibold text-slate-700 text-center">
                                    <span class="text-slate-300 font-bold">-</span>
                                    <input type="time" name="end_time" value="{{ old('end_time') }}" required class="form-input-custom w-full px-4 py-4 rounded-2xl text-sm font-semibold text-slate-700 text-center">
                                </div>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full py-5 bg-slate-900 text-white text-[11px] font-black uppercase tracking-[0.4em] rounded-2xl hover:bg-orange-500 transition-all duration-300 shadow-lg shadow-slate-100 hover:shadow-orange-200">
                                Ajukan Peminjaman Lapangan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <footer class="text-center mt-12 pb-6">
                <p class="text-[9px] text-slate-300 font-bold uppercase tracking-[0.4em]">
                    ITG Infrastructure Service • 2026
                </p>
            </footer>
        </div>
    </div>
</body>
</html>