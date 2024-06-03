 <!-- Navbar Start -->
 <div class="container-fluid nav-bar bg-transparent">
     <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
         <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
             <!--<div class="icon p-2 me-2">
                 <img class="img-fluid"  alt="Icon" style="width: 30px; height: 30px;">
             </div>
-->
             <h1 class="m-0 text-blue text-left">Immobilier <br>
              Bénin</h1>
         </a>
         <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
             <div class="navbar-nav ms-auto">
                 <a href="index.php" class="nav-item nav-link active">Accueil</a>
                 <a href="index.php#about" class="nav-item nav-link">A-propos</a>
                <a href="index.php?action=adsPage" class="nav-item nav-link">Annonces</a>
                <a href="index.php?action=agentsPage" class="nav-item nav-link">Annonceurs</a>
                 <a href="index.php?action=contactPage" class="nav-item nav-link">Contact</a>
                        <?php if (!isset($_SESSION['user']) || !$_SESSION['user']) { ?>
                            <a href="index.php?action=loginPage" class="nav-item nav-link">Connexion</a>
                        <?php } else { ?>
                            <a href="index.php?action=dashboardPage" class="nav-item nav-link">Tableau de bord</a>
                            <a href="api/script.php?action=logout" class="nav-item nav-link">Déconnexion</a>
                        <?php } ?>

                
             </div>
         </div>
     </nav>
 </div>
 <!-- Navbar End -->