<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ImmobilierBenin') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <div id="app">
            @yield('content')
        </div>


        <!-- Footer -->

    </div>

    <script>
        // Theme Management
        function toggleTheme() {
            const body = document.body;
            const themeIcon = document.getElementById('themeIcon');

            if (body.getAttribute('data-theme') === 'dark') {
                body.removeAttribute('data-theme');
                themeIcon.className = 'fas fa-moon';
                localStorage.setItem('theme', 'light');
            } else {
                body.setAttribute('data-theme', 'dark');
                themeIcon.className = 'fas fa-sun';
                localStorage.setItem('theme', 'dark');
            }
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            const themeIcon = document.getElementById('themeIcon');

            if (savedTheme === 'dark') {
                document.body.setAttribute('data-theme', 'dark');
                themeIcon.className = 'fas fa-sun';
            }
        });

        // Page Management
        function showPage(pageName) {
            // Hide all pages
            document.querySelectorAll('.page').forEach(page => {
                page.classList.remove('active');
            });

            // Show selected page
            const targetPage = document.getElementById(`page-${pageName}`);
            if (targetPage) {
                targetPage.classList.add('active');

                // Update active nav link
                updateActiveNavLink(pageName);

                // Close mobile menu
                document.getElementById('mobileMenuBtn').classList.remove('active');
                document.getElementById('navLinks').classList.remove('active');

                // Scroll to top
                window.scrollTo(0, 0);

                // Trigger animations
                setTimeout(() => {
                    targetPage.querySelectorAll('.fade-in').forEach(el => {
                        el.classList.add('visible');
                    });
                }, 100);
            }
        }

        function updateActiveNavLink(pageName) {
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.classList.remove('active');
            });

            // Find and activate the correct nav link
            document.querySelectorAll('.nav-links a').forEach(link => {
                if (link.getAttribute('onclick') && link.getAttribute('onclick').includes(pageName)) {
                    link.classList.add('active');
                }
            });
        }

        // Mobile menu functionality
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            this.classList.toggle('active');
            document.getElementById('navLinks').classList.toggle('active');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Counter animation for stats
        const animateCounters = () => {
            const counters = document.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                const target = parseInt(counter.textContent.replace(/\D/g, ''));
                const increment = target / 100;
                let current = 0;

                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current) + (counter.textContent.includes('+') ?
                            '+' : '');
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = counter.textContent;
                    }
                };

                updateCounter();
            });
        };

        // Trigger counter animation when stats section is visible
        const statsSection = document.querySelector('.stats');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Trigger initial animations
            setTimeout(() => {
                document.querySelectorAll('.fade-in').forEach(el => {
                    el.classList.add('visible');
                });
            }, 100);
        });
    </script>

    <script src="{{ mix('js/app.js') }}"></script>

</body>


</html>
