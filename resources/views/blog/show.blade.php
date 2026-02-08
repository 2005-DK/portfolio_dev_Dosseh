<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Article - Dosseh</title>
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
        .prose-content {
            color: #e2e8f0;
            line-height: 1.8;
        }
        .prose-content h1, .prose-content h2, .prose-content h3 {
            color: #f1f5f9;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }
        .prose-content h1 {
            font-size: 2rem;
            font-weight: 700;
        }
        .prose-content h2 {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .prose-content p {
            margin-bottom: 1rem;
        }
        .prose-content ul, .prose-content ol {
            margin: 1rem 0 1rem 2rem;
        }
        .prose-content li {
            margin-bottom: 0.5rem;
        }
        .prose-content code {
            background: rgba(100, 100, 150, 0.3);
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            color: #86efac;
            font-family: monospace;
        }
        .prose-content pre {
            background: rgba(0, 0, 0, 0.5);
            padding: 1rem;
            border-radius: 0.5rem;
            overflow-x: auto;
            margin: 1rem 0;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="glass-card sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <a href="/" class="text-2xl font-bold gradient-text">Dosseh</a>
                <a href="/#contact" class="px-6 py-2 bg-primary hover:bg-primary/90 text-white rounded-lg transition">
                    <i class="fas fa-envelope mr-2"></i> Contact
                </a>
            </div>
        </nav>

        <!-- Article Content -->
        <article class="flex-1">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <!-- Header -->
                <div class="mb-12">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-3 py-1 bg-primary/20 text-primary rounded-full text-sm font-semibold">
                            <i class="fas fa-tag mr-2"></i>{{ $post->category }}
                        </span>
                        <span class="text-gray-400 text-sm">
                            <i class="fas fa-eye mr-2"></i>{{ $post->views }} vues
                        </span>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $post->title }}</h1>
                    
                    <div class="flex items-center gap-4 text-gray-400 text-sm">
                        <span>
                            <i class="fas fa-calendar mr-2"></i>
                            {{ $post->published_at->format('d M Y') }}
                        </span>
                        <span>
                            <i class="fas fa-clock mr-2"></i>
                            {{ ceil(str_word_count($post->content) / 200) }} min lecture
                        </span>
                    </div>
                </div>

                <!-- Featured Image -->
                @if($post->image)
                    <div class="mb-12 rounded-lg overflow-hidden">
                        <img src="/storage/{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
                    </div>
                @endif

                <!-- Excerpt -->
                <p class="text-xl text-gray-300 mb-12 italic border-l-4 border-primary pl-6">
                    {{ $post->excerpt }}
                </p>

                <!-- Content -->
                <div class="prose-content markdown-content mb-12">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <!-- Share Buttons -->
                <div class="glass-card p-8 rounded-lg mb-12">
                    <h3 class="font-bold mb-4">
                        <i class="fas fa-share-alt mr-2"></i> Partager cet article
                    </h3>
                    <div class="flex gap-4">
                        <a href="https://twitter.com/intent/tweet?url={{ request()->url() }}&text={{ urlencode($post->title) }}" 
                           target="_blank"
                           class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded-lg transition">
                            <i class="fab fa-twitter mr-2"></i> Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ request()->url() }}"
                           target="_blank"
                           class="px-4 py-2 bg-blue-700 hover:bg-blue-800 rounded-lg transition">
                            <i class="fab fa-linkedin mr-2"></i> LinkedIn
                        </a>
                        <button onclick="copyToClipboard('{{ request()->url() }}')"
                                class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition">
                            <i class="fas fa-link mr-2"></i> Copier lien
                        </button>
                    </div>
                </div>

                <!-- Author Info -->
                <div class="glass-card p-8 rounded-lg mb-12">
                    <div class="flex items-center gap-6">
                        <img src="https://ui-avatars.com/api/?name=Dosseh&size=100&background=7c3aed&color=fff" 
                             alt="Dosseh" 
                             class="w-20 h-20 rounded-full">
                        <div>
                            <h4 class="font-bold text-lg mb-1">Dosseh</h4>
                            <p class="text-gray-400 mb-3">Full Stack Developer | Laravel & React Specialist</p>
                            <a href="https://twitter.com" target="_blank" class="text-primary hover:text-primary/80">
                                <i class="fab fa-twitter mr-2"></i> @dosseh
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Related Articles (Optionnel) -->
                @if(isset($relatedPosts) && $relatedPosts->count() > 0)
                    <div>
                        <h3 class="text-2xl font-bold mb-8">Articles similaires</h3>
                        <div class="grid md:grid-cols-2 gap-8">
                            @foreach($relatedPosts as $related)
                                <a href="/blog/{{ $related->slug }}" class="glass-card p-6 rounded-lg hover-lift transition group">
                                    <h4 class="font-bold text-lg mb-2 group-hover:text-primary transition">
                                        {{ $related->title }}
                                    </h4>
                                    <p class="text-gray-400 text-sm mb-4">{{ $related->excerpt }}</p>
                                    <div class="flex justify-between items-center text-sm text-gray-500">
                                        <span>{{ $related->published_at->format('d M Y') }}</span>
                                        <span>{{ $related->views }} vues</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </article>

        <!-- Footer -->
        <footer class="border-t border-gray-800 mt-16 py-8 glass-card">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400">
                <p>&copy; 2025 Dosseh. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Lien copié!');
            });
        }
    </script>
</body>
</html>
