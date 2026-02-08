<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Dosseh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        .hover-lift:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }
        .gradient-text {
            background: linear-gradient(135deg, #7c3aed, #06b6d4, #ec4899);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradientShift 8s ease infinite;
        }
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="glass-card sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold gradient-text">Dosseh</a>
            <a href="/#contact" class="px-6 py-2 bg-primary hover:bg-primary/90 text-white rounded-lg transition">
                <i class="fas fa-envelope mr-2"></i> Contact
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-5xl font-bold mb-6">Blog & Articles</h1>
            <p class="text-xl text-gray-300 mb-8">
                Explorez mes articles techniques sur le développement web, les meilleures pratiques et les dernières tendances.
            </p>
            <div class="flex justify-center gap-4 flex-wrap">
                <button onclick="filterByCategory('all')" class="px-4 py-2 bg-primary text-white rounded-full hover:bg-primary/90 transition">
                    Tous
                </button>
                <button onclick="filterByCategory('laravel')" class="px-4 py-2 bg-gray-700 text-white rounded-full hover:bg-gray-600 transition">
                    Laravel
                </button>
                <button onclick="filterByCategory('frontend')" class="px-4 py-2 bg-gray-700 text-white rounded-full hover:bg-gray-600 transition">
                    Frontend
                </button>
            </div>
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($posts->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <a href="/blog/{{ $post->slug }}" class="glass-card rounded-lg overflow-hidden hover-lift transition group">
                        @if($post->image)
                            <div class="h-48 overflow-hidden">
                                <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            </div>
                        @else
                            <div class="h-48 bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                                <i class="fas fa-file-alt text-4xl text-gray-600"></i>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="px-3 py-1 bg-primary/20 text-primary text-xs rounded-full font-semibold">
                                    {{ $post->category ?? 'General' }}
                                </span>
                                <span class="text-gray-500 text-xs">
                                    {{ $post->published_at->format('d M Y') }}
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-bold mb-3 group-hover:text-primary transition">
                                {{ $post->title }}
                            </h3>
                            
                            <p class="text-gray-400 mb-4 line-clamp-2">
                                {{ $post->excerpt }}
                            </p>
                            
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>{{ ceil(str_word_count($post->content) / 200) }} min lecture</span>
                                <span><i class="fas fa-eye mr-1"></i>{{ $post->views }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <div class="text-center py-20">
                <i class="fas fa-inbox text-5xl text-gray-600 mb-4"></i>
                <p class="text-gray-400 text-lg">Aucun article pour le moment</p>
            </div>
        @endif
    </section>

    <!-- Footer -->
    <footer class="border-t border-gray-800 mt-16 py-8 glass-card">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400">
            <p>&copy; 2025 Dosseh. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function filterByCategory(category) {
            // Optionnel: Ajouter filtrage côté client ou serveur
            console.log('Filter by:', category);
        }
    </script>
</body>
</html>
