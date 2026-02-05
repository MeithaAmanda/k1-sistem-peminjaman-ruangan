<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Portal | RoomEase ITG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #ffffff;
            color: #0f172a;
            overflow: hidden;
        }

        /* Ambient Background */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            z-index: -1;
            opacity: 0.4;
            animation: pulse 10s infinite ease-in-out;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1) translate(0, 0); }
            50% { transform: scale(1.1) translate(20px, -20px); }
        }

        /* Premium Input Styling */
        .premium-input {
            background: rgba(248, 250, 252, 0.8);
            border: 1px solid rgba(15, 23, 42, 0.05);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            letter-spacing: 0.02em;
        }

        .premium-input:focus {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 10px 30px -10px rgba(37, 99, 235, 0.15);
            outline: none;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px) saturate(160%);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .btn-premium {
            background: #0f172a;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-premium:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -10px rgba(37, 99, 235, 0.3);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6">

    <div class="orb w-[500px] h-[500px] bg-blue-50 -top-20 -left-20"></div>
    <div class="orb w-[400px] h-[400px] bg-indigo-50 -bottom-20 -right-20"></div>

    <div class="w-full max-w-[1100px] grid grid-cols-1 lg:grid-cols-2 glass-card rounded-[3rem] shadow-2xl overflow-hidden relative z-10">
        
        <div class="hidden lg:flex flex-col justify-between p-16 bg-slate-950 text-white relative overflow-hidden">
            <div class="relative z-10">
                <img src="https://itg.ac.id/wp-content/uploads/2021/08/logo-itg.png" class="h-10 brightness-200 mb-20 opacity-80">
                <h2 class="text-5xl font-extrabold leading-tight tracking-tighter mb-6 italic">
                    Reserve Your <br><span class="text-blue-500">Excellence.</span>
                </h2>
                <p class="text-slate-400 font-light leading-relaxed max-w-xs">
                    Masuk ke ekosistem RoomEase untuk manajemen ruang rapat, aula, dan laboratorium ITG secara cerdas.
                </p>
            </div>
            
            <div class="relative z-10">
                <p class="text-[10px] font-black uppercase tracking-[0.4em] text-slate-500">Official Infrastructure System v1.0</p>
            </div>

            <div class="absolute top-0 right-0 w-full h-full opacity-20 pointer-events-none">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[150%] h-[150%] border-[1px] border-white/10 rounded-full"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[100%] h-[100%] border-[1px] border-white/5 rounded-full"></div>
            </div>
        </div>

        <div class="p-10 md:p-16 lg:p-20 bg-white/50">
            <div class="max-w-md mx-auto">
                <div class="flex gap-8 mb-12 border-b border-slate-100">
                    <a href="{{ route('login') }}" class="pb-4 text-xs font-black uppercase tracking-[0.2em] border-b-2 border-slate-900">Portal Masuk</a>
                    <a href="{{ route('register') }}" class="pb-4 text-xs font-black uppercase tracking-[0.2em] text-slate-300 hover:text-slate-900 transition-colors">Pendaftaran</a>
                </div>

                <div class="mb-10">
                    <h3 class="text-3xl font-extrabold tracking-tighter mb-2">Selamat Datang.</h3>
                    <p class="text-slate-400 text-sm font-light">Gunakan akun ITG Anda untuk mengakses layanan.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 ml-1">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@itg.ac.id" class="w-full premium-input px-6 py-4 rounded-2xl text-sm font-medium">
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Kata Sandi</label>
                            <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-blue-600 uppercase tracking-tighter">Lupa Sandi?</a>
                        </div>
                        <input type="password" name="password" required placeholder="••••••••" class="w-full premium-input px-6 py-4 rounded-2xl text-sm font-medium">
                    </div>

                    <div class="flex items-center gap-3 py-2">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-slate-200 text-blue-600 focus:ring-blue-500">
                        <label for="remember" class="text-xs text-slate-500 font-medium">Biarkan saya tetap masuk</label>
                    </div>

                    <button type="submit" class="w-full btn-premium py-5 rounded-2xl text-white text-[10px] font-black uppercase tracking-[0.3em] mt-4">
                        Akses Akun →
                    </button>
                </form>

                <div class="mt-12 text-center">
                    <p class="text-xs text-slate-400 font-light">
                        Belum memiliki akses? 
                        <a href="{{ route('register') }}" class="text-slate-900 font-bold hover:text-blue-600 transition-colors">Minta Akun Baru</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed top-0 left-0 w-full h-full pointer-events-none -z-20 opacity-40">
        <div class="absolute top-[10%] left-[10%] w-px h-20 bg-gradient-to-b from-blue-500 to-transparent"></div>
        <div class="absolute bottom-[10%] right-[10%] w-px h-20 bg-gradient-to-t from-blue-500 to-transparent"></div>
    </div>

</body>
</html>