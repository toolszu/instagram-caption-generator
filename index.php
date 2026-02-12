<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Instagram Caption Generator | Open Source</title>
    <meta name="description" content="Generate viral Instagram captions instantly with AI.">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: { dark: '#0B0F19', card: '#161B28', accent: '#6366F1' }
                    },
                    animation: { 'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite' }
                }
            }
        }
    </script>
</head>
<body class="bg-brand-dark text-slate-300 min-h-screen flex flex-col font-sans selection:bg-indigo-500/30">

    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-indigo-600/10 rounded-full blur-[120px]"></div>
    </div>

    <nav class="border-b border-white/5 backdrop-blur-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-white flex items-center gap-2">
                <i class="fas fa-robot text-indigo-400"></i> CaptionGen<span class="text-indigo-500">.ai</span>
            </a>
            <a href="https://github.com/akash-whc/instagram-caption-generator" target="_blank" class="text-sm bg-white/10 hover:bg-white/20 px-4 py-2 rounded-full transition border border-white/10">
                <i class="fab fa-github mr-2"></i> Star on GitHub
            </a>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-16 max-w-3xl text-center">
        
        <span class="inline-block py-1 px-3 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-xs font-semibold text-indigo-400 mb-6 uppercase tracking-wider">
            🚀 Powered by OpenAI & OpenRouter
        </span>
        
        <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 leading-tight tracking-tight">
            Generate <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Viral Captions</span>
        </h1>
        
        <p class="text-lg text-slate-400 mb-12 max-w-2xl mx-auto leading-relaxed">
            Stop staring at a blank screen. Let our AI write engaging, funny, and professional Instagram captions for you in seconds.
        </p>

        <div class="bg-brand-card/80 backdrop-blur-xl p-8 rounded-3xl border border-white/10 shadow-2xl shadow-indigo-500/10 text-left relative overflow-hidden group">
            
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition duration-500"></div>

            <div class="relative z-10 space-y-6">
                <div class="grid md:grid-cols-3 gap-5">
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Topic</label>
                        <input type="text" id="topic" placeholder="e.g., Sunset in Bali, Gym Motivation..." 
                            class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-inner">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Vibe</label>
                        <select id="tone" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500 transition cursor-pointer appearance-none">
                            <option value="Funny">🤪 Funny</option>
                            <option value="Professional">💼 Professional</option>
                            <option value="Inspiring">✨ Inspiring</option>
                            <option value="Sarcastic">😏 Sarcastic</option>
                        </select>
                    </div>
                </div>

                <button id="generateBtn" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-500/25 transform transition hover:-translate-y-0.5 active:scale-[0.98]">
                    <i class="fas fa-magic mr-2"></i> Generate Captions
                </button>
            </div>

            <div id="results" class="mt-8 pt-8 border-t border-white/10 hidden space-y-4">
                <div class="text-xs font-bold text-indigo-400 uppercase tracking-wider mb-2">AI Suggestions</div>
                <div id="output-container" class="grid gap-4"></div>
            </div>
        </div>

    </main>

    <footer class="py-8 text-center text-slate-600 text-sm">
        <p>&copy; 2026 Open Source Project. Licensed under MIT.</p>
    </footer>

    <script>
        document.getElementById('generateBtn').addEventListener('click', async () => {
            const btn = document.getElementById('generateBtn');
            const topic = document.getElementById('topic').value;
            
            if(!topic) return alert('Please enter a topic!');

            // UI Loading State
            btn.innerHTML = '<i class="fas fa-circle-notch fa-spin mr-2"></i> Knitting words...';
            btn.disabled = true;
            btn.classList.add('opacity-75');

            // Simulate API Call (Replace with real fetch in production)
            try {
                const response = await fetch('api/ai-generate.php', {
                    method: 'POST',
                    body: JSON.stringify({ topic: topic, tone: document.getElementById('tone').value })
                });
                const data = await response.json();
                
                // Render (Simplified)
                const container = document.getElementById('output-container');
                container.innerHTML = '';
                document.getElementById('results').classList.remove('hidden');

                if(data.captions) {
                    data.captions.forEach(cap => {
                        container.innerHTML += `
                            <div class="p-4 rounded-lg bg-white/5 border border-white/5 hover:border-indigo-500/50 transition group cursor-pointer relative">
                                <p class="text-slate-300 text-sm">${cap}</p>
                                <i class="fas fa-copy absolute top-3 right-3 text-slate-600 group-hover:text-white transition"></i>
                            </div>
                        `;
                    });
                }
            } catch (e) { alert('Error connecting to backend.'); }
            
            // Reset Button
            btn.innerHTML = '<i class="fas fa-magic mr-2"></i> Generate Captions';
            btn.disabled = false;
            btn.classList.remove('opacity-75');
        });
    </script>
</body>
</html>
