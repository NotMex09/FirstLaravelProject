<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tech Horizons</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

<style>
   :root {
    --primary: #6366f1;
    --secondary: #3b82f6;
    --dark: #1e293b;
    --light: #f8fafc;
    --neon-cyan: #0ff;
    --neon-pink: #f0f;
    --hologram-blue: #3b82f6;

}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-behavior: smooth;
}

body {
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
    background-color: var(--light);
    color: var(--dark);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

/* Header */
header {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    padding: 10px 20px;
}

/* Navigation Bar */
.main-nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
}


/* Logo */
.logo a {
    font-size: 1.8rem;
    font-weight: 800;
    background: linear-gradient(45deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-decoration: none;
}



/* Center Elements */
.center-elements {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    margin-top: 15px;
    margin-bottom: 20px;
    margin-left: 95px;
}

/* Search Form */
.search-form {
    position: relative;
    width: 300px;
}

.search-form input {
    width: 100%;
    padding: 10px 40px 10px 15px;
    border: 2px solid #e2e8f0;
    border-radius: 30px;
    transition: all 0.3s ease;
}

.search-form button {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--dark);
    cursor: pointer;
}

/* Theme Toggle */
#theme-toggle {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: var(--dark);
    transition: transform 0.3s ease;
}
body.dark-theme #theme-toggle {
    color: var(--light); /* Make it white in dark mode */
}

/* Auth Links */
.auth-links {
    list-style: none;
    display: flex;
    gap: 20px;
    justify-content: flex-end;
}

.auth-links li {
    display: inline-block;
}

/* Main Navigation Links */
.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
    justify-content: center;
    padding: 5px 0;
}

.nav-links li {
    display: inline-block;
}

body.dark-theme h1,
body.dark-theme h2,
body.dark-theme h3,
body.dark-theme a {
    color: var(--light); /* Ensure text is white */
}

body.dark-theme .hr:hover {
    color: var(--secondary); /* Slight color change on hover */
}

/* Responsive */
@media (max-width: 768px) {
    .main-nav {
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .nav-links, .auth-links {
        justify-content: center;
    }

    .search-form {
        width: 100%;
    }
}


    /* Modern Footer */
    footer {
        background: rgba(0,0,0,0.9);
        color: white;
        padding: 2rem 0;
        margin-top: auto;
        backdrop-filter: blur(10px);
    }
    footer p {

    text-align: center
    }
    footer nav {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin: 1.5rem 0;
    }

    footer nav a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
    }

    footer nav a::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary);
        transition: width 0.3s ease;
    }

    footer nav a:hover {
        color: white;
    }

    footer nav a:hover::after {
        width: 100%;
    }

    /* Dark Theme */
    body.dark-theme {
        background: var(--dark);
        color: var(--light);
    }

    body.dark-theme header {
        background: rgba(30, 41, 59, 0.95);
    }

    body.dark-theme footer {
        background: rgba(15, 23, 42, 0.95);
    }

    /* Modern Button Style */
    .btn-link {
    background: linear-gradient(45deg, var(--primary), var(--secondary));
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    text-decoration: none;
    display: inline-block;
}

.btn-link:hover {
    transform: scale(1.05);
    box-shadow: 0px 4px 10px rgba(99, 102, 241, 0.3);
}

/* Make Navigation Links More Modern */
.auth-links .hr, .nav-links a {
    position: relative;
    text-decoration: none;
    font-weight: bold;
    padding: 5px 10px;
    transition: color 0.3s ease-in-out;
}
.nav-links a:hover{
    color: var(--secondary);
}
.auth-links .hr:hover  {
    color: var(--secondary);
}
.auth-links .hr::after,.nav-links a::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 2px;
    background: var(--primary);
    left: 0;
    bottom: -3px;
    transform: scaleX(0);
    transition: transform 0.3s ease-in-out;
}

.nav-links a:hover::after,.auth-links .hr:hover::after {
    transform: scaleX(1);
}

/* Dark Theme Adjustments */
body.dark-theme .btn-link {
    background: linear-gradient(45deg, var(--secondary), var(--primary));
}

body.dark-theme .btn-link:hover {
    box-shadow: 0px 4px 10px rgba(59, 130, 246, 0.3);
}

