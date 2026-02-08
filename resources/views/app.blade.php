<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosseh - Full Stack Developer | Laravel & React Specialist</title>
    <meta name="description" content="Professional Full Stack Developer specializing in Laravel, React, and scalable web applications. Building secure, high-performance solutions for businesses.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts - Améliorées -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@300;400;500&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7c3aed',
                        secondary: '#06b6d4',
                        accent: '#ec4899',
                        dark: '#0f172a',
                        light: '#f8fafc'
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                        'inter': ['Inter', 'sans-serif'],
                        'montserrat': ['Montserrat', 'sans-serif'],
                        'jetbrains': ['JetBrains Mono', 'monospace']
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'slide-in-right': 'slideInRight 0.8s ease-out',
                        'gradient-shift': 'gradientShift 8s ease infinite',
                        'spin-slow': 'spin 20s linear infinite'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        slideInRight: {
                            '0%': { transform: 'translateX(30px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        gradientShift: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' }
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #f8fafc;
            overflow-x: hidden;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #1e293b;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #7c3aed, #06b6d4);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #6d28d9, #0891b2);
        }

        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #7c3aed, #06b6d4, #ec4899);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradientShift 8s ease infinite;
        }

        /* Glass Effect */
        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .glass-nav {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(124, 58, 237, 0.2);
        }

        /* Navigation Highlight */
        .nav-highlight {
            position: relative;
        }

        .nav-highlight::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #7c3aed, #06b6d4);
            transition: width 0.3s ease;
        }

        .nav-highlight:hover::after {
            width: 100%;
        }

        /* Progress Bars */
        .progress-bar {
            position: relative;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Section Spacing */
        .section-padding {
            padding: 6rem 1.5rem;
        }

        @media (min-width: 768px) {
            .section-padding {
                padding: 8rem 2rem;
            }
        }

        @media (min-width: 1024px) {
            .section-padding {
                padding: 10rem 3rem;
            }
        }

        /* Grid Layouts */
        .grid-auto-fit {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, #7c3aed, #06b6d4);
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
            z-index: -1;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.3);
        }

        /* Hover Effects */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        /* Typography avec Google Fonts */
        .heading-xl {
            font-size: 3.5rem;
            font-weight: 900;
            line-height: 1.1;
            font-family: 'Poppins', sans-serif;
        }

        .heading-lg {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            font-family: 'Poppins', sans-serif;
        }

        .heading-md {
            font-size: 1.875rem;
            font-weight: 700;
            line-height: 1.3;
            font-family: 'Poppins', sans-serif;
        }

        .text-body {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
        }

        .text-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        @media (min-width: 768px) {
            .heading-xl {
                font-size: 4.5rem;
            }
            
            .heading-lg {
                font-size: 3rem;
            }
            
            .heading-md {
                font-size: 2.25rem;
            }
        }

        /* Utility Classes */
        .text-balance {
            text-wrap: balance;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Profile Image Container */
        .profile-image-container {
            position: relative;
            width: 100%;
            max-width: 380px;
            margin: 0 auto;
        }

        .profile-image-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 1/1;
            border-radius: 50%;
            overflow: hidden;
            padding: 6px;
            background: linear-gradient(135deg, #7c3aed, #06b6d4, #ec4899);
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .profile-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            transition: transform 0.7s ease;
            border: 4px solid #0f172a;
        }

        .profile-image:hover {
            transform: scale(1.05);
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            z-index: 10;
            background: rgba(30, 41, 59, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 12px 16px;
            border-radius: 16px;
            min-width: 150px;
        }

        .floating-element.react {
            top: 10%;
            right: 5%;
        }

        .floating-element.laravel {
            bottom: 15%;
            left: 5%;
        }

        .floating-element.database {
            top: 50%;
            right: 0;
            transform: translateY(-50%);
        }

        /* Loading Spinner */
        .loading-spinner {
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 3px solid rgba(124, 58, 237, 0.3);
            border-radius: 50%;
            border-top-color: #7c3aed;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="font-poppins">
    <!-- Navigation -->
    <nav class="glass-nav fixed w-full z-50 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                        <span class="text-white font-bold text-lg">D</span>
                    </div>
                    <span class="text-xl font-bold gradient-text">Dosseh</span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="nav-highlight text-gray-300 hover:text-white font-medium transition">Home</a>
                    <a href="#about" class="nav-highlight text-gray-300 hover:text-white font-medium transition">About</a>
                    <a href="#skills" class="nav-highlight text-gray-300 hover:text-white font-medium transition">Skills</a>
                    <a href="#projects" class="nav-highlight text-gray-300 hover:text-white font-medium transition">Projects</a>
                    <a href="#testimonials" class="nav-highlight text-gray-300 hover:text-white font-medium transition">Testimonials</a>
                    <a href="#resume" class="nav-highlight text-gray-300 hover:text-white font-medium transition">Resume</a>
                    <a href="#contact" class="nav-highlight text-gray-300 hover:text-white font-medium transition">Contact</a>
                    <a href="#contact" class="btn-primary">
                        <i class="fas fa-paper-plane mr-2"></i> Hire Me
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-300 hover:text-white">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden mt-4 space-y-4 bg-dark/95 backdrop-blur-md rounded-lg p-6 border border-gray-800 animate-slide-up">
                <a href="#home" class="block text-gray-300 hover:text-white font-medium py-2 border-b border-gray-800">Home</a>
                <a href="#about" class="block text-gray-300 hover:text-white font-medium py-2 border-b border-gray-800">About</a>
                <a href="#skills" class="block text-gray-300 hover:text-white font-medium py-2 border-b border-gray-800">Skills</a>
                <a href="#projects" class="block text-gray-300 hover:text-white font-medium py-2 border-b border-gray-800">Projects</a>
                <a href="#testimonials" class="block text-gray-300 hover:text-white font-medium py-2 border-b border-gray-800">Testimonials</a>
                <a href="#resume" class="block text-gray-300 hover:text-white font-medium py-2 border-b border-gray-800">Resume</a>
                <a href="#contact" class="block text-gray-300 hover:text-white font-medium py-2">Contact</a>
                <a href="#contact" class="btn-primary w-full text-center mt-4">
                    <i class="fas fa-paper-plane mr-2"></i> Hire Me
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center section-padding pt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="animate-slide-up">
                    <!-- Badge -->
                    <div class="inline-flex items-center space-x-2 bg-primary/10 text-primary px-4 py-2 rounded-full mb-8 border border-primary/20">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        <span class="text-sm font-medium">Open for opportunities</span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="heading-xl mb-6">
                        Full-Stack Web Developer
                        <br>
                        <span class="gradient-text">I build fast, secure, and scalable web applications.</span>
                    </h1>

                    <!-- Description -->
                    <p class="text-xl text-gray-300 mb-10 leading-relaxed max-w-2xl text-body">
                        I’m <span class="font-bold text-white">Dosseh</span>, a full-stack developer helping businesses and teams deliver
                        high-performance digital solutions using <span class="text-secondary font-semibold">Laravel</span>,
                        <span class="text-secondary font-semibold">React</span>, and modern best practices.
                    </p>

                    <!-- Tech Stack Badges -->
                    <div class="flex flex-wrap gap-3 mb-10">
                        <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300 hover:border-primary transition">
                            <i class="fab fa-laravel mr-2 text-primary"></i>Laravel
                        </span>
                        <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300 hover:border-secondary transition">
                            <i class="fab fa-react mr-2 text-secondary"></i>React
                        </span>
                        <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300 hover:border-accent transition">
                            <i class="fab fa-node-js mr-2 text-accent"></i>Node.js
                        </span>
                        <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300 hover:border-primary transition">
                            <i class="fas fa-database mr-2 text-primary"></i>PostgreSQL
                        </span>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-wrap gap-4">
                        <a href="#contact" class="btn-primary inline-flex items-center">
                            <i class="fas fa-paper-plane mr-3"></i> Hire Me
                        </a>
                        <a href="#projects" class="px-8 py-4 border-2 border-secondary text-secondary hover:bg-secondary/10 rounded-lg font-semibold transition inline-flex items-center">
                            <i class="fas fa-folder-open mr-3"></i> View Real Projects
                        </a>
                        <a href="#resume" class="px-8 py-4 border-2 border-primary text-primary hover:bg-primary/10 rounded-lg font-semibold transition inline-flex items-center">
                            <i class="fas fa-download mr-3"></i> Download CV
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-gray-800">
                        <div class="text-center">
                            <div class="text-3xl font-bold gradient-text mb-2">50+</div>
                            <p class="text-sm text-gray-400">Projects</p>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold gradient-text mb-2">5+</div>
                            <p class="text-sm text-gray-400">Years Exp</p>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold gradient-text mb-2">100%</div>
                            <p class="text-sm text-gray-400">Satisfaction</p>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Profile Image -->
                <div class="relative animate-slide-in-right">
                    <!-- Floating Elements Background -->
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-primary/20 rounded-full blur-xl"></div>
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-secondary/20 rounded-full blur-xl"></div>
                    
                    <!-- Main Profile Container -->
                    <div class="relative z-10 flex justify-center items-center">
                        <!-- Profile Image Container -->
                        <div class="profile-image-container">
                            <div class="profile-image-wrapper">
                                <img src="image/profile.jpg" 
                                     alt="Dosseh - Full Stack Developer"
                                     class="profile-image"
                                     onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 400 400\"%3E%3Cdefs%3E%3ClinearGradient id=\"grad\" x1=\"0%25\" y1=\"0%25\" x2=\"100%25\" y2=\"100%25\"%3E%3Cstop offset=\"0%25\" style=\"stop-color:%237c3aed;stop-opacity:1\" /%3E%3Cstop offset=\"50%25\" style=\"stop-color:%2306b6d4;stop-opacity:1\" /%3E%3Cstop offset=\"100%25\" style=\"stop-color:%23ec4899;stop-opacity:1\" /%3E%3C/linearGradient%3E%3C/defs%3E%3Ccircle cx=\"200\" cy=\"200\" r=\"196\" fill=\"url(%23grad)\"/%3E%3Ctext x=\"50%25\" y=\"52%25\" font-size=\"120\" fill=\"white\" text-anchor=\"middle\" dominant-baseline=\"middle\" font-family=\"Poppins\" font-weight=\"bold\"%3ED%3C/text%3E%3Ctext x=\"50%25\" y=\"65%25\" font-size=\"24\" fill=\"white\" text-anchor=\"middle\" font-family=\"Inter\"%3EFull Stack Dev%3C/text%3E%3C/svg%3E'">
                            </div>
                        </div>

                        <!-- Floating Tech Cards -->
                        <div class="floating-element react animate-float">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-primary/20 rounded-lg flex items-center justify-center">
                                    <i class="fab fa-react text-primary text-lg"></i>
                                </div>
                                <div>
                                    <p class="font-semibold">React</p>
                                    <p class="text-xs text-gray-400">Frontend</p>
                                </div>
                            </div>
                        </div>

                        <div class="floating-element laravel animate-float" style="animation-delay: 1s;">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-secondary/20 rounded-lg flex items-center justify-center">
                                    <i class="fab fa-laravel text-secondary text-lg"></i>
                                </div>
                                <div>
                                    <p class="font-semibold">Laravel</p>
                                    <p class="text-xs text-gray-400">Backend</p>
                                </div>
                            </div>
                        </div>

                        <div class="floating-element database animate-float" style="animation-delay: 2s;">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-accent/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-database text-accent text-lg"></i>
                                </div>
                                <div>
                                    <p class="font-semibold">Database</p>
                                    <p class="text-xs text-gray-400">Expert</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section-padding bg-dark/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="heading-lg gradient-text mb-6">Professional Journey</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto text-body">
                    With over 5 years of experience in full-stack development, I specialize in creating 
                    scalable solutions that drive business growth.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Left Column -->
                <div class="space-y-8">
                    <div class="glass-card p-8 rounded-2xl hover-lift">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-16 h-16 bg-primary/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-user-check text-primary text-2xl"></i>
                            </div>
                            <h3 class="heading-md">About Me</h3>
                        </div>
                        <p class="text-gray-300 mb-4 text-body">
                            I'm a passionate Full Stack Developer with expertise in modern web technologies. 
                            My approach combines technical excellence with business understanding to deliver 
                            solutions that make an impact.
                        </p>
                        <p class="text-gray-300 text-body">
                            I believe in clean code, best practices, and continuous learning to stay ahead 
                            in the ever-evolving tech landscape.
                        </p>
                    </div>

                    <div class="glass-card p-8 rounded-2xl hover-lift">
                        <h3 class="heading-md mb-6">Core Philosophy</h3>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-shield-alt text-secondary"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-2">Security First</h4>
                                    <p class="text-gray-400 text-sm text-body">
                                        Implementing robust security measures in every project.
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-tachometer-alt text-accent"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-2">Performance Driven</h4>
                                    <p class="text-gray-400 text-sm text-body">
                                        Optimized solutions for speed and efficiency.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-8">
                    <div class="glass-card p-8 rounded-2xl hover-lift">
                        <h3 class="heading-md mb-6">Expertise Areas</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 bg-dark/50 rounded-lg border border-gray-800">
                                <div class="text-primary mb-2">
                                    <i class="fas fa-server text-lg"></i>
                                </div>
                                <h4 class="font-semibold mb-1">Backend</h4>
                                <p class="text-gray-400 text-sm text-body">Laravel, Node.js, APIs</p>
                            </div>
                            <div class="p-4 bg-dark/50 rounded-lg border border-gray-800">
                                <div class="text-secondary mb-2">
                                    <i class="fas fa-code text-lg"></i>
                                </div>
                                <h4 class="font-semibold mb-1">Frontend</h4>
                                <p class="text-gray-400 text-sm text-body">React, Vue, TypeScript</p>
                            </div>
                            <div class="p-4 bg-dark/50 rounded-lg border border-gray-800">
                                <div class="text-accent mb-2">
                                    <i class="fas fa-database text-lg"></i>
                                </div>
                                <h4 class="font-semibold mb-1">Database</h4>
                                <p class="text-gray-400 text-sm text-body">MySQL, PostgreSQL, Redis</p>
                            </div>
                            <div class="p-4 bg-dark/50 rounded-lg border border-gray-800">
                                <div class="text-primary mb-2">
                                    <i class="fas fa-cloud text-lg"></i>
                                </div>
                                <h4 class="font-semibold mb-1">DevOps</h4>
                                <p class="text-gray-400 text-sm text-body">Docker, AWS, CI/CD</p>
                            </div>
                        </div>
                    </div>

                    <div class="glass-card p-8 rounded-2xl hover-lift">
                        <h3 class="heading-md mb-6">Certifications & Education</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-dark/30 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-primary/20 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-primary"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">Full Stack Development</h4>
                                        <p class="text-gray-400 text-sm text-body">Advanced Certification</p>
                                    </div>
                                </div>
                                <span class="text-sm text-gray-400">2023</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-dark/30 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-secondary/20 rounded-lg flex items-center justify-center">
                                        <i class="fab fa-aws text-secondary"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">AWS Certified</h4>
                                        <p class="text-gray-400 text-sm text-body">Cloud Solutions Architect</p>
                                    </div>
                                </div>
                                <span class="text-sm text-gray-400">2022</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="section-padding">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="heading-lg gradient-text mb-6">Technical Expertise</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto text-body">
                    Comprehensive skill set covering modern web development technologies and methodologies.
                </p>
            </div>

            <!-- Skills Grid -->
            <div class="grid lg:grid-cols-3 gap-8 mb-12">
                <!-- Frontend -->
                <div class="glass-card p-8 rounded-2xl hover-lift">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center">
                            <i class="fas fa-laptop-code text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Frontend</h3>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-medium text-body">React.js</span>
                                <span class="text-primary font-bold">95%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-primary to-secondary rounded-full" style="width: 95%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-medium text-body">TypeScript</span>
                                <span class="text-primary font-bold">90%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-primary to-secondary rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-medium text-body">Tailwind CSS</span>
                                <span class="text-primary font-bold">94%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-primary to-secondary rounded-full" style="width: 94%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Backend -->
                <div class="glass-card p-8 rounded-2xl hover-lift">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-14 h-14 bg-secondary/10 rounded-xl flex items-center justify-center">
                            <i class="fas fa-server text-secondary text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Backend</h3>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-medium text-body">Laravel</span>
                                <span class="text-secondary font-bold">97%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-secondary to-accent rounded-full" style="width: 97%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-medium text-body">Node.js</span>
                                <span class="text-secondary font-bold">92%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-secondary to-accent rounded-full" style="width: 92%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-medium text-body">REST APIs</span>
                                <span class="text-secondary font-bold">95%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-secondary to-accent rounded-full" style="width: 95%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tools & DevOps -->
                <div class="glass-card p-8 rounded-2xl hover-lift">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-14 h-14 bg-accent/10 rounded-xl flex items-center justify-center">
                            <i class="fas fa-tools text-accent text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Tools & DevOps</h3>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-medium text-body">Docker</span>
                                <span class="text-accent font-bold">88%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-accent to-primary rounded-full" style="width: 88%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-medium text-body">AWS</span>
                                <span class="text-accent font-bold">87%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-accent to-primary rounded-full" style="width: 87%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-medium text-body">Git & CI/CD</span>
                                <span class="text-accent font-bold">94%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-accent to-primary rounded-full" style="width: 94%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Skills -->
            <div class="glass-card p-8 rounded-2xl">
                <h3 class="heading-md mb-8 text-center">Additional Technologies</h3>
                <div class="flex flex-wrap justify-center gap-3">
                    <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300 hover:border-primary transition">
                        <i class="fab fa-vuejs mr-2 text-green-400"></i>Vue.js
                    </span>
                    <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300 hover:border-primary transition">
                        <i class="fab fa-python mr-2 text-yellow-400"></i>Python
                    </span>
                    <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300 hover:border-primary transition">
                        <i class="fas fa-database mr-2 text-blue-400"></i>MongoDB
                    </span>
                    <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300 hover:border-primary transition">
                        <i class="fab fa-php mr-2 text-indigo-400"></i>PHP
                    </span>
                    <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300 hover:border-primary transition">
                        <i class="fab fa-aws mr-2 text-orange-400"></i>AWS
                    </span>
                    <span class="px-4 py-2 bg-dark border border-gray-700 rounded-full text-sm font-medium text-gray-300 hover:border-primary transition">
                        <i class="fas fa-shield-alt mr-2 text-red-400"></i>Security
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section - CHARGÉ DYNAMIQUEMENT -->
    <section id="projects" class="section-padding bg-dark/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="heading-lg gradient-text mb-6">Featured Projects</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto text-body">
                    A showcase of my recent work, demonstrating technical expertise and problem-solving abilities.
                </p>
            </div>

            <div id="projects-container" class="grid lg:grid-cols-3 gap-8">
                <!-- Les projets seront chargés dynamiquement ici -->
                <div id="loading-projects" class="col-span-3 text-center py-12">
                    <div class="loading-spinner mx-auto mb-4"></div>
                    <p class="text-gray-400 text-body">Loading projects...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section - CHARGÉ DYNAMIQUEMENT -->
    <section id="testimonials" class="section-padding">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="heading-lg gradient-text mb-6">Client Testimonials</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto text-body">
                    What clients say about working with me and the results achieved.
                </p>
            </div>

            <div id="testimonials-container" class="grid md:grid-cols-3 gap-8">
                <!-- Témoignages ajoutés manuellement -->
                <div class="glass-card p-8 rounded-2xl hover-lift">
                    <div class="flex items-start space-x-4">
                            <img src="image/client1.jpg" alt="Client - Acme Corp" class="w-14 h-14 rounded-full object-cover flex-shrink-0"
                                onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Cdefs%3E%3ClinearGradient id=%22g%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22%3E%3Cstop offset=%220%25%22 style=%22stop-color:%237c3aed;stop-opacity:1%22 /%3E%3Cstop offset=%2250%25%22 style=%22stop-color:%2306b6d4;stop-opacity:1%22 /%3E%3Cstop offset=%22100%25%22 style=%22stop-color:%23ec4899;stop-opacity:1%22 /%3E%3C/linearGradient%3E%3C/defs%3E%3Ccircle cx=%22100%22 cy=%22100%22 r=%2296%22 fill=%22url(%23g)%22/%3E%3Ctext x=%2250%25%22 y=%2255%25%22 font-size=%2280%22 fill=%22white%22 text-anchor=%22middle%22 dominant-baseline=%22middle%22 font-family=%22Poppins%22 font-weight=%22bold%22%3EA%3C/text%3E%3Ctext x=%2250%25%22 y=%2268%25%22 font-size=%2210%22 fill=%22white%22 text-anchor=%22middle%22 font-family=%22Inter%22%3EAcme%20Corp%3C/text%3E%3C/svg%3E'">
                        <div>
                            <p class="text-gray-100 font-semibold">"Dosseh delivered an outstanding product — polished, on-time, and with great attention to performance."</p>
                            <p class="text-sm text-gray-400 mt-3">Alex Martin — CEO, Acme Corp</p>
                            <div class="mt-4 text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-8 rounded-2xl hover-lift">
                    <div class="flex items-start space-x-4">
                            <img src="image/client2.jpg" alt="Client - Bright Ideas" class="w-14 h-14 rounded-full object-cover flex-shrink-0"
                                onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Cdefs%3E%3ClinearGradient id=%22g2%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22%3E%3Cstop offset=%220%25%22 style=%22stop-color:%237c3aed;stop-opacity:1%22 /%3E%3Cstop offset=%2250%25%22 style=%22stop-color:%2306b6d4;stop-opacity:1%22 /%3E%3Cstop offset=%22100%25%22 style=%22stop-color:%23ec4899;stop-opacity:1%22 /%3E%3C/linearGradient%3E%3C/defs%3E%3Ccircle cx=%22100%22 cy=%22100%22 r=%2296%22 fill=%22url(%23g2)%22/%3E%3Ctext x=%2250%25%22 y=%2255%25%22 font-size=%2280%22 fill=%22white%22 text-anchor=%22middle%22 dominant-baseline=%22middle%22 font-family=%22Poppins%22 font-weight=%22bold%22%3ES%3C/text%3E%3Ctext x=%2250%25%22 y=%2268%25%22 font-size=%2210%22 fill=%22white%22 text-anchor=%22middle%22 font-family=%22Inter%22%3EBright%20Ideas%3C/text%3E%3C/svg%3E'">
                        <div>
                            <p class="text-gray-100 font-semibold">"Professional, communicative and technically excellent — our platform's speed improved dramatically."</p>
                            <p class="text-sm text-gray-400 mt-3">Sophie Dubois — Head of Product, Bright Ideas</p>
                            <div class="mt-4 text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-8 rounded-2xl hover-lift">
                    <div class="flex items-start space-x-4">
                            <img src="image/client3.jpg" alt="Client - Nova Labs" class="w-14 h-14 rounded-full object-cover flex-shrink-0"
                                onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 200 200%22%3E%3Cdefs%3E%3ClinearGradient id=%22g3%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22%3E%3Cstop offset=%220%25%22 style=%22stop-color:%237c3aed;stop-opacity:1%22 /%3E%3Cstop offset=%2250%25%22 style=%22stop-color:%2306b6d4;stop-opacity:1%22 /%3E%3Cstop offset=%22100%25%22 style=%22stop-color:%23ec4899;stop-opacity:1%22 /%3E%3C/linearGradient%3E%3C/defs%3E%3Ccircle cx=%22100%22 cy=%22100%22 r=%2296%22 fill=%22url(%23g3)%22/%3E%3Ctext x=%2250%25%22 y=%2255%25%22 font-size=%2280%22 fill=%22white%22 text-anchor=%22middle%22 dominant-baseline=%22middle%22 font-family=%22Poppins%22 font-weight=%22bold%22%3EN%3C/text%3E%3Ctext x=%2250%25%22 y=%2268%25%22 font-size=%2210%22 fill=%22white%22 text-anchor=%22middle%22 font-family=%22Inter%22%3ENova%20Labs%3C/text%3E%3C/svg%3E'">
                        <div>
                            <p class="text-gray-100 font-semibold">"Clear process, solid architecture decisions, and excellent follow-through — highly recommended."</p>
                            <p class="text-sm text-gray-400 mt-3">Daniel Okoro — CTO, Nova Labs</p>
                            <div class="mt-4 text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Resume/CV Section -->
    <section id="resume" class="section-padding bg-dark/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="heading-lg gradient-text mb-6">Resume & CV</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto text-body">
                    Download my complete resume or view my work experience and education details.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Resume Download Card -->
                <div class="glass-card p-8 rounded-2xl hover-lift">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-file-download text-primary text-3xl"></i>
                        </div>
                        <h3 class="heading-md mb-4">Download CV</h3>
                        <p class="text-gray-400 mb-8 text-body">
                            Get my complete professional resume with detailed work experience, education, and skills.
                        </p>
                        <div class="space-y-4">
                            <a href="cv/Dosseh_FullStack_Developer.pdf" 
                               download="Dosseh_FullStack_Developer.pdf"
                               class="btn-primary w-full inline-flex items-center justify-center">
                                <i class="fas fa-download mr-3"></i> Download CV (PDF)
                            </a>
                            <a href="cv/Dosseh_FullStack_Developer.docx" 
                               download="Dosseh_FullStack_Developer.docx"
                               class="w-full py-3 border-2 border-secondary text-secondary hover:bg-secondary/10 rounded-lg font-semibold transition inline-flex items-center justify-center">
                                <i class="fas fa-file-word mr-3"></i> Download CV (DOCX)
                            </a>
                        </div>
                        <p class="text-sm text-gray-500 mt-6">Last updated: January 2024</p>
                    </div>
                </div>

                <!-- Work Experience -->
                <div class="glass-card p-8 rounded-2xl">
                    <h3 class="heading-md mb-8">Work Experience</h3>
                    <div class="space-y-8">
                        <!-- Experience 1 -->
                        <div class="relative pl-8 border-l-2 border-primary">
                            <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-primary"></div>
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-lg">Senior Full Stack Developer</h4>
                                <span class="text-sm text-primary font-semibold bg-primary/10 px-3 py-1 rounded-full">2022 - Present</span>
                            </div>
                            <p class="text-secondary font-medium mb-2">TechSolutions Inc.</p>
                            <p class="text-gray-400 text-sm mb-4 text-body">
                                Leading development of enterprise web applications using Laravel and React. Improved application performance by 40%.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-dark text-xs rounded">Laravel</span>
                                <span class="px-2 py-1 bg-dark text-xs rounded">React</span>
                                <span class="px-2 py-1 bg-dark text-xs rounded">AWS</span>
                            </div>
                        </div>

                        <!-- Experience 2 -->
                        <div class="relative pl-8 border-l-2 border-secondary">
                            <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-secondary"></div>
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-lg">Full Stack Developer</h4>
                                <span class="text-sm text-secondary font-semibold bg-secondary/10 px-3 py-1 rounded-full">2020 - 2022</span>
                            </div>
                            <p class="text-secondary font-medium mb-2">Digital Agency Co.</p>
                            <p class="text-gray-400 text-sm mb-4 text-body">
                                Developed and maintained multiple client projects. Implemented REST APIs and responsive frontends.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-dark text-xs rounded">Vue.js</span>
                                <span class="px-2 py-1 bg-dark text-xs rounded">Node.js</span>
                                <span class="px-2 py-1 bg-dark text-xs rounded">MongoDB</span>
                            </div>
                        </div>
                    </div>

                    <!-- Education -->
                    <div class="mt-12">
                        <h4 class="font-bold text-lg mb-6">Education</h4>
                        <div class="flex items-center space-x-4 p-4 bg-dark/30 rounded-lg">
                            <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-graduation-cap text-accent"></i>
                            </div>
                            <div>
                                <h5 class="font-semibold">MSc in Computer Science</h5>
                                <p class="text-gray-400 text-sm text-body">University of Technology</p>
                                <p class="text-gray-500 text-xs">Graduated: 2020 | GPA: 3.8/4.0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-padding">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="heading-lg gradient-text mb-6">Let's Build Together</h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto text-body">
                    Ready to bring your vision to life? Get in touch for a consultation.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Info -->
                <div class="space-y-8">
                    <div class="glass-card p-8 rounded-2xl">
                        <h3 class="heading-md mb-8">Contact Information</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-phone text-primary"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold">Phone</h4>
                                    <a href="tel:+22897696970" class="text-gray-300 hover:text-primary transition">
                                        +228 97 69 69 70
                                    </a>
                                    <p class="text-sm text-gray-500 text-body">Togo 🇹🇬 / International</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-envelope text-secondary"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold">Email</h4>
                                    <a href="mailto:dossehapeti63@gmail.com" class="text-gray-300 hover:text-secondary transition">
                                        dossehapeti63@gmail.com
                                    </a>
                                    <p class="text-sm text-gray-500 text-body">Response within 24 hours</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                                    <i class="fab fa-upwork text-accent"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold">Upwork</h4>
                                    <a href="https://www.upwork.com/freelancers/~0114ea927d79ef4e29" 
                                       target="_blank"
                                       class="text-gray-300 hover:text-accent transition">
                                        View Profile
                                    </a>
                                    <p class="text-sm text-gray-500 text-body">Top Rated Developer</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <a href="https://wa.me/22897696970" 
                                   target="_blank"
                                   class="w-12 h-12 bg-green-400/10 rounded-lg flex items-center justify-center hover:bg-green-400/20 transition">
                                    <i class="fab fa-whatsapp text-green-400 text-lg"></i>
                                </a>
                                <div>
                                    <h4 class="font-semibold">WhatsApp</h4>
                                    <a href="https://wa.me/22897696970" 
                                       target="_blank"
                                       class="text-gray-300 hover:text-green-400 transition">
                                        Chat with me
                                    </a>
                                    <p class="text-sm text-gray-500 text-body">Quick responses</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Availability -->
                    <div class="glass-card p-8 rounded-2xl">
                        <h4 class="font-semibold mb-4">Current Availability</h4>
                        <div class="flex items-center space-x-2">
                            <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                            <span class="text-gray-300">Available for new projects</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-2 text-body">Typically responds within a few hours</p>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="glass-card p-8 rounded-2xl">
                    <h3 class="heading-md mb-8">Send a Message</h3>
                    
                    <!-- Success Message Alert -->
                    <div id="successAlert" class="hidden mb-6 p-4 bg-green-500/10 border border-green-500/30 rounded-lg flex items-start space-x-3">
                        <i class="fas fa-check-circle text-green-400 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <p class="text-green-300 font-semibold">Message sent successfully!</p>
                            <p class="text-green-200 text-sm">I'll get back to you within 24 hours.</p>
                        </div>
                    </div>

                    <!-- Error Message Alert -->
                    <div id="errorAlert" class="hidden mb-6 p-4 bg-red-500/10 border border-red-500/30 rounded-lg flex items-start space-x-3">
                        <i class="fas fa-exclamation-circle text-red-400 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <p class="text-red-300 font-semibold">Error sending message</p>
                            <p class="text-red-200 text-sm" id="errorMessage"></p>
                        </div>
                    </div>
                    
                    <form id="contactForm" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-gray-300 mb-2 font-medium text-body">Full Name</label>
                            <input type="text" 
                                   name="name" 
                                   required
                                   class="w-full px-4 py-3 bg-dark border border-gray-700 rounded-lg focus:border-primary focus:outline-none transition text-white"
                                   placeholder="Your name">
                        </div>

                        <div>
                            <label class="block text-gray-300 mb-2 font-medium text-body">Email Address</label>
                            <input type="email" 
                                   name="email" 
                                   required
                                   class="w-full px-4 py-3 bg-dark border border-gray-700 rounded-lg focus:border-primary focus:outline-none transition text-white"
                                   placeholder="your.email@example.com">
                        </div>

                        <div>
                            <label class="block text-gray-300 mb-2 font-medium text-body">Subject</label>
                            <input type="text" 
                                   name="subject" 
                                   required
                                   class="w-full px-4 py-3 bg-dark border border-gray-700 rounded-lg focus:border-primary focus:outline-none transition text-white"
                                   placeholder="What is this about?">
                        </div>

                        <div>
                            <label class="block text-gray-300 mb-2 font-medium text-body">Message</label>
                            <textarea name="message" 
                                      rows="5"
                                      required
                                      class="w-full px-4 py-3 bg-dark border border-gray-700 rounded-lg focus:border-primary focus:outline-none transition text-white resize-none"
                                      placeholder="Describe your project, timeline, and budget..."></textarea>
                        </div>

                        <button type="submit" 
                                id="submitBtn"
                                class="w-full btn-primary">
                            <i class="fas fa-paper-plane mr-2"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark border-t border-gray-800 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Footer -->
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div>
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                            <span class="text-white font-bold">D</span>
                        </div>
                        <span class="text-xl font-bold gradient-text">Dosseh</span>
                    </div>
                    <p class="text-gray-400 mb-6 text-body">
                        Full Stack Developer specializing in scalable web solutions with modern technologies.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://github.com" target="_blank" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-primary transition flex items-center justify-center text-gray-300 hover:text-white">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://linkedin.com" target="_blank" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-blue-600 transition flex items-center justify-center text-gray-300 hover:text-white">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-blue-400 transition flex items-center justify-center text-gray-300 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#home" class="text-gray-400 hover:text-primary transition text-body">Home</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-primary transition text-body">About</a></li>
                        <li><a href="#skills" class="text-gray-400 hover:text-primary transition text-body">Skills</a></li>
                        <li><a href="#projects" class="text-gray-400 hover:text-primary transition text-body">Projects</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-primary transition text-body">Testimonials</a></li>
                        <li><a href="#resume" class="text-gray-400 hover:text-primary transition text-body">Resume</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Services</h4>
                    <ul class="space-y-3">
                        <li class="text-gray-400 text-body">Web Development</li>
                        <li class="text-gray-400 text-body">API Integration</li>
                        <li class="text-gray-400 text-body">E-commerce Solutions</li>
                        <li class="text-gray-400 text-body">Technical Consultation</li>
                        <li class="text-gray-400 text-body">Performance Optimization</li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-bold mb-6">Get in Touch</h4>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-primary"></i>
                            <a href="tel:+22897696970" class="text-gray-400 hover:text-primary transition text-body">
                                +228 97 69 69 70
                            </a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-secondary"></i>
                            <a href="mailto:dossehapeti63@gmail.com" class="text-gray-400 hover:text-secondary transition text-body">
                                dossehapeti63@gmail.com
                            </a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fab fa-upwork text-accent"></i>
                            <a href="https://www.upwork.com/freelancers/~0114ea927d79ef4e29" 
                               target="_blank"
                               class="text-gray-400 hover:text-accent transition text-body">
                                Upwork Profile
                            </a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fab fa-whatsapp text-green-400"></i>
                            <a href="https://wa.me/22897696970" 
                               target="_blank"
                               class="text-gray-400 hover:text-green-400 transition text-body">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="pt-8 border-t border-gray-800">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-500 text-sm mb-4 md:mb-0 text-body">
                        &copy; <span id="current-year"></span> Dosseh. All rights reserved.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-500 hover:text-primary transition text-sm text-body">Privacy Policy</a>
                        <a href="#" class="text-gray-500 hover:text-primary transition text-sm text-body">Terms of Service</a>
                        <a href="#" class="text-gray-500 hover:text-primary transition text-sm text-body">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('animate-slide-up');
        });

        // Close mobile menu when clicking a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // Set current year in footer
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Form submission with email integration
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const submitBtn = document.getElementById('submitBtn');
                const successAlert = document.getElementById('successAlert');
                const errorAlert = document.getElementById('errorAlert');
                const errorMessage = document.getElementById('errorMessage');
                
                // Hide alerts
                successAlert.classList.add('hidden');
                errorAlert.classList.add('hidden');
                
                // Get form data
                const formData = new FormData(this);
                
                // Show loading state
                const originalText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner animate-spin mr-2"></i> Sending...';
                
                try {
                    // Send form to the contact endpoint
                    const response = await fetch('/contact', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json'
                        },
                        body: formData
                    });
                    
                    // Check if response is ok
                    const result = await response.json();
                    
                    if (result.success) {
                        // Show success message
                        successAlert.classList.remove('hidden');
                        
                        // Reset form
                        this.reset();
                        
                        // Scroll to success message
                        successAlert.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        
                        // Hide alert after 5 seconds
                        setTimeout(() => {
                            successAlert.classList.add('hidden');
                        }, 5000);
                    } else {
                        // Show error message
                        errorMessage.textContent = result.message || 'An error occurred while sending your message.';
                        errorAlert.classList.remove('hidden');
                        errorAlert.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                } catch (error) {
                    console.error('Error:', error);
                    errorMessage.textContent = error.message || 'Network error: Could not send message. Please try again.';

                    errorAlert.classList.remove('hidden');
                    errorAlert.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } finally {
                    // Restore button state
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            });
        }

        // Add scroll effect to navigation
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('glass-nav');
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('glass-nav');
                nav.classList.remove('shadow-lg');
            }
        });

        // Initialize animations on load
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });

        // Observe elements for animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-slide-up');
                }
            });
        }, observerOptions);

        // Observe all glass cards
        document.querySelectorAll('.glass-card').forEach(card => {
            observer.observe(card);
        });

        // Fonction pour charger les projets depuis l'API
        async function loadProjects() {
            try {
                // REMPLACEZ CETTE URL PAR VOTRE ENDPOINT API POUR LES PROJETS
                const apiUrl = '/api/projects'; // ou l'URL de votre API
                
                const response = await fetch(apiUrl);
                const projects = await response.json();
                
                const container = document.getElementById('projects-container');
                const loading = document.getElementById('loading-projects');
                
                if (loading) {
                    loading.remove();
                }
                
                if (projects.length === 0) {
                    container.innerHTML = `
                        <div class="col-span-3 text-center py-12">
                            <i class="fas fa-code text-4xl text-gray-600 mb-4"></i>
                            <p class="text-gray-400 text-body">No projects found</p>
                        </div>
                    `;
                    return;
                }
                
                // Générer les projets
                projects.forEach(project => {
                    const projectElement = createProjectElement(project);
                    container.appendChild(projectElement);
                });
                
                // Ajouter le projet CTA
                const ctaProject = createCTAProject();
                container.appendChild(ctaProject);
                
            } catch (error) {
                console.error('Error loading projects:', error);
                const container = document.getElementById('projects-container');
                const loading = document.getElementById('loading-projects');
                
                if (loading) {
                    loading.innerHTML = `
                        <div class="col-span-3 text-center py-12">
                            <i class="fas fa-exclamation-triangle text-4xl text-red-500 mb-4"></i>
                            <p class="text-gray-400 text-body">Failed to load projects</p>
                            <p class="text-sm text-gray-500 mt-2 text-body">Please try again later</p>
                        </div>
                    `;
                }
            }
        }

        // Fonction pour charger les témoignages depuis l'API
        async function loadTestimonials() {
            try {
                // REMPLACEZ CETTE URL PAR VOTRE ENDPOINT API POUR LES TÉMOIGNAGES
                const apiUrl = '/api/testimonials'; // ou l'URL de votre API
                
                const response = await fetch(apiUrl);
                const testimonials = await response.json();
                
                const container = document.getElementById('testimonials-container');
                const loading = document.getElementById('loading-testimonials');
                
                if (loading) {
                    loading.remove();
                }
                
                if (testimonials.length === 0) {
                    container.innerHTML = `
                        <div class="col-span-3 text-center py-12">
                            <i class="fas fa-comment text-4xl text-gray-600 mb-4"></i>
                            <p class="text-gray-400 text-body">No testimonials found</p>
                        </div>
                    `;
                    return;
                }
                
                // Générer les témoignages
                testimonials.forEach(testimonial => {
                    const testimonialElement = createTestimonialElement(testimonial);
                    container.appendChild(testimonialElement);
                });
                
            } catch (error) {
                console.error('Error loading testimonials:', error);
                const container = document.getElementById('testimonials-container');
                const loading = document.getElementById('loading-testimonials');
                
                if (loading) {
                    loading.innerHTML = `
                        <div class="col-span-3 text-center py-12">
                            <i class="fas fa-exclamation-triangle text-4xl text-red-500 mb-4"></i>
                            <p class="text-gray-400 text-body">Failed to load testimonials</p>
                            <p class="text-sm text-gray-500 mt-2 text-body">Please try again later</p>
                        </div>
                    `;
                }
            }
        }

        // Fonction pour créer un élément projet
        function createProjectElement(project) {
            const div = document.createElement('div');
            div.className = 'glass-card rounded-2xl overflow-hidden hover-lift group';
            
            // Déterminer les couleurs du gradient en fonction de la catégorie
            let gradientClass = 'from-primary/10 to-secondary/10';
            
            if (project.category?.toLowerCase().includes('dashboard')) {
                gradientClass = 'from-secondary/10 to-accent/10';
            } else if (project.category?.toLowerCase().includes('mobile')) {
                gradientClass = 'from-accent/10 to-primary/10';
            }
            
            div.innerHTML = `
                <div class="relative h-48 overflow-hidden bg-gradient-to-br ${gradientClass}">
                    ${project.image ? 
                        `<img src="${project.image}" 
                              alt="${project.title || 'Project'}"
                              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">` :
                        `<div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-code text-4xl text-gray-600"></i>
                        </div>`
                    }
                    ${project.category ? 
                        `<div class="absolute top-4 right-4 px-3 py-1 bg-dark/90 backdrop-blur-sm rounded-full text-xs font-semibold">
                            ${project.category}
                        </div>` : ''
                    }
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold mb-3 group-hover:text-primary transition">${project.title || 'Untitled Project'}</h3>
                    <p class="text-gray-400 mb-6 line-clamp-3 text-body">${project.description || 'No description available.'}</p>
                    
                    ${project.technologies && project.technologies.length > 0 ? `
                        <div class="flex flex-wrap gap-2 mb-6">
                            ${project.technologies.slice(0, 3).map(tech => 
                                `<span class="px-3 py-1 bg-dark text-xs rounded-full border border-gray-700 text-body">${tech}</span>`
                            ).join('')}
                        </div>
                    ` : ''}
                    
                    <div class="flex gap-3">
                        ${project.link ? `
                            <a href="${project.link}" 
                               target="_blank"
                               class="flex-1 py-3 bg-primary hover:bg-primary/90 text-white font-semibold rounded-lg transition text-center">
                                <i class="fas fa-external-link-alt mr-2"></i>Live Demo
                            </a>
                        ` : ''}
                        ${project.github_link ? `
                            <a href="${project.github_link}" 
                               target="_blank"
                               class="flex-1 py-3 border border-gray-700 hover:border-primary text-gray-300 hover:text-white font-semibold rounded-lg transition text-center">
                                <i class="fab fa-github mr-2"></i>Code
                            </a>
                        ` : ''}
                        ${!project.link && !project.github_link ? `
                            <div class="flex-1 py-3 text-center text-gray-500 text-sm text-body">
                                <i class="fas fa-lock mr-2"></i>Private Project
                            </div>
                        ` : ''}
                    </div>
                </div>
            `;
            
            return div;
        }

        // Fonction pour créer un élément témoignage
        function createTestimonialElement(testimonial) {
            const div = document.createElement('div');
            div.className = 'glass-card p-8 rounded-2xl hover-lift';
            
            // Générer les initiales
            const initials = testimonial.name
                .split(' ')
                .map(word => word[0])
                .join('')
                .toUpperCase()
                .slice(0, 2);
            
            div.innerHTML = `
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-primary to-secondary flex items-center justify-center text-white font-bold mr-4">
                        ${initials}
                    </div>
                    <div>
                        <h4 class="font-bold">${testimonial.name}</h4>
                        <p class="text-gray-400 text-sm text-body">${testimonial.position || ''}${testimonial.company ? `, ${testimonial.company}` : ''}</p>
                    </div>
                </div>
                <p class="text-gray-300 italic mb-6 text-body">"${testimonial.content}"</p>
                <div class="flex text-yellow-400">
                    ${Array.from({length: 5}, (_, i) => 
                        `<i class="fas fa-star${i < (testimonial.rating || 5) ? '' : testimonial.rating - i === 0.5 ? '-half-alt' : ''}"></i>`
                    ).join('')}
                </div>
            `;
            
            return div;
        }

        // Fonction pour créer le projet CTA
        function createCTAProject() {
            const div = document.createElement('div');
            div.className = 'glass-card rounded-2xl border-2 border-dashed border-gray-700 hover:border-primary transition flex flex-col items-center justify-center p-12 text-center group';
            div.innerHTML = `
                <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition">
                    <i class="fas fa-plus text-primary text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Your Project Here</h3>
                <p class="text-gray-400 mb-6 text-body">Have an idea? Let's build it together</p>
                <a href="#contact" class="btn-primary">
                    <i class="fas fa-rocket mr-2"></i>Start Project
                </a>
            `;
            return div;
        }

    </script>

    <!-- Portfolio API Integration Script -->
    <script src="{{ asset('js/portfolio-api.js') }}"></script>
</body>
</html>