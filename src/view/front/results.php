<?php $title = "Immobilier Bénin - Résultats"; ?>
     
<?php ob_start(); ?>
<?php include 'search.php'; ?>

    <div class="container" id="ap">
              <div class="container">
                    <!-- Property List Start -->
                    <div class="row g-0 gx-5 align-items-end">
                        <div class="col-sm-6 ">
                            <div class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s" v-if='showAll'>
                                <h1 class="mx-auto mb-3">Résultats de la recherche</h1>
                                <p class="text text-left">Des dizaines d'annonces gratuites chaque jour</p>
                            </div>
                            <div class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s" v-if='showFiltered'>
                                <h1 class="mx-auto mb-3">Résultats du tri</h1>
                                <p class="text text-left">
                                    Annonces avec un prix inférieur à
                                    {{ format(rangeValue) }} F CFA
                                </p>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row mb-2">
                        <div class="options__item">
                            <input type="range" class="mt-2 custom-range"  v-model="rangeValue" min="0"
                            max="10000000"  @click="filter()" style='color: #00B98E;'>
                       </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0  active" v-if='showAll'>
                            <div class="row g-4" >
                                <div class="col-lg-4 col-md-6 wow fadeInUp item" data-wow-delay="0.1s " v-for='detail in details' 
                                    :key='detail.id'>
                                    <div class="property-item rounded overflow-hidden" @click='goToProperty(detail.id)'>
                                        <div class="position-relative overflow-hidden">
                                                <img class="img-fluid" :src="getImg(detail.pic1)" alt="">
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
                                        <div class="d-flex border-top" v-if="detail.category != 'Terrain' && detail.category != 'Boutique'">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{detail.people}} ménage{{detail.people > 1 ? 's' : ''}}</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{detail.rooms}} chambre{{detail.rooms > 1 ? 's' : ''}}</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{detail.bathrooms}} douche{{detail.bathrooms > 1 ? 's' : ''}}</small>
                                        </div>

                                        <div class="d-flex border-top" v-if="detail.category == 'Terrain' || detail.category == 'Boutique'">
                                            <small class="flex-fill text-left border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{detail.size}}  m2</small>
                                        </div>

                                    </div>
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
                el: '#ap',
                data: {
                    details: '',
                    showAll: false,
                    showToRent: false,
                    showToSell: false,
                    rangeValue: '', 
                    showFiltered: false
                },
                mounted(){
                    this.displayAll();
                },
                computed: {
                    filteredItems() {
                        return this.details.filter(detail => {
                            return detail.price <= this.rangeValue;
                        });
                        },
                },
                methods: {
                    displayAll(){
                        this.showAll = true;
                        this.showFiltered = false;
                        axios.get('api/script.php?action=availableDatas')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
                    },
                    filter(){
                        this.showAll = false;
                        this.showFiltered = true;
                    },

                    format(num){
                        let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
                            return res;
                    },
                    formatDate(da) {
                        const [datePart, timePart] = da.split(' ');
                        const [year, month, day] = datePart.split('-');
                        return `${day}-${month}-${year}`;
                        },
                    getImgUrl(pic) {
                        return "public/img/" + pic;
                    },
                    getImg(pic) {
                        return "public/img/" + pic;
                    },
                    goToProperty(id){
                        window.location.replace('index.php?action=adPage&id='+id);
                    }
                }
            });
    </script>

    <style>
    .item{
            cursor: pointer;
        }

        .custom-range {
        -webkit-appearance: none; /* Override default CSS styles */
        appearance: none;
        width: 50%; /* Full-width */
        height: 15px; /* Specified height */
        background: #ddd; /* Grey background */
        outline: none; /* Remove outline */
        opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
        transition: opacity .2s; /* 0.2 seconds transition on hover */
        margin-bottom: 20px;
        }

        .custom-range::-webkit-slider-thumb {
        -webkit-appearance: none; /* Override default look */
        appearance: none;
        width: 25px; /* Set a specific slider handle width */
        height: 25px; /* Slider handle height */
        background: #00B98E; /* Green background */
        cursor: pointer; /* Cursor on hover */
        }

        .custom-range::-moz-range-thumb {
        width: 25px; /* Set a specific slider handle width */
        height: 25px; /* Slider handle height */
        background: #00B98E; /* Green background */
        cursor: pointer; /* Cursor on hover */
        }

        .custom-range::-webkit-slider-runnable-track {
        background: linear-gradient(to right, #00B98E 0%, #00B98E var(--range-progress), #ddd var(--range-progress), #ddd 100%);
        }

        .custom-range::-moz-range-progress {
        background-color: #00B98E; /* Color of the filled part */
        }

        .custom-range::-moz-range-track {
        background-color: #ddd; /* Color of the unfilled part */
        }

        .custom-range::-ms-fill-lower {
        background-color: #00B98E; /* Color of the filled part */
        }

        .custom-range::-ms-fill-upper {
        background-color: #ddd; /* Color of the unfilled part */
        }

        img{
            width: 320px;
        }
    </style>