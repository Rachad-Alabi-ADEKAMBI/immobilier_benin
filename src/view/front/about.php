<?php $title = "Immobilier Bénin - Qui sommes nous"; ?>

<?php ob_start(); ?>

<div class="container-xxl p" id="app">
     <!--about-->
     <div class="container-xxl py-5" id='about'>
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="mb-4">
                                        <h1 class="mb-3  mt-3">A propos</h1>

                                        <p>
                                                Immobilier Bénin est un service du groupe <strong>Orizon +</strong>. Nous intervenons à toutes 
                                                les étapes de votre projet d'entreprise et d'investissement. Notre plus grande réussite se 
                                                trouve au niveau des membres de la diaspora que nous accompagnons à concrétiser leurs projets
                                                d'investissement grâce à notre équipe d'experts en gestion juridique, fiscale et sociale.
                                        </p>
                                    </div>

                                    <a href="index.php?action=contactPage" class="btn btn-blue py-3 px-4">
                                    <i class="fas fa-envelope me-3"></i>Contact</a>
                    </div>

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="public/img/immeuble2.jpg" alt='vendre maison a cotonou'>
                        </div>
                    </div>
                    
                </div>
            </div>  
    </div>  

    <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="public/img/batiment3.jpg" alt='vendre maison a Porto-Novo'>
                        </div>
                    </div>

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="mb-4">
                                        <h1 class="mb-3  mt-3">Notre vision</h1>

                                        <p>
                                        Chez Immobilier Bénin, nous envisageons un avenir où chaque membre de la 
                                        diaspora peut réaliser ses ambitions d'investissement au Bénin en toute sérénité.
                                         Notre vision est de devenir le partenaire privilégié des entrepreneurs et 
                                         investisseurs, offrant des solutions complètes et adaptées à leurs besoins.  <br> <br>
                                         En nous appuyant sur notre expertise en gestion juridique, fiscale et sociale, 
                                         nous nous engageons à faciliter vos projets et à contribuer à la 
                                         croissance économique du pays. Ensemble, construisons un Bénin prospère et
                                          innovant, où chaque projet trouve sa place et prospère.
                                        </p>
                                    </div>

                                   
                                </div>
                    
                </div>
            </div>  
    </div>

    <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="mb-4">
                                        <h1 class="mb-3  mt-3">Nos services</h1>

                                        <p>
                                        Bienvenue sur immobilierbenin, votre marketplace d'annonces de vente et de location de biens
                                                immobiliers au Bénin. Nous offrons les services suivants:
                                        </p>
                                        <p><i class="fa fa-check text-blue me-3"></i>Annonces gratuites</p>
                                        <p><i class="fa fa-check text-blue me-3"></i>Recherches personnalisées</p>
                                        <p><i class="fa fa-check text-blue me-3"></i>Mise en relation entre agents et clients</p>
                                        <p><i class="fa fa-check text-blue me-3"></i>Gestion juridique, fiscale et sociale</p>
                                        <p><i class="fa fa-check text-blue me-3"></i>Gestion de patrimoine</p>
                                        <p><i class="fa fa-check text-blue me-3"></i>Conseils en investissement</p>
                                                </p>
                                        </div>

                                   
                    </div>

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="public/img/immeuble1.jpg" alt='vendre maison a cotonou'>
                        </div>
                    </div>
                    
                </div>
            </div>  
        </div>

</div>

<?php $content = ob_get_clean(); ?>
           
<?php require './src/view/layout.php'; ?>

</body>
