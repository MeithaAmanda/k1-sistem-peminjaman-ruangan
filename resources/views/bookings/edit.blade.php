<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservasi | RoomEase</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .premium-card { background: white; border: 1px solid rgba(15, 23, 42, 0.05); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.03); }
        input, textarea { transition: all 0.2s ease-in-out; }
        .interactive-hover:hover { transform: scale(1.02); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 bg-[#FDFEFF]">

    <div class="w-full max-w-xl animate-in fade-in slide-in-from-bottom-4 duration-700">
        <div class="mb-8 flex justify-between items-end px-2">
            <div>
                <a href="{{ route('dashboard') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-600 flex items-center gap-2 mb-2 hover:gap-3 transition-all group">
                    <svg class="w-3 h-3 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                    Kembali ke Dashboard
                </a>
                <h1 class="text-3xl font-extrabold tracking-tighter italic text-slate-900">Perbarui <span class="text-blue-600">Reservasi</span></h1>
            </div>
            <div class="text-right hidden sm:block">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">ID Booking</p>
                <p class="text-xs font-black text-slate-900 bg-slate-100 px-3 py-1 rounded-full italic">#RE-{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</p>
            </div>
        </div>

        <div class="premium-card rounded-[3rem] overflow-hidden border border-white">
            <div class="bg-slate-900 p-8 text-white flex items-center justify-between relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600/20 blur-3xl rounded-full -mr-16 -mt-16"></div>
                
                <div class="relative z-10">
                    <p class="text-[10px] font-black uppercase tracking-widest opacity-60 mb-1">Fasilitas yang dipilih</p>
                    <h2 class="text-xl font-bold tracking-tight text-white">{{ $booking->room->room_name ?? 'Pilih Fasilitas' }}</h2>
                </div>
                
                <a href="{{ url('/daftar-ruangan') }}" 
                   title="Ganti Ruangan" 
                   class="relative z-10 w-12 h-12 bg-blue-600 hover:bg-blue-500 rounded-2xl flex items-center justify-center border border-white/10 shadow-lg shadow-blue-900/40 transition-all hover:scale-110 active:scale-95 group">
                    <svg class="w-6 h-6 text-white group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </a>
            </div>

            <form action="{{ route('bookings.update', $booking->id) }}" method="POST" class="p-10 space-y-7 bg-white">
                @csrf
                @method('PATCH')

                <input type="hidden" name="room_id" value="{{ old('room_id', $booking->room_id) }}">

                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 mb-2 block">Organisasi / Peminjam</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <input type="text" name="organization" 
                               value="{{ old('organization', $booking->organization) }}" required
                               class="w-full pl-12 pr-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-sm font-bold text-slate-900 focus:ring-4 focus:ring-blue-50 focus:border-blue-600 outline-none transition-all shadow-sm"
                               placeholder="Nama Organisasi...">
                    </div>
                    @error('organization') <p class="text-red-500 text-[10px] mt-2 font-bold ml-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 mb-2 block">Tanggal Penggunaan Baru</label>
                    <input type="date" name="booking_date" 
                            value="{{ old('booking_date', $booking->booking_date) }}" required
                            min="{{ date('Y-m-d') }}"
                            class="w-full px-6 py-4 bg-white border @error('booking_date') border-red-500 @else border-slate-100 @enderror rounded-2xl text-sm font-bold text-slate-900 focus:ring-4 focus:ring-blue-50 focus:border-blue-600 outline-none shadow-sm">
                    @error('booking_date') <p class="text-red-500 text-[10px] mt-2 font-bold ml-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1 mb-2 block">Tujuan & Agenda Kegiatan</label>
                    <textarea name="purpose" rows="4" required
                              class="w-full px-6 py-4 bg-white border @error('purpose') border-red-500 @else border-slate-100 @enderror rounded-2xl text-sm font-bold text-slate-900 focus:ring-4 focus:ring-blue-50 focus:border-blue-600 outline-none placeholder:text-slate-300 shadow-sm"
                              placeholder="Contoh: Rapat Koordinasi Program Kerja BEM...">{{ old('purpose', $booking->purpose) }}</textarea>
                    @error('purpose') <p class="text-red-500 text-[10px] mt-2 font-bold ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="p-4 bg-blue-50 rounded-2xl border border-blue-100 flex gap-4">
                    <div class="w-8 h-8 bg-blue-600 rounded-xl flex items-center justify-center shrink-0 shadow-lg shadow-blue-200">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-[10px] font-bold text-blue-800 leading-relaxed uppercase tracking-tight">
                        Sistem akan mereset status menjadi <span class="underline">"Pending"</span> agar Admin dapat memvalidasi ulang jadwal baru Anda.
                    </p>
                </div>

                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" class="w-full py-5 bg-blue-600 text-white rounded-[2rem] text-[11px] font-black uppercase tracking-[0.2em] hover:bg-blue-700 hover:-translate-y-1 active:scale-95 transition-all shadow-xl shadow-blue-100">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('dashboard') }}" class="w-full py-5 bg-white border border-slate-100 text-slate-400 rounded-[2rem] text-[11px] text-center font-black uppercase tracking-[0.2em] hover:bg-slate-50 transition-all">
                        Batalkan Edit
                    </a>
                </div>
            </form>
        </div>

        <p class="text-center mt-8 text-[10px] font-bold text-slate-300 uppercase tracking-widest">
            RoomEase System v2.0 • Institut Teknologi Garut
        </p>
    </div>

</body>
</html>