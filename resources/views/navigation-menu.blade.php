<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon">
                <img src="{{ asset('img/logo-immo-remove.png') }}" 
                     alt="agence immobiliere au Bénin" style="width: 180px; height: auto;">
            </div>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto">
                <a href="{{ url('/')}}" class="nav-item nav-link active">Accueil</a>
                <a href="{{ url('/ads')}}" class="nav-item nav-link">Annonces</a>
                <a href="{{ url('/advertisers')}}" class="nav-item nav-link">Annonceurs</a>

                <a href="{{ url('/about')}}" class="nav-item nav-link">A propos</a>
                
                @guest
                    <a href="{{ url('/login')}}" class="nav-item nav-link">Connexion</a>
                @endguest

                   @auth
                        <a href="{{ url('/dashboard')}}" class="nav-item nav-link">Tableau de bord</a>
                    
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf <!-- Add CSRF token for security -->
                            <button type="submit">Déconnexion</button>
                        </form>
                    @endauth
            </div>

                <a class="btn btn-success"  href="{{ url('/newAd')}}">
                <i class="bi bi-plus-circle"></i> NOUVELLE ANNONCE
                </a>
            </form>
        </div>
    </nav>
</div>
<!-- Navbar End -->
