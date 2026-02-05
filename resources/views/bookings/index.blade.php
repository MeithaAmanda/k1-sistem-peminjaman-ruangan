<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Saya | RoomEase ITG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #0f172a; }
        .glass-header { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); border-bottom: 1px solid rgba(15, 23, 42, 0.05); }
        .schedule-card { background: white; border: 1px solid rgba(15, 23, 42, 0.05); transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
        .schedule-card:hover { transform: translateX(10px); border-color: #2563eb; box-shadow: 0 20px 40px -20px rgba(0,0,0,0.1); }
        
        /* Utility for filtering */
        .filter-btn.active { background-color: #0f172a; color: white; border-color: #0f172a; }
        .hidden-schedule { display: none; }
    </style>
</head>
<body class="bg-slate-50">

    <nav class="glass-header sticky top-0 z-50 px-8 py-4 flex justify-between items-center">
        <div class="flex items-center gap-4">
            <a href="/dashboard" class="text-slate-400 hover:text-slate-900 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h1 class="text-xs font-black uppercase tracking-[0.3em]">Jadwal Reservasi</h1>
        </div>
        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest italic">ITG Infrastructure</div>
    </nav>

    <main class="max-w-5xl mx-auto px-8 py-16">
        <div class="mb-16">
            <h2 class="text-5xl font-extrabold tracking-tighter mb-4 italic">My <span class="text-blue-600">Schedules.</span></h2>
            <p class="text-slate-400 font-light italic">Kelola dan pantau seluruh agenda penggunaan ruangan Anda.</p>
        </div>

        <div class="flex gap-6 mb-12 overflow-x-auto pb-4">
            <button onclick="filterSchedule('all', this)" class="filter-btn active px-8 py-3 bg-white text-slate-400 rounded-full text-[10px] font-black uppercase tracking-widest border border-slate-100 hover:bg-slate-50 transition-all">Semua</button>
            <button onclick="filterSchedule('upcoming', this)" class="filter-btn px-8 py-3 bg-white text-slate-400 rounded-full text-[10px] font-black uppercase tracking-widest border border-slate-100 hover:bg-slate-50 transition-all">Mendatang</button>
            <button onclick="filterSchedule('completed', this)" class="filter-btn px-8 py-3 bg-white text-slate-400 rounded-full text-[10px] font-black uppercase tracking-widest border border-slate-100 hover:bg-slate-50 transition-all">Selesai</button>
        </div>

        <div id="schedule-container" class="relative space-y-8">
            
            <div class="schedule-item upcoming relative pl-16">
                <div class="absolute left-0 top-0 w-12 h-12 bg-blue-600 rounded-2xl flex flex-col items-center justify-center text-white z-10 shadow-lg shadow-blue-200">
                    <span class="text-[9px] font-bold uppercase leading-none">Feb</span>
                    <span class="text-lg font-black tracking-tighter">05</span>
                </div>
                
                <div class="schedule-card p-8 rounded-[2.5rem] flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[9px] font-black uppercase tracking-widest rounded-full">Rapat Internal</span>
                            <span class="text-slate-300 text-xs">•</span>
                            <span class="text-slate-400 text-xs font-medium">14:00 - 16:00 WIB</span>
                        </div>
                        <h4 class="text-xl font-extrabold tracking-tight mb-2">Koordinasi BEM Institut Teknologi Garut</h4>
                        <p class="text-sm text-slate-400 font-light flex items-center gap-2 italic">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            Ruang Rapat Gedung A • Lantai 2
                        </p>
                    </div>
                    <div class="flex items-center gap-4">
                        <button class="px-6 py-3 bg-slate-50 text-slate-900 text-[9px] font-black uppercase tracking-widest rounded-xl hover:bg-red-50 hover:text-red-600 transition-all">Batalkan</button>
                        <button class="px-6 py-3 bg-blue-600 text-white text-[9px] font-black uppercase tracking-widest rounded-xl shadow-lg shadow-blue-100">Detail</button>
                    </div>
                </div>
            </div>

            <div class="schedule-item completed relative pl-16 opacity-60 hover:opacity-100 transition-opacity">
                <div class="absolute left-0 top-0 w-12 h-12 bg-slate-200 rounded-2xl flex flex-col items-center justify-center text-slate-500 z-10">
                    <span class="text-[9px] font-bold uppercase leading-none">Jan</span>
                    <span class="text-lg font-black tracking-tighter">28</span>
                </div>
                
                <div class="schedule-card p-8 rounded-[2.5rem] flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-3 py-1 bg-slate-100 text-slate-500 text-[9px] font-black uppercase tracking-widest rounded-full">Seminar</span>
                            <span class="text-slate-300 text-xs">•</span>
                            <span class="text-slate-400 text-xs font-medium">09:00 - 12:00 WIB</span>
                        </div>
                        <h4 class="text-xl font-extrabold tracking-tight mb-2">Workshop UI/UX Design Modern</h4>
                        <p class="text-sm text-slate-400 font-light flex items-center gap-2 italic">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Lab Komputer 3 • Gedung Informatika
                        </p>
                    </div>
                    <span class="text-[10px] font-black uppercase text-emerald-500 tracking-[0.2em]">Selesai ✓</span>
                </div>
            </div>

        </div>
    </main>

    <script>
        function filterSchedule(status, btn) {
            // Update button styles
            document.querySelectorAll('.filter-btn').forEach(b => {
                b.classList.remove('active', 'bg-slate-950', 'text-white');
                b.classList.add('bg-white', 'text-slate-400');
            });
            btn.classList.add('active', 'bg-slate-950', 'text-white');
            btn.classList.remove('bg-white', 'text-slate-400');

            // Filter items
            const items = document.querySelectorAll('.schedule-item');
            items.forEach(item => {
                if (status === 'all') {
                    item.style.display = 'block';
                } else if (item.classList.contains(status)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>