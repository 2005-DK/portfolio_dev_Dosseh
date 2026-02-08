<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Dosseh Portfolio</title>
    <meta name="description" content="{{ $project->description }}">
    <meta property="og:title" content="{{ $project->title }}">
    <meta property="og:description" content="{{ $project->description }}">
    @if($project->image)
        <meta property="og:image" content="{{ asset('storage/' . $project->image) }}">
    @endif
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Poppins', 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #f8fafc;
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .gradient-text {
            background: linear-gradient(135deg, #7c3aed, #06b6d4, #ec4899);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Navigation -->
    <nav class="glass-card border-b border-gray-800 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold gradient-text">Dosseh</a>
            <a href="/#projects" class="text-gray-300 hover:text-white transition">
                <i class="fas fa-arrow-left mr-2"></i>Back to Portfolio
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="glass-card rounded-2xl overflow-hidden">
            @if($project->image)
                <div class="w-full h-96 overflow-hidden">
                    <img src="{{ asset('storage/' . $project->image) }}" 
                         alt="{{ $project->title }}" 
                         class="w-full h-full object-cover">
                </div>
            @else
                <div class="w-full h-96 bg-gradient-to-r from-primary/20 to-secondary/20 flex items-center justify-center">
                    <i class="fas fa-code text-6xl text-gray-600"></i>
                </div>
            @endif

            <div class="p-8 md:p-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $project->title }}</h1>
                
                <p class="text-xl text-gray-300 mb-8">{{ $project->description }}</p>

                <!-- Technologies -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4">Technologies Utilisées</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(json_decode($project->technologies, true) as $tech)
                            <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Links -->
                <div class="flex gap-4 pt-8 border-t border-gray-700">
                    @if($project->url)
                        <a href="{{ $project->url }}" 
                           target="_blank"
                           class="px-6 py-3 bg-primary hover:bg-primary/90 text-white font-semibold rounded-lg transition">
                            <i class="fas fa-external-link-alt mr-2"></i>Voir le Projet
                        </a>
                    @endif
                    
                    @if($project->github_url)
                        <a href="{{ $project->github_url }}" 
                           target="_blank"
                           class="px-6 py-3 border border-gray-700 hover:border-primary text-gray-300 hover:text-white font-semibold rounded-lg transition">
                            <i class="fab fa-github mr-2"></i>Code Source
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Détails Complémentaires -->
        <div class="mt-12 grid md:grid-cols-2 gap-8">
            <div class="glass-card p-8 rounded-2xl">
                <h2 class="text-2xl font-bold mb-6">À Propos du Projet</h2>
                <div class="space-y-4 text-gray-300">
                    <div>
                        <h4 class="font-semibold text-white mb-2">Contexte</h4>
                        <p>Ce projet démontre ma capacité à développer des applications complètes en full-stack, avec une attention particulière à l'architecture et à la sécurité.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-2">Caractéristiques Clés</h4>
                        <ul class="list-disc list-inside space-y-1 ml-2">
                            <li>Architecture scalable et maintenable</li>
                            <li>APIs sécurisées et bien documentées</li>
                            <li>Interface utilisateur intuitive et responsive</li>
                            <li>Validation et gestion des erreurs robuste</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="glass-card p-8 rounded-2xl">
                <h2 class="text-2xl font-bold mb-6">Stack Technique</h2>
                <div class="space-y-4">
                    <div>
                        <h4 class="font-semibold text-white mb-2">Frontend</h4>
                        <p class="text-gray-300">HTML5, CSS3, Tailwind CSS, JavaScript, React/Vue</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-2">Backend</h4>
                        <p class="text-gray-300">Laravel, PHP, REST APIs</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-2">Base de Données</h4>
                        <p class="text-gray-300">MySQL, PostgreSQL</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-2">Déploiement</h4>
                        <p class="text-gray-300">Docker, AWS, GitHub Pages</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projets Relatifs -->
        @if($relatedProjects->count() > 0)
            <div class="mt-12">
                <h2 class="text-3xl font-bold mb-8">Autres Projets</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedProjects as $related)
                        <a href="{{ route('projects.show', $related->slug) }}" class="glass-card rounded-2xl overflow-hidden hover:border-primary transition group">
                            <div class="h-40 overflow-hidden bg-gradient-to-r from-primary/10 to-secondary/10">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" 
                                         alt="{{ $related->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-code text-3xl text-gray-600"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition">{{ $related->title }}</h3>
                                <p class="text-gray-400 text-sm mb-4">{{ Str::limit($related->description, 100) }}</p>
                                <span class="text-primary text-sm font-semibold">Voir plus →</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- CTA -->
        <div class="mt-12 text-center">
            <div class="glass-card p-12 rounded-2xl">
                <h2 class="text-3xl font-bold mb-4">Envie de Collaborer?</h2>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto">
                    J'aime relever de nouveaux défis et développer des solutions innovantes. 
                    N'hésitez pas à me contacter pour discuter de votre projet.
                </p>
                <a href="/#contact" class="inline-block px-8 py-3 bg-primary hover:bg-primary/90 text-white font-semibold rounded-lg transition">
                    <i class="fas fa-envelope mr-2"></i>Me Contacter
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="border-t border-gray-800 mt-16 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500">
            <p>&copy; 2025 Dosseh. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
