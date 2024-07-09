<?php $title = "Immobilier Bénin - Marketplace d'annonces immobilières au Bénin";

$datas = sixAds();

// $articles

 ob_start(); ?>
    <section class='section' >
         <div class="app" id="app">
        <!--new hero-->
        <div class="hero">
                <div class="row">
                    <div class="col-sm-12 col-md-8 mx-auto">
                            <div class="hero__content animate__animated animate__backInLeft
                               animate__delay-1s">
                              <h1 class="">
                                 IMMOBILIER BENIN
                              </h1>

                              <p class="text text-white fw-bold">
                                Annonces gratuites vente et location de biens immobiliers
                              </p>
                                  <a class="btn btn-primary" href="/ads">
                                      Voir les annonces
                                  </a>

                            </div>
                    </div>
                </div>
        </div>

        <!--end hero-->
        

        <!--category-->
       <div class="container">
            <div class="row categories">
                <div class="col-sm-12 col-md-3 category">
                        <div class="category__icon">
                            icon
                        </div>

                        <p class="category__name">
                            Maison
                        </p>
                </div>

                <div class="col-sm-12 col-md-3 category">
                        <div class="category__icon">
                            icon
                        </div>

                        <p class="category__name">
                            Maison
                        </p>
                </div>

                <div class="col-sm-12 col-md-3 category">
                        <div class="category__icon">
                            icon
                        </div>

                        <p class="category__name">
                            Maison
                        </p>
                </div>

                <div class="col-sm-12 col-md-3 category">
                        <div class="category__icon">
                            icon
                        </div>

                        <p class="category__name">
                            Maison
                        </p>
                </div>
            </div>
       </div>
       <!--end category-->

       <!--services-->
        <div class="container mt-4">
            <div class="row services">
                <div class="col-sm-12 col-md-6 services__image">
                    <img src="public/img/immeuble1.jpg" alt="" class="image">
                        <div class="services__image__bg">
                        </div>
                </div>

                <div class="col-sm-12 col-md-6 services__text">
                    <h2>
                        Nos services
                    </h2>

                    <div class="mt-4">
                        <p><i class="fa fa-check text-blue me-3"></i>Annonces gratuites</p>
                        <p><i class="fa fa-check text-blue me-3"></i>Recherches personnalisées</p>
                        <p><i class="fa fa-check text-blue me-3"></i>Mise en relation entre annonceurs et clients</p>
                        <p><i class="fa fa-check text-blue me-3"></i>Gestion juridique, fiscale et sociale</p>
                        <p><i class="fa fa-check text-blue me-3"></i>Gestion de patrimoine</p>
                        <p><i class="fa fa-check text-blue me-3"></i>Conseils en investissement</p>
                    </div>
                </div>
            </div>
        </div>
        <!--services-->

        <!--properties-->
        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="mx-auto text-center">
                        Dernières annonces
                    </h2>
                </div>
            </div>

            <div class="row ads mt-3">
                <?php foreach ($datas as $detail): ?>
                <div class="col-sm-12 col-md-4 ad">
                    <a href="index.php?action=adPage&id=">
                        <div class="ad__image">
                            <img src="public/img/appart1.jpeg" alt="appartement a louer a cotonou">
                            <div class="action">
                                A louer
                            </div>

                            <div class="category">
                                Appartement meublé
                            </div>
                        </div>
                        <div class="ad__infos">
                            <div class="price">
                                30.000 XOF
                            </div>

                            <div class="name">
                                Appartement
                            </div>

                            <div class="more__details">
                                <div class="location">
                                    Cotonou
                                </div>

                                <div class="date">
                                    15-06-2023
                                </div>
                            </div>

                            <div class="final__details">
                                <div class="detail">
                                    1 ménage
                                </div>
                                <div class="detail">
                                    1 chambre
                                </div>
                                <div class="detail">
                                    1 douche
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div> 
        <!--end properties-->

        <!--about-->
        <div class="container mt-5 mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-6 about__text">
                    <h2>
                        Qui sommes nous ?
                    </h2>

                    <div class="mt-4">
                    <p>
                                                Immobilier Bénin est un service du groupe <strong>Orizon +</strong>. Nous intervenons à toutes 
                                                les étapes de votre projet d'entreprise et d'investissement. <br> <br> Notre plus grande réussite se 
                                                trouve au niveau des membres de la diaspora que nous accompagnons à concrétiser leurs projets
                                                d'investissement grâce à notre équipe d'experts en gestion juridique, fiscale et sociale.
                                        </p>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 about__image">
                    <img src="public/img/hero.jpeg" alt="" class="image">
                        <div class="about__image__bg">
                        </div>
                </div>

            </div>
        </div>
        <!--end about-->

         <!--properties-->
         <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="mx-auto text-center">
                        Dernières annonces
                    </h2>
                </div>
            </div>

            <div class="row ads mt-3">
                <?php foreach ($datas as $detail): ?>
                <div class="col-sm-12 col-md-4 ad">
                    <a href="index.php?action=adPage&id="s>
                        <div class="ad__image">
                            <img src="public/img/appart1.jpeg" alt="appartement a louer a cotonou">
                            <div class="action">
                                A louer
                            </div>

                            <div class="category">
                                Appartement meublé
                            </div>
                        </div>
                        <div class="ad__infos">
                            <div class="price">
                                30.000 XOF
                            </div>

                            <div class="name">
                                Appartement
                            </div>

                            <div class="more__details">
                                <div class="location">
                                    Cotonou
                                </div>

                                <div class="date">
                                    15-06-2023
                                </div>
                            </div>

                            <div class="final__details">
                                <div class="detail">
                                    1 ménage
                                </div>
                                <div class="detail">
                                    1 chambre
                                </div>
                                <div class="detail">
                                    1 douche
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div> 
        <!--end properties-->

        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Que disent nos utilisateurs ?</h1>
                    <p></p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Site web rapide et facile à utiliser, je pensais que cela prendrait plus de
                                temps, je recommande vivement, en plus c'est gratuit.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0
                                 rounded" src="public/img/marie.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Marie</h6>
                                    <small>Commercante</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Service de qualité, j'ai fait une recherche personnalisée et le jour suivant j'ai eu plusieurs 
                                propositions, merci beaucoup.
                            </p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="public/img/user4.jpg"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Benjamin</h6>
                                    <small>Particulier</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>J'aime beaucoup ce site, j'ai déjà trouvé ce que je cherchais mais je continue de parcourir les annonces, il y a tellement d'annonces interessantes</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="public/img/user3.jpeg"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Paul</h6>
                                    <small>Médécin</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>