.social-media {
        text-align: center;
        margin: 2rem 0;
    }

    .social-media p {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--light);
    }

    .icons {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .iconx {
        font-size: 2rem;
        color: var(--light);
        text-decoration: none;
        position: relative;
        transition: all 0.3s ease;
        padding: 15px;
        border-radius: 50%;
        animation: neonPulse 2s infinite alternate;
    }

    .iconx i {
        transition: all 0.3s ease;
    }

    .iconx:hover i {
        transform: scale(1.2);
        text-shadow: 0 0 10px var(--primary),
                     0 0 20px var(--primary),
                     0 0 30px var(--primary);
    }

    .iconx::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 50%;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .iconx:hover::before {
        border-color: var(--primary);
        box-shadow: 0 0 15px var(--primary),
                   inset 0 0 15px var(--primary);
    }

    @keyframes neonPulse {
        from {
            filter: drop-shadow(0 0 2px rgba(99, 102, 241, 0.5));
        }
        to {
            filter: drop-shadow(0 0 5px rgba(99, 102, 241, 0.9))
                    drop-shadow(0 0 15px rgba(99, 102, 241, 0.7));
        }
    }

    /* Dark theme adjustments */
    body.dark-theme .iconx {
        color: var(--light);
    }

    body.dark-theme .iconx:hover i {
        text-shadow: 0 0 10px var(--secondary),
                     0 0 20px var(--secondary),
                     0 0 30px var(--secondary);
    }

    body.dark-theme .iconx:hover::before {
        border-color: var(--secondary);
        box-shadow: 0 0 15px var(--secondary),
                   inset 0 0 15px var(--secondary);
    }
    /*Loader*/
.holo-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #000;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    overflow: hidden;
    font-family: 'Space Mono', monospace;
    transition: opacity 1.5s ease-in-out;
}

.quantum-container {
    position: relative;
    width: 600px;
    height: 300px;
    perspective: 1000px;
}

.morph-grid {
    position: absolute;
    width: 120%;
    height: 120%;
    background-image:
        linear-gradient(rgba(0, 255, 255, 0.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0, 255, 255, 0.1) 1px, transparent 1px);
    background-size: 40px 40px;
    animation: grid-flow 20s linear infinite;
    filter: brightness(1.5);
}

.neon-nexus {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 4rem;
    font-weight: 700;
    display: flex;
    gap: 0.8rem;
    text-shadow: 0 0 15px rgba(0, 255, 255, 0.7);
}

.neon-nexus span {
    color: #0ff;
    animation: char-float 3s ease-in-out infinite;
}

.flicker-part {
    animation: neon-flicker 1.5s infinite;
}

.energy-pulse {
    position: relative;
    color: #f0f;
    animation: energy-surge 2s infinite;
}

