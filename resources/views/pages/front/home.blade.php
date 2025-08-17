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
    <home-page-component></home-page-component>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="logo" style="margin-bottom: 1rem;">
                        <i class="fas fa-home"></i>
                        ImmobilierBenin
                    </div>
                    <p style="color: rgba(255,255,255,0.7); margin-bottom: 1rem;">
                        Votre partenaire immobilier de confiance au Bénin
                    </p>
                </div>
                <div class="footer-section">
                    <h3><i class="fas fa-cogs"></i> Services</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-home"></i> Vente de propriétés</a></li>
                        <li><a href="#"><i class="fas fa-key"></i> Location</a></li>
                        <li><a href="#"><i class="fas fa-calculator"></i> Évaluation</a></li>
                        <li><a href="#"><i class="fas fa-handshake"></i> Conseil immobilier</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3><i class="fas fa-link"></i> Liens utiles</h3>
                    <ul>
                        <li><a href="#" onclick="showPage('about')"><i class="fas fa-info-circle"></i> À
                                propos</a></li>
                        <li><a href="#" onclick="showPage('contact')"><i class="fas fa-envelope"></i>
                                Contact</a></li>
                        <li><a href="#"><i class="fas fa-question-circle"></i> FAQ</a></li>
                        <li><a href="#"><i class="fas fa-file-contract"></i> Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3><i class="fas fa-phone"></i> Contact</h3>
                    <ul>
                        <li><a href="tel:+229"><i class="fas fa-phone"></i> +229 XX XX XX XX</a></li>
                        <li><a href="mailto:contact@immobilierbenin.com"><i class="fas fa-envelope"></i>
                                contact@immobilierbenin.com</a></li>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Cotonou, Bénin</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 ImmobilierBenin. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
@endsection
