<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Admin Console | RoomEase</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.75); backdrop-filter: blur(12px); }
        .premium-shadow { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.03); }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#FBFCFE] text-slate-900" x-data="{ selectedBooking: null }">

    <nav class="glass sticky top-0 z-50 border-b border-slate-200/60">
        <div class="max-w-[1400px] mx-auto px-8 h-20 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-xl shadow-indigo-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div>
                    <h1 class="text-xl font-extrabold tracking-tight">Admin<span class="text-indigo-600">Ease</span></h1>
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">System Operational</span>
                    </div>
                </div>
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="group flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-600 text-xs font-bold rounded-xl hover:bg-rose-50 hover:text-rose-600 hover:border-rose-100 transition-all duration-300">
                    <span>Sign Out</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-[1400px] mx-auto px-8 py-12">
        <div class="flex justify-between items-end mb-12">
            <div>
                <span class="text-indigo-600 font-bold text-sm tracking-wider uppercase mb-2 block">Moderasi Pengajuan</span>
                <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Manajemen Booking</h2>
            </div>
            <div class="hidden lg:flex gap-3 text-right">
                <div class="px-6 py-3 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Request</p>
                    <p class="text-2xl font-black text-slate-800">{{ $bookings->count() }}</p>
                </div>
            </div>
        </div>

        @if(session('success'))
        <div class="mb-8 p-4 bg-indigo-600 text-white rounded-2xl shadow-xl shadow-indigo-100 flex items-center justify-between animate-in fade-in slide-in-from-top-4 duration-500">
            <div class="flex items-center gap-3">
                <div class="bg-white/20 p-2 rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg></div>
                <span class="font-bold text-sm">{{ session('success') }}</span>
            </div>
        </div>
        @endif

        <div class="bg-white rounded-[2.5rem] premium-shadow border border-slate-100 overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-6 text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">Peminjam</th>
                        <th class="px-8 py-6 text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">Fasilitas</th>
                        <th class="px-8 py-6 text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">Jadwal</th>
                        <th class="px-8 py-6 text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">Status</th>
                        <th class="px-8 py-6 text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($bookings as $booking)
                    <tr class="group hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-7">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center font-bold text-indigo-600 text-xs border border-indigo-100">
                                    {{ substr($booking->user->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900 leading-none mb-1">{{ $booking->user->name }}</p>
                                    <p class="text-[11px] font-bold text-indigo-500 uppercase tracking-tight">{{ $booking->organization }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-7">
                            <span class="px-3 py-1.5 bg-slate-100 text-slate-600 rounded-xl text-[11px] font-black uppercase border border-slate-200/50">
                                {{ $booking->room->room_name ?? 'N/A' }}
                            </span>
                        </td>
                        <td class="px-8 py-7">
                            <p class="text-sm font-bold text-slate-700">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</p>
                            <p class="text-[11px] text-slate-400 font-medium">Jam: {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}</p>
                        </td>
                        <td class="px-8 py-7">
                            @if($booking->status == 'pending')
                                <span class="flex items-center gap-1.5 text-amber-500 font-black text-[10px] uppercase tracking-wider italic">
                                    <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span> Menunggu
                                </span>
                            @elseif($booking->status == 'approved')
                                <span class="flex items-center gap-1.5 text-emerald-500 font-black text-[10px] uppercase tracking-wider italic">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Disetujui
                                </span>
                            @else
                                <span class="flex items-center gap-1.5 text-rose-500 font-black text-[10px] uppercase tracking-wider italic">
                                    <span class="w-1.5 h-1.5 bg-rose-500 rounded-full"></span> Ditolak
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-7">
                            <div class="flex justify-center">
                                <button 
                                    @click="selectedBooking = {{ json_encode($booking->load(['user', 'room'])) }}"
                                    class="px-5 py-2.5 bg-slate-900 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-indigo-600 hover:shadow-lg hover:shadow-indigo-100 transition-all duration-300"
                                >
                                    Detail & Aksi
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-20 text-center">
                            <p class="text-slate-400 font-bold uppercase text-[10px] tracking-widest">Tidak ada pengajuan masuk</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    <div 
        x-show="selectedBooking" 
        x-cloak
        class="fixed inset-0 z-[100] overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true"
    >
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div 
                x-show="selectedBooking"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="selectedBooking = null"
                class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"
            ></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div 
                x-show="selectedBooking"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-middle bg-white rounded-[2.5rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-white"
            >
                <div class="bg-indigo-600 px-8 py-10 text-white relative">
                    <button @click="selectedBooking = null" class="absolute top-6 right-6 text-white/50 hover:text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    <p class="text-indigo-200 text-[10px] font-black uppercase tracking-[0.2em] mb-2">Detail Pengajuan</p>
                    <h3 class="text-2xl font-extrabold" x-text="selectedBooking?.user?.name"></h3>
                    <p class="text-indigo-100 text-sm font-medium opacity-80" x-text="selectedBooking?.organization"></p>
                </div>

                <div class="px-8 py-10 bg-white">
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg></div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Fasilitas & Ruangan</p>
                                <p class="text-sm font-bold text-slate-700" x-text="selectedBooking?.room?.room_name"></p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Waktu Peminjaman</p>
                                <p class="text-sm font-bold text-slate-700" x-text="`${selectedBooking?.booking_date} | Jam ${selectedBooking?.start_time?.split('T')[1]?.substring(0,5) || ''}`"></p>
                            </div>
                        </div>

                        <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tujuan Penggunaan</p>
                            <p class="text-sm text-slate-600 font-medium italic" x-text="`“${selectedBooking?.purpose}”`"></p>
                        </div>
                    </div>

                    <template x-if="selectedBooking?.status === 'pending'">
                        <div class="grid grid-cols-2 gap-4 mt-10">
                            <form :action="`/admin/bookings/${selectedBooking.id}/status`" method="POST">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="approved">
                                <button class="w-full py-4 bg-emerald-500 text-white rounded-2xl font-black text-[11px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-100">Setujui</button>
                            </form>
                            <form :action="`/admin/bookings/${selectedBooking.id}/status`" method="POST">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="rejected">
                                <button class="w-full py-4 bg-rose-500 text-white rounded-2xl font-black text-[11px] uppercase tracking-widest hover:bg-rose-600 transition-all shadow-lg shadow-rose-100">Tolak</button>
                            </form>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

</body>
</html>