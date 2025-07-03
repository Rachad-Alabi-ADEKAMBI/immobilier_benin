<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Immobilier Bénin')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">


</head>

<body>

    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="/home" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="ImmobilierBenin" width="150">
            </a>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-links" id="navLinks">
                <li><a href="/home" class="active">Accueil</a></li>
                <li><a href="/ads">Propriétés</a></li>
                <li><a href="/home#about">À propos</a></li>
                <li><a href="/home#contact">Contact</a></li>
                <li><a href="/login" class="login-link"><i class="fas fa-user"></i> Connexion</a></li>
            </ul>

            <a href="login.html" class="cta-button">
                <i class="fas fa-plus"></i>
                <span class="btn-text">Publier une annonce</span>
            </a>
        </div>
    </nav>


    <main style="height: 100vh; overflow-y: auto; padding: 20px;">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <div class="footer-logo">
                    <i class="fas fa-home"></i>
                    <h3>ImmobilierBenin</h3>
                </div>
                <p>Votre partenaire de confiance pour l'immobilier en Afrique de l'Ouest. Nous vous accompagnons dans tous vos projets immobiliers.</p>
            </div>

            <div class="footer-section">
                <h3><i class="fas fa-cogs"></i> Services</h3>
                <ul>
                    <li><a href="ads.html"><i class="fas fa-shopping-cart"></i> Achat</a></li>
                    <li><a href="ads.html"><i class="fas fa-tag"></i> Vente</a></li>
                    <li><a href="ads.html"><i class="fas fa-home"></i> Location</a></li>
                    <li><a href="#contact"><i class="fas fa-calculator"></i> Évaluation</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3><i class="fas fa-map-marker-alt"></i> Zones</h3>
                <ul>
                    <li><a href="ads.html">Cotonou</a></li>
                    <li><a href="ads.html">Porto-Novo</a></li>
                    <li><a href="ads.html">Parakou</a></li>
                    <li><a href="ads.html">Abomey-Calavi</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3><i class="fas fa-phone"></i> Contact</h3>
                <ul class="contact-list">
                    <li><i class="fas fa-phone"></i> +229 XX XX XX XX</li>
                    <li><i class="fas fa-envelope"></i> contact@immobilierbenin.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Cotonou, Bénin</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 ImmobilierBenin. Tous droits réservés. | Conçu avec ❤️ pour l'Afrique</p>
        </div>
    </footer>




    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>