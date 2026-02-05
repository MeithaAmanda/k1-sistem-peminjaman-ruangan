<x-app-layout>
    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <a href="{{ route('rooms.index') }}" class="text-[10px] font-bold uppercase tracking-widest text-blue-600 hover:text-slate-900 transition-colors">
                    ← Kembali ke Daftar Ruangan
                </a>
                <h2 class="text-4xl font-extrabold tracking-tighter text-slate-900 mt-4 italic">
                    Konfirmasi <span class="text-blue-600">Pemesanan.</span>
                </h2>
                <p class="text-slate-500 font-light">Lengkapi detail untuk peminjaman Ruang Rapat Utama Gedung A.</p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm border border-slate-100 rounded-[2.5rem]">
                <div class="p-10">
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="room_id" value="1"> <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 ml-2">Nama Agenda / Kegiatan</label>
                                <input type="text" name="purpose" required placeholder="Contoh: Koordinasi Bulanan BEM" 
                                    class="w-full px-6 py-4 rounded-2xl border-slate-100 bg-slate-50 focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition-all text-sm font-medium">
                            </div>

                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 ml-2">Tanggal Peminjaman</label>
                                <input type="date" name="booking_date" required 
                                    class="w-full px-6 py-4 rounded-2xl border-slate-100 bg-slate-50 focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition-all text-sm font-medium">
                            </div>

                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 ml-2">Waktu (Mulai - Selesai)</label>
                                <div class="flex items-center gap-2">
                                    <input type="time" name="start_time" required class="w-full px-4 py-4 rounded-2xl border-slate-100 bg-slate-50 text-sm">
                                    <span class="text-slate-300">-</span>
                                    <input type="time" name="end_time" required class="w-full px-4 py-4 rounded-2xl border-slate-100 bg-slate-50 text-sm">
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 ml-2">Catatan Tambahan (Opsional)</label>
                                <textarea name="notes" rows="3" placeholder="Contoh: Butuh 2 proyektor dan 5 kursi tambahan" 
                                    class="w-full px-6 py-4 rounded-2xl border-slate-100 bg-slate-50 focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition-all text-sm font-medium"></textarea>
                            </div>
                        </div>

                        <div class="mt-10">
                            <button type="submit" class="w-full py-5 bg-blue-600 text-white text-[11px] font-black uppercase tracking-[0.4em] rounded-2xl hover:bg-slate-950 transition-all shadow-xl shadow-blue-100">
                                Ajukan Reservasi Sekarang →
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <p class="text-center mt-8 text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">
                ITG Infrastructure Service • 2026
            </p>
        </div>
    </div>
</x-app-layout>