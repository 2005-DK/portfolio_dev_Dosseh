<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur admin
        User::firstOrCreate(
            ['email' => 'admin@portfolio.com'],
            [
                'name' => 'Admin Dosseh',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Créer des projets d'exemple
        Project::firstOrCreate(
            ['title' => 'E-Commerce Platform'],
            [
                'description' => 'A full-featured e-commerce platform built with Laravel and Vue.js. Features include product management, shopping cart, payment integration with Stripe, and admin dashboard for inventory management.',
                'technologies' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Stripe API', 'Docker']),
                'url' => 'https://ecommerce-example.com',
                'github_url' => 'https://github.com/dosseh/ecommerce-platform',
                'is_published' => true,
                'order' => 1,
            ]
        );

        Project::firstOrCreate(
            ['title' => 'Real-Time Chat Application'],
            [
                'description' => 'A modern real-time chat application using WebSockets. Built with Laravel Reverb for real-time communication, React for the frontend, and PostgreSQL for data persistence. Supports private messages, group chats, and file sharing.',
                'technologies' => json_encode(['Laravel', 'React', 'WebSockets', 'PostgreSQL', 'Redis']),
                'url' => 'https://chat-app-demo.com',
                'github_url' => 'https://github.com/dosseh/chat-app',
                'is_published' => true,
                'order' => 2,
            ]
        );

        Project::firstOrCreate(
            ['title' => 'API REST Dashboard'],
            [
                'description' => 'A comprehensive REST API for a multi-tenant SaaS dashboard. Includes authentication, role-based access control, data analytics, and webhook management. Built with Laravel and optimized for high performance.',
                'technologies' => json_encode(['Laravel', 'PostgreSQL', 'Redis', 'JWT', 'AWS S3']),
                'github_url' => 'https://github.com/dosseh/api-dashboard',
                'is_published' => true,
                'order' => 3,
            ]
        );

        // Créer des compétences d'exemple
        $skills = [
            // Frontend
            ['name' => 'React.js', 'category' => 'frontend', 'proficiency' => 95, 'icon' => 'fab fa-react'],
            ['name' => 'Vue.js', 'category' => 'frontend', 'proficiency' => 90, 'icon' => 'fab fa-vuejs'],
            ['name' => 'TypeScript', 'category' => 'frontend', 'proficiency' => 90, 'icon' => 'fab fa-js'],
            ['name' => 'Tailwind CSS', 'category' => 'frontend', 'proficiency' => 94, 'icon' => 'fab fa-css3'],
            
            // Backend
            ['name' => 'Laravel', 'category' => 'backend', 'proficiency' => 97, 'icon' => 'fab fa-laravel'],
            ['name' => 'Node.js', 'category' => 'backend', 'proficiency' => 92, 'icon' => 'fab fa-node-js'],
            ['name' => 'REST APIs', 'category' => 'backend', 'proficiency' => 95, 'icon' => 'fas fa-code'],
            ['name' => 'PHP', 'category' => 'backend', 'proficiency' => 96, 'icon' => 'fab fa-php'],
            
            // Tools & DevOps
            ['name' => 'Docker', 'category' => 'tools', 'proficiency' => 88, 'icon' => 'fab fa-docker'],
            ['name' => 'AWS', 'category' => 'tools', 'proficiency' => 87, 'icon' => 'fab fa-aws'],
            ['name' => 'Git & CI/CD', 'category' => 'tools', 'proficiency' => 94, 'icon' => 'fab fa-git'],
            ['name' => 'PostgreSQL', 'category' => 'tools', 'proficiency' => 90, 'icon' => 'fas fa-database'],
        ];

        foreach ($skills as $skill) {
            Skill::firstOrCreate(
                ['name' => $skill['name'], 'category' => $skill['category']],
                array_merge($skill, ['is_published' => true])
            );
        }

        // Créer des articles d'exemple
        Post::firstOrCreate(
            ['title' => 'Building Scalable REST APIs with Laravel'],
            [
                'slug' => 'building-scalable-rest-apis-with-laravel',
                'excerpt' => 'Learn best practices for designing and implementing scalable REST APIs using Laravel, including pagination, caching, and rate limiting.',
                'content' => '# Building Scalable REST APIs with Laravel

## Introduction
REST APIs are the backbone of modern web applications. In this guide, we\'ll explore best practices for building scalable APIs with Laravel.

## Key Concepts
1. **Pagination** - Handle large datasets efficiently
2. **Caching** - Reduce database queries
3. **Rate Limiting** - Protect your API from abuse
4. **Authentication** - Secure your endpoints

## Implementation
Laravel provides excellent tools for all these requirements...

## Conclusion
With proper architecture and optimization, you can build APIs that handle millions of requests.',
                'category' => 'Laravel',
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        Post::firstOrCreate(
            ['title' => 'Real-Time Applications with WebSockets'],
            [
                'slug' => 'real-time-applications-with-websockets',
                'excerpt' => 'Explore how to build real-time applications using WebSockets, covering Laravel Reverb, client implementation, and production deployment.',
                'content' => '# Real-Time Applications with WebSockets

## What are WebSockets?
WebSockets provide a persistent, two-way communication channel between client and server.

## Benefits
- Real-time updates without polling
- Lower latency
- Efficient bandwidth usage

## Laravel Reverb
Laravel Reverb is a first-party WebSocket server for Laravel applications.

## Use Cases
1. Live notifications
2. Chat applications
3. Collaborative editing
4. Real-time dashboards

## Getting Started
Implementation details and code examples...',
                'category' => 'WebSockets',
                'is_published' => true,
                'published_at' => now(),
            ]
        );
    }
}
