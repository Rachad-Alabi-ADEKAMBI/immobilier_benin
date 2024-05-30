<?php $title = "Immobilier Bénin - Marketplace d'annonces immobilières au Bénin"; ?>

<?php ob_start(); ?>

    <section class='section' id='app'>
         <!-- Header Start -->
         <div class="container-fluid header bg-white p-0" >
            <div class="row g-0 align-items-center flex-column-reverse
                flex-md-row pt-5">
                <div class="col-md-6 p-5 mt-lg-5    ">
                    <h1 class="display-5 animated fadeIn mb-4">Trouvez <span class="text-primary">l'appartement
                            parfait</span>
                        pour habiter avec votre famille</h1>
                    <p class="animated fadeIn mb-4 pb-2">Dites nous juste ce que vous recherchez, nous nous chargeons du
                        reste</p>
                    <a href="properties.php" class="btn btn-primary py-3 animated fadeIn">Voir les annonces</a>
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
                    <p>Nous sommes spécialisés dans la location et 
                        la vente de biens immobiliers à Parakou et environs
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                                </div>
                                <h6>Appartements</h6>
                                <span>+ 40 annonces</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-condominium.png" alt="Icon">
                                </div>
                                <h6>Boutiques</h6>
                                <span>+ 30 annonces</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-house.png" alt="Icon">
                                </div>
                                <h6>Maisons</h6>
                                <span>+ 20 annonces</span>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-condominium.png" alt="Icon">
                                </div>
                                <h6>Terrains</h6>
                                <span>15 annonces</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- About Start 
        <div class="container-xxl py-5" id='about'>
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="img/bureau2.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">#1 le lieu idéal pour trouver votre prochaine propriété</h1>
                        <p class="mb-4">Nous sommes une agence immobilière présente
                            à Parakou. Notre équipe est composée d'agents immobiliers chevronnés et la satisfaction de
                            la clientèle est
                            notre garantie. Nous vous aidons à gérer
                            toutes
                            vos transactions immobilières rapidement et éfficacement. Nos services sont entre autres:
                        </p>
                        <p><i class="fa fa-check text-primary me-3"></i>La recherche de biens immobiliers (appartements,
                            maisons, etc...)</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Suivi et conseil en gestion immobilière
                            complète</p>
                        <p><i class="fa fa-check text-primary me-3"></i>La gestion de vos transactions de vente et achat
                            de biens immobiliers
                        </p>

                    </div>
                </div>
            </div>
        </div>
         About End -->


        <div class="container-xxl py-5">
            <div class="container">
                <!-- Property List Start -->
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Dernières annonces</h1>
                            <p>Nous publions chaque jour des dizaines d'annonces d'appartements, maisons terrains et
                                autres dans la ville de Parakou</p>
                        </div>
                    </div>
   
                </div>

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" v-for='detail in details' 
                                    :key='detail.id'>
                                    <div class="property-item rounded overflow-hidden" @click='goToProperty(detail.id)'>
                                        <div class="position-relative overflow-hidden">
                                            <a href="">
                                                <img class="img-fluid" :src="getImg(detail.pic1)" alt=""></a>
                                            <div
                                                class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                {{ detail.action }}    
                                            </div>
                                            <div
                                                class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                {{ detail.category }}    
                                            </div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3"> {{ format(detail.price) }} F CFA </h5>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i> {{ detail.location}}</p>
                                        </div>
                                        <div class="d-flex border-top" v-if="detail.category != 'Terrain'">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{detail.people}} ménage{{detail.people > 1 ? 's' : ''}}</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{detail.rooms}} chambre{{detail.rooms > 1 ? 's' : ''}}</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{detail.bathrooms}} douche{{detail.bathrooms > 1 ? 's' : ''}}</small>
                                        </div>

                                    </div>
                                </div>
                        
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="properties.php">Voir plus</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Property List End -->


        <div class="container-xxl py-5" id='about'>
                <div class="container">
                    <div class="bg-light rounded p-3">
                        <div class="bg-white rounded" style="border: 1px dashed rgba(0, 185, 142, .3)">
                            <div class="row g-5 align-items-center">
                                <div class="col-lg-6 pt-5 wow fadeIn" data-wow-delay="0.1s">
                                    <img class="img-fluid rounded w-100" src="img/logo.jpg" alt="">
                                </div>
                                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="mb-4">
                                        <h1 class="mb-3  mt-3">A propos</h1>

                                        <p>
                                        Bienvenue sur immobilierbenin, votre site d'annonces de vente et de location de biens
                                                immobiliers au Bénin. Nous offrons un service gratuit d'annonces de vente et de location
                                                de biens immobiliers pour tous les utilisateurs. Vous pouvez publier vos annonces en quelques
                                                clics seulement et les mettre à jour à tout moment ...
                                        </p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Annonces gratuites</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Recherche personnalisée</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Mise en relation entre agents et clients
                                    </p>
                                    </div>

                                    <a href="properties.php" class="btn btn-dark py-3 px-4">
                                        <i class="fa fa-list-alt me-2"></i>Voir les annonces</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Team Start
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Liste des agents</h1>
                    <p>Nova Immo vous propose le meilleur service immobilier de Parakou et environs, découvrez notre
                        équipe.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/user1.jpg" alt="">
                                <div
                                    class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Jean</h5>
                                <small>agent immobilier</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/user2.jpg" alt="">
                                <div
                                    class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Paul</h5>
                                <small>Agent immobilier</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/user6.jpg" alt="">
                                <div
                                    class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Pierre</h5>
                                <small>Agent immobilier</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         Team End -->


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
                                temps, je recommanden vivement, en plus c'est gratuit</p>
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
                details: ''       
            },
            mounted(){
                this.displayDetails();
            },
            methods: {
                displayDetails(){
                    axios.get('api/script.php?action=sixAds')
                        .then((response) => {
                            console.log(response.data);
                            this.details = response.data;
                        })
                        .catch((error) => {
                           // console.error(error);
                            alert('Failed to fetch data');
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
                }
            }
        });
    </script>