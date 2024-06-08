<?php $title = "Immobilier Bénin - Marketplace d'annonces immobilières au Bénin";

$datas = sixAds();

// $articles

 ob_start(); ?>
    <section class='section' >
         <div class="app" id="app">
            <!-- Header Start -->
         <div class="container-fluid header bg-white p-0" >
            <div class="row g-0 align-items-center flex-column-reverse
                flex-md-row pt-5">
                <div class="col-md-6 p-5 mt-lg-5    ">
                    <h1 class="display-4 animated fadeIn mb-4">Trouvez <span class="text-blue">l'endroit
                            parfait</span>
                        pour habiter avec votre famille</h1>
                    <p class="animated fadeIn mb-4 pb-2">
                        Marketplace d'annonces immobilières gratuites au Bénin
                        </p>
                    <a href="index.php?action=adsPage" class="btn btn-blue py-3 animated fadeIn">
                    <i class="fas fa-list me-3"></i> Voir les annonces</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="public/img/home1.jpeg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
        

      <?php include 'search.php'; ?>


        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Types de propriétés</h1>
                    <p>
                        Annonces de vente et de location de maisons, appartements, appartements meublés, terrains et boutiques
                    </p>
                </div>
                <div class="row g-4">
                <div class="col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center text-blue rounded p-3" href="index.php?action=adsPage">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                <i class="fas fa-building"></i>
                                </div>
                                <h6>Maisons</h6>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="cat-item d-block bg-light text-center text-blue rounded p-3" href="index.php?action=adsPage">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                      <i class="fas fa-landmark"></i>
                                </div>
                                <h6>Appartements</h6>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item d-block bg-light text-center rounded p-3 text-blue" href="index.php?action=adsPage">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                <i class="fas fa-store mx-auto"></i>
                                </div>
                                <h6>Boutiques</h6>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.4s">
                        <a class="cat-item d-block bg-light text-center rounded p-3 text-blue" href="index.php?action=adsPage">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                <i class="fa fa-map-marker-alt  mx-auto"></i>
                                </div>
                                <h6>Terrains</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->

        <div class="container-xxl py-5" id='services'>
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="public/img/immeuble1.jpg" alt='vendre maison a cotonou'>
                        </div>
                    </div>

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
                    
                </div>
            </div>  
        </div>

        <div class="container-xxl py-5" id="">
            <div class="container">
                    <!-- Property List Start -->
                <div class="row g-0 gx-5 align-items-end">
                        <div class="col-lg-6">
                                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                                    <h1 class="mb-3">Dernières annonces</h1>
                                    <p>Annonces gratuites de vente et location d'appartements, <br> maisons, terrains et
                                        boutiques</p>
                                </div>
                        </div>
                </div>

                <div class="tab-content" >
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4" >
                            <?php foreach ($datas as $detail): ?>
                                    <div class="col-sm-12 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                                        <a href="index.php?action=adPage&id=<?=$detail['id']?>" style='color: #666565;'>
                                            <div class="property-item rounded overflow-hidden">
                                                <div class="position-relative overflow-hidden">
                                                    <img class="img-fluid" src="public/img/<?= htmlspecialchars($detail['pic1']) ?>" alt="immobilier au Bénin">
                                                    <div class="bg-blue rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                        <?= htmlspecialchars($detail['action']) ?>
                                                    </div>
                                                    <div class="bg-white rounded-top text-blue position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                        <?= htmlspecialchars($detail['category']) ?>
                                                    </div>
                                                </div>
                                                    <div class="p-4 pb-0">
                                                    <h5 class="text-blue mb-3"> <?= number_format($detail['price'], 0, '', ' ') ?> F CFA </h5>
                                                    <a class="d-block h5 mb-2" href=""> <?=$detail['name']?> </a>
                                                    <p><i class="fa fa-map-marker-alt text-blue me-2"></i><?= htmlspecialchars($detail['location']) ?></p>
                                                </div>
                                               <?php
                                                    if($detail['category'] != 'Terrain' && $detail['category'] != 'Boutique' ){ ?>
                                                         <div class="d-flex border-top">
                                                    <small class="flex-fill text-center border-end py-2">
                                                        <i class="fa fa-ruler-combined text-blue me-2"></i><?= htmlspecialchars($detail['people']) ?> ménage<?= $detail['people'] > 1 ? 's' : '' ?>
                                                    </small>
                                                    <small class="flex-fill text-center border-end py-2">
                                                        <i class="fa fa-bed text-blue me-2"></i><?= htmlspecialchars($detail['rooms']) ?> chambre<?= $detail['rooms'] > 1 ? 's' : '' ?>
                                                    </small>
                                                    <small class="flex-fill text-center py-2">
                                                        <i class="fa fa-bath text-blue me-2"></i><?= htmlspecialchars($detail['bathrooms']) ?> douche<?= $detail['bathrooms'] > 1 ? 's' : '' ?>
                                                    </small>
                                                </div>
                                                    <?php }
                                                    else{ ?>
                                                        <small class="flex-fill text-left py-2">
                                                        <i class="fa fa-ruler-combined text-blue me-2"></i><?= htmlspecialchars($detail['size']) ?> m2
                                                    </small>
                                                    <?php }
                                               ?>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Property List End -->

        <!--about-->
        <div class="container-xxl py-5" id='about'>
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="mb-4">
                                        <h1 class="mb-3  mt-3">A propos</h1>

                                        <p>
                                                Immobilier Bénin est un service du groupe <span>Orizon +</span>. Nous intervenons à tous 
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

        <!--Blog
        <div class="container-xxl py-2">
            <div class="container">
                <div class="row g-2 align-items-center">
                    <div class="col-sm-12 col-md-4 p-3 wow fadeInUp" data-wow-delay="0.1s" 
                    v-for="detail in articles" :key='detail.id' @click='goToArticle(detail.id)'>
                        <img class="img-fluid" :src="getImg(detail.image)" alt="">
                        <h4>
                            {{detail.name}}
                        </h4>

                        <p>

                        </p>

                        <div class="details">
                            <div class="date">
                            <i class="bi bi-clock"></i> {{ detail.date }}
                            </div>

                            <div class="views">
                                {{ detail.views }}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 text-center">
                        <a   href="index.php?action=blogPage" class="btn btn-blue me-3 ">
                            <i class="fas fa-list me-3"></i> Voir blog
                        </a>
                    </div>
                </div>
            </div>
         </div>
                                                    -->
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

        .details .date{
            background-color:  #8755F1;
            width: 250px;
            border-radius: 5px;
        }

        .details .date i{
            color: white;
        }
    </style>