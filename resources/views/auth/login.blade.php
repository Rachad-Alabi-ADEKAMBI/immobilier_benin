@extends('layouts.app')
<button class="theme-toggle" onclick="toggleTheme()" title="Changer de thème">
    <i class="fas fa-moon" id="themeIcon"></i>
</button>

<nav class="navbar" id="navbar" style="margin-bottom: 150px;">
    <div class="nav-container">
        <div class="logo">
            <a href=" {{ route('home') }}">
                <i class="fas fa-home"></i>
                Immo
            </a>
        </div>

        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href=" {{ url('/home') }}" class="active">
                    <i class="fas fa-home"></i> Accueil
                </a></li>
            <li><a href=" {{ url('/ads') }}">
                    <i class="fas fa-building"></i> Propriétés
                </a></li>
            <li><a href=" {{ url('home#about') }}"">
                    <i class="fas fa-info-circle"></i> À propos
                </a></li>
            <li><a href=" {{ url('home#contact') }}">
                    <i class="fas fa-envelope"></i> Contact
                </a></li>
            @guest
                <li>
                    <a href="{{ route('login') }}" class="login-link">
                        <i class="fas fa-sign-in-alt"></i> Connexion
                    </a>
                </li>
            @endguest

            @auth
                <li>
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('dashboardAdmin') }}" class="login-link">
                            <i class="fas fa-tachometer-alt"></i> Tableau de bord
                        </a>
                    @elseif(auth()->user()->role === 'user')
                        <a href="{{ route('dashboardUser') }}" class="login-link">
                            <i class="fas fa-tachometer-alt"></i> Tableau de bord
                        </a>
                    @endif
                </li>

                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="login-link" style="background:none; border:none; cursor:pointer;">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </form>
                </li>
            @endauth

        </ul>

        <a href="{{ route('newAd') }}" class="cta-nav">
            <i class="fas fa-plus"></i>
            Publier une annonce
        </a>
    </div>
</nav>

@section('content')
    <div class="container" style="max-width: 500px; padding-top: 120px">
        <div class="content-card fade-in">
            <div class="card-content" style="padding: 3rem;">

                <!-- Logo -->
                <div style="text-align: center; margin-bottom: 2rem;">
                    <div class="logo" style="justify-content: center; font-size: 2rem; margin-bottom: 1rem;">
                        <i class="fas fa-home"></i> ImmobilierBenin
                    </div>
                    <p style="color: var(--text-light);">Connectez-vous à votre compte</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="form-control" placeholder="votre@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label class="form-label">
                            <i class="fas fa-lock"></i> Mot de passe
                        </label>
                        <input type="password" name="password" required class="form-control" placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me / Forgot Password -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                            <input type="checkbox" name="remember" style="margin: 0;">
                            <span style="color: var(--text-light); font-size: 0.9rem;">Se souvenir de
                                moi</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                style="color: #667eea; text-decoration: none; font-size: 0.9rem;">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary"
                        style="width: 100%; justify-content: center; margin-bottom: 1.5rem;">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </button>

                    <!-- Or -->
                    <div style="text-align: center; margin-bottom: 2rem;">
                        <span style="color: var(--text-light);">ou</span>
                    </div>

                    <!-- Social Buttons (dummy) -->
                    <button type="button" class="btn btn-outline"
                        style="width: 100%; justify-content: center; color: #667eea; border-color: #667eea; margin-bottom: 1rem;">
                        <i class="fab fa-google"></i> Continuer avec Google
                    </button>

                    <button type="button" class="btn btn-outline"
                        style="width: 100%; justify-content: center; color: #667eea; border-color: #667eea;">
                        <i class="fab fa-facebook"></i> Continuer avec Facebook
                    </button>
                </form>

                <!-- Register -->
                <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e9ecef;">
                    <p style="color: var(--text-light);">
                        Pas encore de compte ?
                        <a href="{{ route('register') }}"
                            style="color: #667eea; text-decoration: none; font-weight: 600;">
                            Créer un compte
                        </a>
                    </p>
                </dv>

            </div>
        </div>
    </div>
@endsection