.singularity-core {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 80px;
    height: 80px;
    background: radial-gradient(circle, #0ff 10%, transparent 60%);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    filter: blur(30px);
    opacity: 0.7;
    animation: core-pulse 4s infinite;
}

.particle-vortex {
    position: absolute;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, transparent 60%, #000 100%);
    animation: vortex-spin 20s linear infinite;
}

.quantum-progress {
    position: relative;
    width: 400px;
    margin-top: 4rem;
}

.progress-wave {
    height: 3px;
    background: linear-gradient(90deg, #0ff, #f0f);
    width: 0%;
    animation: wave-expand 4s infinite;
    box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
}

.percentage-display {
    position: absolute;
    right: -50px;
    top: -15px;
    color: #0ff;
    font-size: 1.5rem;
    text-shadow: 0 0 10px #0ff;
}

.system-status {
    position: absolute;
    width: 100%;
    text-align: center;
    color: #94a3b8;
    margin-top: 1rem;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 3px;
    animation: status-glitch 5s infinite;
}

@keyframes grid-flow {
    0% { transform: rotateX(60deg) translateY(0%); }
    100% { transform: rotateX(60deg) translateY(-40%); }
}

@keyframes char-float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

@keyframes neon-flicker {
    0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
        opacity: 1;
        text-shadow: 0 0 20px #0ff;
    }
    20%, 24%, 55% {
        opacity: 0.3;
        text-shadow: none;
    }
}

@keyframes energy-surge {
    0% { color: #f0f; }
    50% {
        color: #0ff;
        text-shadow: 0 0 30px #0ff;
    }
    100% { color: #f0f; }
}

@keyframes core-pulse {
    0%, 100% { transform: translate(-50%, -50%) scale(1); }
    50% { transform: translate(-50%, -50%) scale(1.5); }
}

@keyframes vortex-spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes wave-expand {
    0% { width: 0%; opacity: 0; }
    30% { width: 45%; opacity: 1; }
    70% { width: 75%; }
    100% { width: 100%; opacity: 0; }
}

@keyframes status-glitch {
    0%, 100% {
        text-shadow: 2px 2px 0 #f0f, -2px -2px 0 #0ff;
        transform: skew(0deg);
    }
    2% { transform: skew(3deg); }
    4% { text-shadow: -2px -2px 0 #f0f, 2px 2px 0 #0ff; }
    98% { transform: skew(-2deg); }
}

body.loaded .holo-loader {
    opacity: 0;
    pointer-events: none;
}
    </style>
</head>
<body>
{{-- Loader --}}
<div id="th-loader" class="holo-loader">
    <div class="quantum-container">
        <div class="morph-grid"></div>
        <div class="neon-nexus">
            <span class="flicker-part">T</span>
            <span>E</span>
            <span class="flicker-part">C</span>
            <span>H</span>
            <span class="energy-pulse">H</span>
            <span>O</span>
            <span>R</span>
            <span class="flicker-part">I</span>
            <span>Z</span>
            <span>O</span>
            <span>N</span>
            <span>S</span>
        </div>
        <div class="singularity-core"></div>
        <div class="particle-vortex"></div>
    </div>
    <div class="quantum-progress">
        <div class="progress-wave"></div>
        <div class="percentage-display">0%</div>
        <div class="system-status">WARP CORE INITIALIZED</div>
    </div>
</div>
    <header>

        <nav class="main-nav">
            <!-- Logo -->
            <div class="logo">
                <a href="{{ route('home') }}">Tech Horizons</a>
            </div>

           <!-- Center Elements: Search + Theme Toggle -->
         <div class="center-elements">
            <form class="search-form" action="{{ route('search') }}" method="GET">
                <input type="text" name="query" placeholder="Search articles, themes, or issues...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
            <button id="theme-toggle"><i class="fas fa-moon"></i></button>
        </div>

            <!-- Auth Links -->
            <ul class="auth-links">
                @auth
                    <li ><a href="{{ route('dashboard') }}" class="hr">Dashboard</a></li>
                    <li ><a href="{{ route('profile') }}" class="hr">Profile</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="btn-link">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a class="btn-link" href="{{ route('register') }}">Register</a></li>
                    <li><a class="btn-link" href="{{ route('login') }}">Login</a></li>

                    <style>.center-elements {
                        margin-left: 7px;
                    }
                    </style>
                @endauth
            </ul>
        </nav>

        <!-- Navigation -->
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('themes.index') }}">Themes</a></li>
                <li><a href="{{ route('articles.index') }}">Articles</a></li>
                <li><a href="{{ route('issues.index') }}">Issues</a></li>
            </ul>
        </nav>
    </header>


    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Tech Horizons. All rights reserved.</p>
        <nav>
            <a href="{{ route('about') }}" class="hr">About Us</a>
            <a href="{{ route('contact') }}" class="hr">Contact</a>
            <a href="{{ route('privacy') }}" class="hr">Privacy Policy</a>
        </nav>
        <div class="social-media">
            <p>Follow Us:</p>
            <div class="icons">
                <a href="https://www.facebook.com/share/1A1pm4T8DL/" class="iconx" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/techhorizons2025?igsh=MWhtc2xwcXFvOGN2ag==" class="iconx" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.tiktok.com/@techhorizons2025" class="iconx" target="_blank"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
    </footer>


    <!-- JavaScript for Theme Toggle -->
<script>
    // Enhanced theme toggle with icon change
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    // Check saved theme
    const savedTheme = localStorage.getItem('theme') || 'light';
    if (savedTheme === 'dark') {
        body.classList.add('dark-theme');
        themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
    }

    // Toggle theme
    themeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-theme');
        const isDark = body.classList.contains('dark-theme');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        themeToggle.innerHTML = isDark ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
    });

    // Add smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    /*Loader*/
document.addEventListener("DOMContentLoaded", function() {
    const loader = document.getElementById('th-loader');
    const percentage = document.querySelector('.percentage-display');
    const status = document.querySelector('.system-status');
    const phrases = [
        "ACTIVATING QUANTUM THRUSTERS",
        "CALIBRATING NEURAL MATRIX",
        "SYNCHRONIZING ORBITALS",
        "ENGAGING HYPERDRIVE",
        "OPTIMIZING HOLO-INTERFACE"
    ];

    let progress = 0;

    // Progress simulation
    const progressInterval = setInterval(() => {
        progress += Math.random() * 3;
        const current = Math.min(progress, 100);
        percentage.textContent = `${Math.floor(current)}%`;

        if(progress >= 100) {
            clearInterval(progressInterval);
            status.textContent = "SYSTEMS NOMINAL";
        } else {
            status.textContent = phrases[Math.floor((progress/100) * phrases.length)];
        }
    }, 120);

    window.addEventListener('load', () => {
        setTimeout(() => {
            document.body.classList.add('loaded');
        }, 1500);
    });

    // Mouse particle interaction
    document.addEventListener('mousemove', (e) => {
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        loader.style.setProperty('--mouse-x', x);
        loader.style.setProperty('--mouse-y', y);
    });

    // Fallback
    setTimeout(() => {
        document.body.classList.add('loaded');
    }, 600);
});
</script>
</body>
</html>
