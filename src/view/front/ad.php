<?php $title = "Immobilier Bénin - Annonce"; ?>

<?php ob_start(); ?>

<div class="container-xxl p" id="app">
        <?php include 'search.php'; ?>

            <div class="container" v-for='detail in details' :key='detail.id'>
            
                <div class="row">
                    <div class="col">
                        <h1 class="text-center">
                            {{ capitalizeFirstLetter(detail.name) }}
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 mx-auto text-center main-img">
                        <img :src="getImgUrl(detail.pic1)" alt="appartements et terrains au Bénin">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-md-4 mx-auto text-center image" v-if="detail.pic2">
                        <img :src="getImgUrl(detail.pic2)" alt="appartements et terrains au Bénin">
                    </div>
                    <div class="col-sm-12 col-md-4 mx-auto text-center image" v-if="detail.pic3">
                        <img :src="getImgUrl(detail.pic3)" alt="annonces de vente et location au Bénin">
                    </div>
                    <div class="col-sm-12 col-md-4 mx-auto text-center image" v-if="detail.pic4">
                        <img :src="getImgUrl(detail.pic4)" alt="Immobilier Bénin">
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="icon"  v-if="detail.category != 'Terrain' && detail.category != 'Boutique'">
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-ruler-combined text-blue me-2"></i>{{detail.people}} ménage{{detail.people > 1 ? 's' : ''}}
                                </small>
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-bed text-blue me-2"></i>{{detail.rooms}} chambre{{detail.rooms > 1 ? 's' : ''}}
                                </small>
                                <small class="flex-fill text-center py-2">
                                    <i class="fa fa-bath text-blue me-2"></i>{{detail.bathrooms}} douche{{detail.bathrooms > 1 ? 's' : ''}}
                                </small>
                            </div>
                        </div>

                        <div class="icon" v-if="detail.category == 'Terrain' && detail.category == 'Boutique'">
                            <small class="flex-fill text-left border-end py-2">
                                    <i class="fa fa-ruler-combined text-left me-2"></i>
                                    {{ format(detail.size) }} m2
                                </small>
                        </div>
                    </div>
                    
                    <div class="col-12">

                    <p><i class="fa fa-list-alt text-blue me-2"></i> 
                    {{ detail.category}} <br>
                    <i class="fa fa-map-marker-alt text-blue me-2"></i> 
                    {{ detail.location}}, {{ detail.action }} <br>
                    <i class="far fa-clock text-blue"></i>
                    {{ formatDate(detail.date_of_insertion)}}
                </p>
                                        
                                        <div class="d-flex border-top">

                    <h5 class="text-blue mt-3 mb-2">{{ format(detail.price) }} F CFA</h5>
                    </div>
                </div>

                <div class="row mt-4">
                <div class="col-sm-12 col-md-8 mx-auto text-center">
                    <p class="text text-grey">{{ detail.description }}</p>
                </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <p class="text-left">
                        <i class="fas fa-exclamation text-danger"></i> N'envoyez jamais de l'argent à une personne que vous n'avez jamais vue.<br>
                        <i class="fas fa-exclamation text-danger"></i> Assurez vous que le bien appartient réellement au vendeur lors d'un achat.<br>
                        <i class="fas fa-exclamation text-danger"></i> <a href="index.php?action=contactPage">Contactez-nous </a> si vous ne savez pas comment procéder.
                        </p>
                        
                    </div>
                    <div class="col-sm-12 col-md-8 mx-auto text-center">
                        <p>
                            Annonceur: <strong>{{ capitalizeFirstLetter(detail.user_name) }}</strong> <br>
                            Contact: <strong>{{ detail.user_phone}}</strong>

                        </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 mx-auto text-center">
                        <p>
                            Partager: <br>
                                <a href="https://wa.me/?text=https://immobilier_benin.000webhostapp.com/property.php?id=<?=$_GET['id']?>">
                                <i class="fab fa-whatsapp text-whatsapp"></i>
                                </a>
                                <a href="https://www.facebook.com/share.php?u=https:/immobilier_benin.000webhostapp.com/property.php?id=<?=$_GET['id']?>" target="_blank">

                                <i class="fab fa-facebook text-facebook"></i>
                                </a>

                        </p>
                        </div>
                    </div>
                </div>

                <div class="row mt-">
                    <div class="col-12 text-center">
                        <h2 class="text-center">
                            Annonces similaires
                        </h2>
                    </div>
                </div>

                <div class="row content mt-1" >
                                <div class="col-lg-4 col-md-6 wow fadeInUp item ad" data-wow-delay="0.1s " v-for="detail in ads"
                                    :key='detail.id'>
                                    <div class="property-item rounded overflow-hidden" @click='goToProperty(detail.id)'>
                                        <div class="position-relative overflow-hidden">
                                                <img class="img-fluid" :src="getImgUrl(detail.pic1)" alt="">
                                            <div
                                                class="bg-blue rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                {{ detail.action }}    
                                            </div>
                                            <div
                                                class="bg-white rounded-top text-blue position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                {{ detail.category }}    
                                            </div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-blue mb-3"> {{ format(detail.price) }} XOF </h5>
                                            <a class="d-block h5 mb-2" href=""> {{ capitalizeFirstLetter(detail.name) }} </a>
                                            <p><i class="fa fa-map-marker-alt text-blue me-2"></i> {{ detail.location}}</p>
                                        </div>
                                        <div class="d-flex border-top" v-if="detail.category != 'Terrain' && detail.category != 'Boutique'">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-blue me-2"></i>{{detail.people}} ménage{{detail.people > 1 ? 's' : ''}}</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-blue me-2"></i>{{detail.rooms}} chambre{{detail.rooms > 1 ? 's' : ''}}</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-blue me-2"></i>{{detail.bathrooms}} douche{{detail.bathrooms > 1 ? 's' : ''}}</small>
                                        </div>

                                        <div class="d-flex border-top" v-if="detail.category == 'Terrain' || detail.category == 'Boutique'">
                                            <small class="flex-fill text-left border-end py-2"><i class="fa fa-ruler-combined text-blue me-2"></i>{{detail.size}}  m2</small>
                                        </div>

                                    </div>
                                </div>
                </div>


            </div>
        </div>

