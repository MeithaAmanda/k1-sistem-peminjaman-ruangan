<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ruangan | RoomEase ITG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #0f172a; }
        .room-card { 
            background: white; 
            border-radius: 2rem;
            border: 1px solid rgba(15, 23, 42, 0.05);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .room-card:hover { 
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.08);
            border-color: #2563eb;
        }
        .icon-box {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            margin-bottom: 1.5rem;
        }
        .hidden-card { display: none; }
        .filter-btn.active { background-color: #0f172a; color: white; }
    </style>
</head>
<body class="p-6 md:p-12">

    <div class="max-w-7xl mx-auto">
        <header class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div>
                <a href="/dashboard" class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-600 mb-4 block hover:ml-1 transition-all">← Kembali ke Dashboard</a>
                <h2 class="text-5xl font-extrabold tracking-tighter italic">Pilih <span class="text-blue-600">Ruangan.</span></h2>
                <p class="text-slate-400 mt-2 font-light">Temukan fasilitas terbaik tanpa hambatan visual.</p>
            </div>
            
            <div class="flex bg-white p-2 rounded-2xl border border-slate-100 shadow-sm">
                <button onclick="filterSelection('all', this)" class="filter-btn active px-6 py-2 text-[10px] font-bold uppercase tracking-widest rounded-xl transition-all">Semua</button>
                <button onclick="filterSelection('gedung', this)" class="filter-btn px-6 py-2 text-slate-400 text-[10px] font-bold uppercase tracking-widest rounded-xl hover:text-slate-950 transition-all">Gedung</button>
                <button onclick="filterSelection('fasilitas', this)" class="filter-btn px-6 py-2 text-slate-400 text-[10px] font-bold uppercase tracking-widest rounded-xl hover:text-slate-950 transition-all">Fasilitas</button>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="roomContainer">
            
            <a href="/booking/rapat-utama" class="room-card p-8 group filter-item gedung">
                <div>
                    <div class="icon-box bg-blue-50 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold tracking-tight group-hover:text-blue-600 transition-colors">Ruang Rapat Utama</h3>
                    <p class="text-xs text-slate-400 font-light mt-1 mb-4">Gedung Rektorat • Lantai 2</p>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[9px] font-black uppercase rounded-full">Tersedia</span>
                </div>
                <div class="mt-8 pt-6 border-t border-slate-50">
                    <span class="block w-full py-4 bg-slate-950 text-white text-center text-[10px] font-black uppercase tracking-[0.3em] rounded-2xl group-hover:bg-blue-600 transition-all shadow-lg shadow-slate-200">Pesan Ruangan →</span>
                </div>
            </a>

            <a href="/booking/basket" class="room-card p-8 group filter-item fasilitas">
                <div>
                    <div class="icon-box bg-orange-50 text-orange-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold tracking-tight group-hover:text-orange-600 transition-colors">Lapangan Basket</h3>
                    <p class="text-xs text-slate-400 font-light mt-1 mb-4">Area Olahraga ITG</p>
                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest italic">Outdoor Facility</div>
                </div>
                <div class="mt-8 pt-6 border-t border-slate-50">
                    <span class="block w-full py-4 bg-slate-950 text-white text-center text-[10px] font-black uppercase tracking-[0.3em] rounded-2xl group-hover:bg-orange-600 transition-all">Pesan Sekarang →</span>
                </div>
            </a>

            <a href="/booking/aula-mhs" class="room-card p-8 group filter-item fasilitas">
                <div>
                    <div class="icon-box bg-purple-50 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold tracking-tight group-hover:text-purple-600 transition-colors">Aula Mahasiswa</h3>
                    <p class="text-xs text-slate-400 font-light mt-1 mb-4">Gedung Pusat Kegiatan</p>
                </div>
                <div class="mt-8 pt-6 border-t border-slate-50">
                    <span class="block w-full py-4 bg-slate-950 text-white text-center text-[10px] font-black uppercase tracking-[0.3em] rounded-2xl group-hover:bg-purple-600 transition-all">Pesan Sekarang →</span>
                </div>
            </a>

            <a href="/booking/multimedia" class="room-card p-8 border-l-4 border-l-blue-600 group filter-item gedung">
                <div>
                    <div class="icon-box bg-slate-50 text-slate-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold tracking-tight group-hover:text-blue-600 transition-colors">Aula Multimedia</h3>
                    <p class="text-xs text-slate-400 font-light mt-1 mb-4">Gedung Akademik</p>
                    <p class="text-[9px] font-bold text-blue-600 uppercase">Premium AV System</p>
                </div>
                <div class="mt-8 pt-6 border-t border-slate-50">
                    <span class="block w-full py-4 bg-slate-950 text-white text-center text-[10px] font-black uppercase tracking-[0.3em] rounded-2xl group-hover:bg-blue-600 transition-all">Pesan Sekarang →</span>
                </div>
            </a>

            <a href="/booking/gedung-f" class="room-card p-8 group filter-item gedung">
                <div>
                    <span class="text-[9px] font-black text-blue-600 uppercase tracking-widest">Gedung F</span>
                    <h3 class="text-xl font-extrabold tracking-tight mt-2 group-hover:text-blue-600 transition-colors">Lantai 2</h3>
                    <p class="text-xs text-slate-500 font-medium mt-4">Tersedia Ruang:</p>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <span class="px-3 py-1 bg-slate-100 text-[10px] font-bold rounded-lg">A1</span>
                        <span class="px-3 py-1 bg-slate-100 text-[10px] font-bold rounded-lg">A2</span>
                        <span class="px-3 py-1 bg-slate-100 text-[10px] font-bold rounded-lg">A3</span>
                    </div>
                </div>
                <div class="mt-8 pt-6">
                    <span class="block w-full py-4 bg-slate-950 text-white text-center text-[10px] font-black uppercase tracking-[0.3em] rounded-2xl group-hover:bg-blue-600 transition-all">Pilih Ruang →</span>
                </div>
            </a>

            <a href="/booking/parking" class="room-card p-8 lg:col-span-3 group filter-item fasilitas">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
                    <div>
                        <span class="px-4 py-1.5 bg-amber-50 text-amber-600 text-[8px] font-black uppercase rounded-full tracking-widest">Parking Management</span>
                        <h3 class="text-2xl font-extrabold tracking-tight mt-4 group-hover:text-amber-600 transition-colors">Fasilitas Perparkiran</h3>
                        <p class="text-slate-400 text-sm mt-1">Area parkir terpadu Kampus ITG</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 flex-1">
                        <div class="p-4 border border-slate-100 rounded-2xl group-hover:bg-slate-50 transition-colors">
                            <p class="text-[10px] font-black text-slate-900 uppercase">Gedung A</p>
                            <p class="text-[9px] text-slate-400 mt-1">Lantai 1 & 2</p>
                        </div>
                        <div class="p-4 border border-slate-100 rounded-2xl group-hover:bg-slate-50 transition-colors">
                            <p class="text-[10px] font-black text-slate-900 uppercase">Parkir B</p>
                            <p class="text-[9px] text-slate-400 mt-1">Lantai 1 & 2</p>
                        </div>
                        <div class="p-4 border border-slate-100 rounded-2xl group-hover:bg-slate-50 transition-colors">
                            <p class="text-[10px] font-black text-slate-900 uppercase">Area Depan</p>
                            <p class="text-[9px] text-slate-400 mt-1">Main Entrance</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8 pt-6 border-t border-slate-50">
                    <span class="block w-full py-4 bg-slate-950 text-white text-center text-[10px] font-black uppercase tracking-[0.3em] rounded-2xl group-hover:bg-amber-600 transition-all">Pesan Parkir Sekarang →</span>
                </div>
            </a>

        </div>
    </div>

    <script>
        function filterSelection(category, btn) {
            const items = document.getElementsByClassName('filter-item');
            const buttons = document.getElementsByClassName('filter-btn');
            
            for (let i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove('active', 'bg-slate-950', 'text-white');
                buttons[i].classList.add('text-slate-400');
            }
            btn.classList.add('active', 'bg-slate-950', 'text-white');
            btn.classList.remove('text-slate-400');

            for (let i = 0; i < items.length; i++) {
                if (category === 'all') {
                    items[i].classList.remove('hidden-card');
                } else {
                    if (items[i].classList.contains(category)) {
                        items[i].classList.remove('hidden-card');
                    } else {
                        items[i].classList.add('hidden-card');
                    }
                }
            }
        }
    </script>
</body>
</html>