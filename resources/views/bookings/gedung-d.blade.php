<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Gedung D - RoomEase</title>
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
            border-color: #f59e0b; 
            box-shadow: 0 10px 20px -10px rgba(245, 158, 11, 0.1);
            outline: none;
        }
    </style>
</head>
<body class="bg-[#f8fafc] plus-jakarta">

    <nav class="glass-nav sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-amber-500 rounded-xl flex items-center justify-center shadow-lg shadow-amber-100">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <span class="text-xl font-extrabold tracking-tight text-slate-900">Room<span class="text-amber-500">Ease</span></span>
                    </div>
                    <div class="hidden sm:flex items-center gap-2">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-bold text-amber-600 bg-amber-50 rounded-lg transition-all">Dashboard</a>
                        <a href="{{ route('rooms.index') }}" class="px-4 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 transition-all">Daftar Ruangan</a>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 leading-none mb-1">Mahasiswa</p>
                        <p class="text-sm font-bold text-slate-900 leading-none">Ai Sena Marlina</p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-gradient-to-tr from-amber-500 to-orange-400 flex items-center justify-center text-white font-bold border-2 border-white shadow-md">
                        AS
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="py-16">
        <div class="max-w-2xl mx-auto px-6">
            <div class="mb-10 text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">
                    Konfirmasi <span class="text-amber-500">Booking</span>
                </h2>
                <p class="text-slate-500 mt-2 text-sm font-light italic">Gedung D • Fakultas Teknik (Area Terpadu)</p>
            </div>

            <div class="bg-white overflow-hidden shadow-[0_20px_60px_-10px_rgba(15,23,42,0.05)] rounded-[2.5rem] border border-slate-100">
                <div class="p-8 sm:p-12">
                    <form action="{{ route('bookings.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <input type="hidden" name="room_id" value="6">
                        <input type="hidden" name="sub_room" value="Gedung D Terpadu">

                        <div class="group">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 block ml-1 group-focus-within:text-amber-500">Penyelenggara (Himpunan/UKM)</label>
                            <input type="text" name="organization" placeholder="Contoh: NAMA ORMAWA / UKM" required
                                class="form-input-custom w-full px-6 py-4 rounded-2xl text-base font-semibold text-slate-700">
                        </div>

                        <div class="group">
                            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 block ml-1 group-focus-within:text-amber-500">Nama Agenda / Kegiatan</label>
                            <input type="text" name="purpose" placeholder="Contoh: Belajar Bersama Himpunan" required
                                class="form-input-custom w-full px-6 py-4 rounded-2xl text-base font-semibold text-slate-700">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 block ml-1 group-focus-within:text-amber-500">Tanggal Peminjaman</label>
                                <input type="date" name="booking_date" required
                                    class="form-input-custom w-full px-6 py-4 rounded-2xl text-base font-semibold text-slate-700">
                            </div>

                            <div class="group">
                                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2 block ml-1 group-focus-within:text-amber-500">Waktu (Mulai - Selesai)</label>
                                <div class="flex items-center gap-2">
                                    <input type="time" name="start_time" required class="form-input-custom w-full px-4 py-4 rounded-2xl text-sm font-semibold text-slate-700 text-center">
                                    <span class="text-slate-300">-</span>
                                    <input type="time" name="end_time" required class="form-input-custom w-full px-4 py-4 rounded-2xl text-sm font-semibold text-slate-700 text-center">
                                </div>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full py-5 bg-slate-900 text-white text-[11px] font-black uppercase tracking-[0.4em] rounded-2xl hover:bg-amber-500 transition-all duration-300 shadow-lg shadow-slate-200 hover:shadow-amber-200">
                                Kirim Pengajuan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <footer class="text-center mt-12 pb-6">
                <p class="text-[9px] text-slate-300 font-bold uppercase tracking-[0.4em]">
                    ITG RoomEase • 2026
                </p>
            </footer>
        </div>
    </div>
</body>
</html>