<?php $content = ob_get_clean(); ?>
           
<?php require './src/view/layout.php'; ?>

<script>
        new Vue({
            el: '#app',
            data: {
                details: [],
                id: <?= json_encode($_GET['id']) ?>,
                ads: []
            },
            mounted(){
                this.displayDetails();
                
            },
            methods: {
                displayDetails(){
                    axios.get('api/script.php?action=getProperty&id=' + this.id)
                    .then((response) => {
                        this.details = response.data;

                        if (this.details.length == 0) {
                            alert('Aucune annonce trouvée, veuillez vérifier l\'URL');
                            window.history.back();
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                      
                    });

                    axios.get('api/script.php?action=availableDatas')
                            .then((response) => {
                                console.log(response.data);
                                this.ads = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
                }, 
                format(num){
                    return new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
                },
                formatDate(date) {
                    const [datePart, timePart] = date.split(' ');
                    const [year, month, day] = datePart.split('-');
                    return `${day}-${month}-${year}`;
                },
                getImgUrl(pic) {
                    return "public/img/" + pic;
                },
                goToProperty(id){
                        window.location.replace('index.php?action=adPage&id='+id);
                    },
                capitalizeFirstLetter(word) {
                    if (!word) return '';
                    return word.charAt(0).toUpperCase() + word.slice(1);
                }
            }
        });
    </script>
</body>

<style>
    .item{
        cursor: pointer;
    }
    img{
        width: 80%;
        height: auto;
        margin: 15px auto;
    }

    li{
        list-style: none;
        padding-left: 30px;
        display: inline;
        margin: 10px;
        
    }

    i{
        font-size: 1.5em;
        font-weight: bold;
        margin: 10px;
    }
   
    .text-facebook{
        color: #0866FF;
    }

    .text-whatsapp{
        color: #27D045;
    }

    .image img {
        height: 230px;
    }

    .content{
        width: 95%;
        margin: auto;
    }
</style>

