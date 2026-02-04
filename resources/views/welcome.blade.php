<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoomEase | Institut Teknologi Garut</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --accent: #2563eb;
            --slate-premium: #0f172a;
        }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #ffffff;
            color: var(--slate-premium);
            letter-spacing: -0.01em;
        }

        .glass-premium {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(25px) saturate(200%);
            -webkit-backdrop-filter: blur(25px) saturate(200%);
        }

        /* Hero Image Masking level Luxury */
        .hero-mask {
            mask-image: linear-gradient(to right, black 50%, transparent 100%), 
                        linear-gradient(to bottom, black 50%, transparent 100%);
            -webkit-mask-image: linear-gradient(to right, black 50%, transparent 100%), 
                                linear-gradient(to bottom, black 50%, transparent 100%);
            mask-composite: intersect;
            -webkit-mask-composite: source-in;
            opacity: 0.15;
            transition: all 1.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .hero-container:hover .hero-mask {
            opacity: 0.4;
            transform: scale(1.05) translateX(-20px);
            filter: grayscale(0%);
        }

        /* Floating Animation */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }

        /* Bento Grid Style */
        .bento-card {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.03);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .bento-card:hover {
            background: #fafafa;
            border-color: rgba(37, 99, 235, 0.1);
            transform: translateY(-8px);
            box-shadow: 0 50px 100px -20px rgba(15, 23, 42, 0.05);
        }

        .gradient-text {
            background: linear-gradient(135deg, #0f172a 30%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Orb Background Dekoratif */
        .orb-blur {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            z-index: -1;
            opacity: 0.3;
        }
    </style>
</head>
<body class="overflow-x-hidden selection:bg-blue-100 selection:text-blue-900">

    <div class="orb-blur w-[800px] h-[800px] bg-blue-50 top-[-20%] right-[-10%] animate-pulse"></div>
    <div class="orb-blur w-[600px] h-[600px] bg-indigo-50 bottom-[-10%] left-[-5%]"></div>

    <nav class="fixed w-full z-[100] glass-premium border-b border-slate-100/50">
        <div class="container mx-auto flex justify-between items-center py-6 px-8 md:px-16">
            <div class="flex items-center gap-6">
                <img src="https://itg.ac.id/wp-content/uploads/2021/08/logo-itg.png" alt="Logo ITG" class="h-10 grayscale brightness-50">
                <div class="w-[1px] h-6 bg-slate-200 hidden md:block"></div>
                <h1 class="text-sm font-extrabold tracking-[0.4em] uppercase text-slate-900">RoomEase<span class="font-light text-slate-400 italic">.v1</span></h1>
            </div>
            
            <div class="flex items-center gap-10">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-blue-600 transition-colors">Workspace</a>
                    @else
                        <a href="{{ route('login') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-slate-900 transition-colors">Member Access</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="relative group bg-slate-950 px-10 py-4 rounded-full overflow-hidden">
                                <span class="absolute inset-0 bg-blue-600 translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out"></span>
                                <span class="relative text-[10px] font-black uppercase tracking-[0.2em] text-white">Join Now</span>
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <header class="relative pt-64 pb-32 hero-container">
        <div class="container mx-auto px-8 md:px-16">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-24">
                <div class="lg:w-7/12 relative z-10">
                    <div class="flex items-center gap-4 mb-12 translate-y-[-20px] opacity-0 animate-[fadeIn_1s_ease-out_forwards]">
                        <span class="w-12 h-[1px] bg-blue-600"></span>
                        <span class="text-[10px] font-bold tracking-[0.5em] text-blue-600 uppercase">Elite Campus Resource Management</span>
                    </div>
                    
                    <h2 class="text-7xl md:text-9xl font-extrabold leading-[0.85] tracking-[-0.06em] text-slate-950 mb-12">
                        Seamless <br><span class="gradient-text">Experiences.</span>
                    </h2>
                    
                    <p class="text-slate-400 text-xl md:text-2xl font-light leading-relaxed max-w-2xl mb-16 tracking-wide">
                        Sistem reservasi terpadu untuk <span class="text-slate-900 font-medium">Rapat Eksekutif</span>, <span class="text-slate-900 font-medium">Konferensi</span>, dan <span class="text-slate-900 font-medium">Kegiatan Akademik</span> unggulan ITG.
                    </p>
                    
                    <div class="flex items-center gap-12">
                        <a href="{{ route('bookings.index') }}" class="text-xs font-black uppercase tracking-[0.3em] border-b-2 border-slate-900 pb-2 hover:border-blue-600 transition-all">
                            Explore Spaces
                        </a>
                        <p class="text-[10px] font-medium text-slate-300 uppercase tracking-widest">Available 24/7 Digital Access</p>
                    </div>
                </div>

                <div class="lg:w-5/12 relative">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.wX0IeUfdpPDubpWoxb30pwHaCd?rs=1&pid=ImgDetMain" 
                         class="hero-mask w-full h-[600px] object-cover grayscale">
                    
                    <div class="absolute top-1/2 left-0 -translate-x-12 translate-y-12 bg-white/40 backdrop-blur-3xl p-10 rounded-[3rem] border border-white/50 shadow-2xl animate-float">
                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                                <p class="text-[10px] font-bold tracking-widest uppercase text-slate-500">System Ready</p>
                            </div>
                            <h4 class="text-4xl font-extrabold text-slate-950 tracking-tighter italic">98%<span class="text-sm font-light text-slate-400 ml-2">Efficiency</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="container mx-auto px-8 md:px-16 py-40">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            
            <div class="md:col-span-8 bento-card p-16 rounded-[4rem] relative overflow-hidden group">
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mb-10 group-hover:bg-blue-600 transition-colors duration-500">
                            <svg class="w-8 h-8 text-slate-900 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h3 class="text-4xl font-extrabold mb-6 tracking-tighter italic">Grand Events & Seminar</h3>
                        <p class="text-slate-400 text-lg font-light max-w-md leading-relaxed">Pesan Aula Utama atau Auditorium untuk acara berskala besar dengan kapasitas ribuan peserta dan fasilitas VIP.</p>
                    </div>
                    <a href="{{ route('bookings.index') }}?type=event" class="mt-12 text-[10px] font-black uppercase tracking-[0.4em] text-blue-600">Request Access →</a>
                </div>
            </div>

            <div class="md:col-span-4 bento-card p-12 rounded-[4rem] group border-blue-50">
                <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center mb-8">
                    <svg class="w-6 h-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656 Re.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-extrabold mb-4 tracking-tight">Executive Rapat</h3>
                <p class="text-slate-400 text-sm font-light leading-relaxed">Ruang kedap suara dengan sistem Smart-TV dan konferensi video terintegrasi.</p>
            </div>

            <div class="md:col-span-12 bento-card p-12 rounded-[4rem] flex flex-col md:flex-row items-center justify-between gap-10">
                <div class="max-w-xl">
                    <h3 class="text-3xl font-extrabold mb-4 italic tracking-tight">Academic Space & Labs</h3>
                    <p class="text-slate-400 text-sm font-light leading-relaxed">Dukungan penuh untuk riset dan perkuliahan. Booking laboratorium komputer atau ruang kelas tambahan secara instan.</p>
                </div>
                <div class="flex gap-4">
                    <div class="h-16 w-16 bg-slate-100 rounded-full flex items-center justify-center text-slate-900 font-bold">Lab</div>
                    <div class="h-16 w-16 bg-slate-100 rounded-full flex items-center justify-center text-slate-900 font-bold">Edu</div>
                </div>
            </div>

        </div>
    </section>

    <footer class="bg-white pt-40 pb-20 border-t border-slate-50">
        <div class="container mx-auto px-16">
            <div class="flex flex-col md:flex-row justify-between items-start gap-20 mb-32">
                <div class="space-y-8">
                    <img src="https://itg.ac.id/wp-content/uploads/2021/08/logo-itg.png" class="h-10 grayscale opacity-40">
                    <p class="text-slate-300 text-xs font-light tracking-[0.3em] uppercase">Architecture of Academic Excellence.</p>
                </div>
                <div class="flex gap-24">
                    <div class="space-y-6">
                        <p class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-900">Inquiry</p>
                        <p class="text-slate-400 text-sm font-light">sarpras@itg.ac.id</p>
                    </div>
                    <div class="space-y-6">
                        <p class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-900">Legal</p>
                        <p class="text-slate-400 text-sm font-light">Privacy & Policy</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center gap-10">
                <p class="text-[9px] font-medium text-slate-200 uppercase tracking-[0.8em]">© 2026 RoomEase ITG. Masterpiece of Digital System.</p>
            </div>
        </div>
    </footer>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

</body>
</html>