<script>
        new Vue({
            el: '#app',
            data: {
                details: '',
                articles: ''       
            },
            mounted(){
                this.displayDetails();
            },
            methods: {
                displayDetails(){
                    axios.get('api/script.php?action=sixAds')
                        .then((response) => {
                          //  console.log(response.data);
                            this.details = response.data;
                        })
                        .catch((error) => {
                           // console.error(error);
                         //   alert('Failed to fetch data');
                        });
                    
                    axios.get('api/script.php?action=threePosts')
                        .then((response) => {
                            console.log(response.data);
                            this.articles = response.data;
                        })
                        .catch((error) => {
                           // console.error(error);
                         //   alert('Failed to fetch data');
                        });
                },
                format(num){
                    return new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
                },
                formatDate(da) {
                    const [datePart, timePart] = da.split(' ');
                    const [year, month, day] = datePart.split('-');
                    return `${day}-${month}-${year}`;
                },
                getImg(pic) {
                    return "public/img/" + pic;
                },
                goToProperty(id){
                        window.location.replace('property.php?id='+id);
                },
                goToArticle(id){
                    window.location.replace('index.php?action=articlePage&id='+id);
                }
            }
        });
    </script>

    <style>
        .img-fluid{
            width: 320px;
            height: auto;
        }

        .ad img{
        width: 320px;
         }


        .details .date{
            background-color:  #8755F1;
            width: 250px;
            border-radius: 5px;
        }

        .details .date i{
            color: white;
        }
    </style>