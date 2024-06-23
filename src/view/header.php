<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img src="public/img/logo-immo-remove.png" 
                     alt="agence immobiliere au Bénin" style="width: 130px; height: auto;">
            </div>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto">
                <a href="index.php" class="nav-item nav-link active">Accueil</a>
                <a href="index.php?action=adsPage" class="nav-item nav-link">Annonces</a>
                <a href="index.php?action=agentsPage" class="nav-item nav-link">Annonceurs</a>

                <a href="index.php?action=aboutPage" class="nav-item nav-link">Qui sommes-nous ?</a>
                <?php if (!isset($_SESSION['user']) || !$_SESSION['user']) { ?>
                    <a href="index.php?action=loginPage" class="nav-item nav-link">Connexion</a>
                <?php } else {  
                    if($_SESSION['user']['role'] == 'admin') { ?>
                        <a href="index.php?action=dashboard_adminPage" class="nav-item nav-link">Tableau de bord</a>
                    <?php } else { ?>
                        <a href="index.php?action=dashboardPage" class="nav-item nav-link">Tableau de bord</a>
                    <?php } ?>
                    <a href="api/script.php?action=logout" class="nav-item nav-link">Déconnexion</a>
                <?php } ?>
            </div>
            <a class="btn btn-primary ml-lg-3 mt-2 mt-lg-0" href="index.php?action=newAdPage">
                NOUVELLE ANNONCE
            </a>
        </div>
    </nav>
</div>
<!-- Navbar End -->
