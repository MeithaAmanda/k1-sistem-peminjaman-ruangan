<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | RoomEase</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #0f172a; }
        .glass-sidebar { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border-right: 1px solid rgba(15, 23, 42, 0.05); }
        .stat-card { background: white; border: 1px solid rgba(15, 23, 42, 0.05); transition: all 0.3s ease; }
        [x-cloak] { display: none !important; }
        /* Animasi halus untuk elemen yang bisa diklik */
        .clickable-action { cursor: pointer; transition: all 0.2s ease-in-out; }
        .clickable-action:hover { transform: scale(1.02); }
        .clickable-icon:hover { transform: scale(1.1) rotate(-5deg); }
    </style>
</head>
<body class="flex min-h-screen" x-data="{ selectedBooking: null }">

    <aside class="w-72 glass-sidebar fixed h-full z-10 hidden lg:flex flex-col p-8">
        <div class="mb-12">
            <h1 class="text-sm font-extrabold tracking-[0.3em] uppercase italic">Room<span class="text-blue-600">Ease</span></h1>
        </div>
        <nav class="space-y-2 flex-1">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl bg-[#0f172a] text-white shadow-lg transition-all text-xs font-bold uppercase tracking-widest">
                Overview
            </a>
            <a href="{{ route('rooms.index') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl text-slate-400 hover:bg-slate-50 transition-all text-xs font-bold uppercase tracking-widest">
                Pesan Ruangan
            </a>
        </nav>
        <div class="pt-8 border-t border-slate-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-4 px-6 py-4 rounded-2xl text-red-400 hover:bg-red-50 transition-all text-xs font-bold uppercase tracking-widest w-full text-left">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 lg:ml-72 p-6 md:p-12">
        
        <div class="lg:hidden flex justify-between items-center mb-8">
             <h1 class="text-xs font-extrabold tracking-[0.2em] uppercase">Room<span class="text-blue-600">Ease</span></h1>
             <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-[10px] font-bold">
                {{ substr(Auth::user()->name, 0, 2) }}
             </div>
        </div>

        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
             class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <p class="text-xs font-bold">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="text-emerald-400 hover:text-emerald-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        @endif

        <header class="mb-12">
            @if(request()->routeIs('bookings.edit'))
                <a href="{{ route('dashboard') }}" class="text-blue-600 text-[10px] font-black uppercase tracking-widest mb-4 inline-block">← Kembali Ke Dashboard</a>
                <h2 class="text-3xl font-extrabold tracking-tight italic">Perbarui <span class="text-blue-600">Reservasi</span></h2>
            @else
                <h2 class="text-3xl font-extrabold tracking-tight italic">Halo, {{ Auth::user()->name }}!</h2>
                <p class="text-slate-400 text-sm font-light">Pantau dan kelola pengajuan ruangan Anda.</p>
            @endif
        </header>

        @isset($booking)
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="bg-[#0f172a] rounded-[2.5rem] p-8 mb-8 flex justify-between items-center shadow-xl border border-white/5 relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-48 h-48 bg-blue-600/10 rounded-full -mr-24 -mt-24 blur-2xl"></div>
                <div class="relative z-10">
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Fasilitas Yang Dipilih</p>
                    <h2 class="text-2xl font-extrabold text-white tracking-tight italic">
                        {{ $booking->room->room_name ?? 'Fasilitas Belum Dipilih' }}
                    </h2>
                </div>
                <a href="{{ route('rooms.index') }}" 
                   class="relative z-10 w-12 h-12 bg-white/10 hover:bg-blue-600 border border-white/20 rounded-2xl flex items-center justify-center text-white transition-all duration-300 group shadow-lg clickable-icon"
                   title="Ganti Fasilitas">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </a>
            </div>

            <div class="space-y-6 bg-white p-8 md:p-10 rounded-[3rem] shadow-sm border border-slate-100 mb-12">
                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Organisasi / Peminjam</label>
                    <input type="text" name="organization" value="{{ $booking->organization }}" class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl font-bold text-slate-700 focus:ring-2 focus:ring-blue-600 outline-none transition-all">
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Tanggal Penggunaan Baru</label>
                    <input type="date" name="booking_date" value="{{ $booking->booking_date }}" class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl font-bold text-slate-700 focus:ring-2 focus:ring-blue-600 outline-none transition-all">
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">Tujuan & Agenda Kegiatan</label>
                    <textarea name="purpose" rows="4" class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl font-bold text-slate-700 focus:ring-2 focus:ring-blue-600 outline-none transition-all">{{ $booking->purpose }}</textarea>
                </div>
                
                <div class="p-4 bg-blue-50 rounded-2xl flex gap-4 items-center border border-blue-100">
                    <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-[10px]">i</div>
                    <p class="text-[10px] font-bold text-blue-800 leading-tight tracking-tight">SISTEM AKAN MERESET STATUS MENJADI "PENDING" AGAR ADMIN DAPAT MEMVALIDASI ULANG JADWAL BARU ANDA.</p>
                </div>

                <button type="submit" class="w-full py-5 bg-[#0f172a] text-white rounded-[1.5rem] font-black uppercase tracking-widest hover:bg-blue-600 transition-all shadow-xl shadow-blue-100">Simpan Perubahan</button>
            </div>
        </form>
        @endisset

        @if(!request()->routeIs('bookings.edit'))
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="stat-card p-8 rounded-[2.5rem]">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-4">Total Booking</p>
                <h3 class="text-4xl font-extrabold tracking-tighter">{{ $bookings->count() }}</h3>
            </div>
            <div class="stat-card p-8 rounded-[2.5rem] border-l-4 border-l-amber-400">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-4">Menunggu</p>
                <h3 class="text-4xl font-extrabold tracking-tighter text-amber-500">{{ $bookings->where('status', 'pending')->count() }}</h3>
            </div>
            <div class="stat-card p-8 rounded-[2.5rem] border-l-4 border-l-emerald-400">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-4">Disetujui</p>
                <h3 class="text-4xl font-extrabold tracking-tighter text-emerald-500">{{ $bookings->where('status', 'approved')->count() }}</h3>
            </div>
        </div>

        <div class="lg:col-span-8">
            <h3 class="text-lg font-black uppercase tracking-widest mb-8">Riwayat Booking</h3>
            <div class="space-y-4">
                @forelse($bookings as $booking_item)
                <div class="bg-white p-5 md:p-6 rounded-[2rem] flex flex-col md:flex-row md:items-center justify-between border border-slate-50 hover:shadow-xl hover:scale-[1.01] transition-all duration-300">
                    <div class="flex items-center gap-6 mb-4 md:mb-0">
                        <div class="w-14 h-14 bg-slate-50 rounded-2xl flex flex-col items-center justify-center text-center shrink-0">
                            <span class="text-[9px] font-black uppercase text-blue-600">{{ \Carbon\Carbon::parse($booking_item->booking_date)->translatedFormat('M') }}</span>
                            <span class="text-xl font-extrabold text-slate-800">{{ \Carbon\Carbon::parse($booking_item->booking_date)->format('d') }}</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 leading-tight mb-1">{{ $booking_item->purpose }}</h4>
                            <p class="text-xs text-slate-400 font-medium">
                                {{ $booking_item->room->room_name ?? 'Fasilitas' }} 
                                <span class="mx-2">•</span> 
                                {{ \Carbon\Carbon::parse($booking_item->start_time)->format('H:i') }} WIB
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between md:justify-end gap-3 pt-4 md:pt-0 border-t md:border-t-0">
                        <button @click="selectedBooking = {{ json_encode($booking_item->load('room')) }}"
                                class="p-2.5 text-blue-600 bg-blue-50 rounded-xl hover:bg-blue-600 hover:text-white transition-all shadow-sm clickable-action">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </button>

                        @if($booking_item->status == 'pending')
                            <a href="{{ route('bookings.edit', $booking_item->id) }}" 
                               class="p-2.5 text-amber-600 bg-amber-50 rounded-xl hover:bg-amber-600 hover:text-white transition-all shadow-sm clickable-action">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>

                            <form action="{{ route('bookings.destroy', $booking_item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2.5 text-rose-600 bg-rose-50 rounded-xl hover:bg-rose-600 hover:text-white transition-all shadow-sm clickable-action">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        @endif

                        <span class="px-4 py-2 rounded-full text-[9px] font-black uppercase {{ $booking_item->status == 'approved' ? 'bg-emerald-50 text-emerald-600' : ($booking_item->status == 'pending' ? 'bg-amber-50 text-amber-600' : 'bg-red-50 text-red-600') }}">
                            {{ $booking_item->status }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="bg-white p-12 rounded-[2rem] text-center border border-dashed border-slate-200">
                    <p class="text-slate-400 font-bold uppercase tracking-widest text-xs">Belum ada booking</p>
                </div>
                @endforelse
            </div>
        </div>
        @endif
    </main>

    <div x-cloak x-show="selectedBooking" class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
        <div class="bg-white w-full max-w-lg rounded-[3rem] p-10 shadow-2xl relative" @click.away="selectedBooking = null">
            <button @click="selectedBooking = null" class="absolute top-10 right-10 text-slate-300 hover:text-slate-900 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <h3 class="text-2xl font-black italic mb-8 uppercase tracking-tighter text-blue-600">Detail Reservasi</h3>
            <div class="space-y-6">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Kegiatan</p>
                    <p class="text-sm font-bold text-slate-900" x-text="selectedBooking?.purpose"></p>
                </div>
                <div class="pt-6 border-t border-slate-50">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Lokasi</p>
                    <p class="text-sm font-bold text-slate-900" x-text="selectedBooking?.room?.room_name"></p>
                </div>
                <div class="pt-6 border-t border-slate-100">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Waktu</p>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="px-3 py-1 bg-slate-900 text-white text-[10px] font-bold rounded-lg" x-text="selectedBooking?.booking_date"></span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded-lg" x-text="selectedBooking?.start_time ? selectedBooking.start_time.substring(0,5) + ' WIB' : ''"></span>
                    </div>
                </div>
            </div>
            <button @click="selectedBooking = null" class="w-full mt-10 py-4 bg-slate-950 text-white rounded-[1.5rem] text-[10px] font-black uppercase tracking-[0.2em] hover:bg-blue-600 transition-all shadow-xl">Tutup Detail</button>
        </div>
    </div>

</body>
</html>