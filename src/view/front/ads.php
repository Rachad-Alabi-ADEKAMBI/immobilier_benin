<?php $title = "Immobilier Bénin - Annonces"; ?>
     
<?php ob_start(); ?>
<?php include 'search.php'; ?>

    <div class="container" id="ap">
              <div class="container">
                    <!-- Property List Start -->
                    <div class="row g-0 gx-5 align-items-end">
                        <div class="col-sm-6 ">
                            <div class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s" v-if='showAll'>
                                <h1 class="mx-auto mb-3">Dernières annonces</h1>
                                <p class="text text-left">Des dizaines d'annonces gratuites chaque jour</p>
                            </div>

                            <div class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s" v-if='showToSell'>
                                <h1 class="mx-auto mb-3">Annonces de vente</h1>
                                <p class="text text-left">Des dizaines d'annonces gratuites chaque jour</p>
                            </div>

                            <div class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s" v-if='showToRent'>
                                <h1 class="mx-auto mb-3">Annonces de location</h1>
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
                        <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                            <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                                <li class="nav-item me-2">
                                    <p class="btn btn-blue active" data-bs-toggle="pill"
                                       @click="displayAll()">Populaires
                                    </p>
                                </li>
                                <li class="nav-item me-2">
                                    <p class="btn btn-blue"  @click="displayToSell()"
                                     data-bs-toggle="pill" >A vendre</p>
                                </li>
                                <li class="nav-item me-0">
                                    <p class="btn btn-blue" data-bs-toggle="pill"
                                     @click="displayToRent()">A louer</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="options__item">
                            <input type="range" class="mt-2 custom-range"  v-model="rangeValue" min="0"
                            max="10000000"  @click="filter()" style='color: #8755F1'>
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
                                                class="bg-blue rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                {{ detail.action }}    
                                            </div>
                                            <div
                                                class="bg-white rounded-top text-blue position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                {{ detail.category }}    
                                            </div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-blue mb-3"> {{ format(detail.price) }} F CFA </h5>
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

                                <div class="col-lg-4 col-md-6">
                                    <nav aria-label="Page navigation mx-auto">
                                        <ul class="pagination">
                                            <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
                                            <a class="page-link" href="#" @click.prevent="prevPage">Previous</a>
                                            </li>
                                            <li class="page-item" v-for="page in totalPages" :key="page" :class="{ 'active': page === currentPage }">
                                            <a class="page-link" href="#" @click.prevent="gotoPage(page)">{{ page }}</a>
                                            </li>
                                            <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                                            <a class="page-link" href="#" @click.prevent="nextPage">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div id="tab-2" class="tab-pane fade show p-0 active " v-if='showToSell'>
                            <div class="row g-4" >
                                <div class="col-lg-4 col-md-6 wow fadeInUp item" data-wow-delay="0.1s" v-for='detail in details' 
                                    :key='detail.id'>
                                    <div class="property-item rounded overflow-hidden" @click='goToProperty(detail.id)'>
                                        <div class="position-relative overflow-hidden">
                                                <img class="img-fluid" :src="getImg(detail.pic1)" alt="">
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
                                            <h5 class="text-blue mb-3"> {{ format(detail.price) }} F CFA </h5>
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

                        <div id="tab-3" class="tab-pane fade show p-0 active" v-if='showToRent'>
                            <div class="row g-4" >
                                <div class="col-lg-4 col-md-6 wow fadeInUp item" data-wow-delay="0.1s" v-for='detail in details' 
                                    :key='detail.id'>
                                    <div class="property-item rounded overflow-hidden" @click='goToProperty(detail.id)'>
                                        <div class="position-relative overflow-hidden">
                                                <img class="img-fluid" :src="getImg(detail.pic1)" alt="">
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
                                            <h5 class="text-blue mb-3"> {{ format(detail.price) }} F CFA </h5>
                                            <a class="d-block h5 mb-2" href=""> {{ detail.description }} </a>
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

                        <div id="tab-0" class="tab-pane fade show p-0 active" v-if='showFiltered'>
                            <div class="row g-4" >
                                <div class="col-lg-4 col-md-6 wow fadeInUp item" data-wow-delay="0.1s" v-for='detail in filteredItems' 
                                    :key='detail.id'>
                                    <div class="property-item rounded overflow-hidden" @click='goToProperty(detail.id)'>
                                        <div class="position-relative overflow-hidden">
                                                <img class="img-fluid" :src="getImg(detail.pic1)" alt="">
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
                                            <h5 class="text-blue mb-3"> {{ format(detail.price) }} F CFA </h5>
                                            <a class="d-block h5 mb-2" href=""> {{ detail.description }} </a>
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
                    showFiltered: false,
                    length: 0,
                    currentPage: 1,
                    pageSize: 3, // Number of items per page
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
                    paginatedData() {
                    const startIndex = (this.currentPage - 1) * this.pageSize;
                    const endIndex = startIndex + this.pageSize;
                    return this.details.slice(startIndex, endIndex);
                    },
                    totalPages() {
                        return Math.ceil(this.details.length / this.pageSize);
                    },
                },
                watch: {
                        category() {
                        if (this.category == 'Terrain') {
                            this.showLand = true;
                            this.showHouse = false;
                        } else{
                            this.showLand = false;
                            this.showHouse = true;
                        }
                        }
                    },  
                methods: {
                    displayAll(){
                        this.showAll = true;
                        this.showToSell = false;
                        this.showToRent = false;
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
                    displayToRent(){
                        this.showAll = false;
                        this.showToSell = false;
                        this.showToRent = true;
                        this.showFiltered = false;
                        axios.get('api/script.php?action=toRent')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
                    },
                    displayToSell(){
                        this.showAll = false;
                        this.showToSell = true;
                        this.showToRent = false;
                        this.showFiltered = false;
                        axios.get('api/script.php?action=toSell')
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
                        this.showToSell = false;
                        this.showToRent = false;
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
                    },
                    prevPage() {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                    }
                        },
                        nextPage() {
                            if (this.currentPage < this.totalPages) {
                                this.currentPage++;
                            }
                        },
                        gotoPage(page) {
                            this.currentPage = page;
                        },
                        }
            });
    </script>

    <style>
        .btn-blue{
            a{
                color: white;
            }
        }
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
        background: #8755F1; /* Green background */
        cursor: pointer; /* Cursor on hover */
        }

        .custom-range::-moz-range-thumb {
        width: 25px; /* Set a specific slider handle width */
        height: 25px; /* Slider handle height */
        background: #8755F1; /* Green background */
        cursor: pointer; /* Cursor on hover */
        }

        .custom-range::-webkit-slider-runnable-track {
        background: linear-gradient(to right, #8755F1 0%, #8755F1 var(--range-progress), #ddd var(--range-progress), #ddd 100%);
        }

        .custom-range::-moz-range-progress {
        background-color: #8755F1; /* Color of the filled part */
        }

        .custom-range::-moz-range-track {
        background-color: #ddd; /* Color of the unfilled part */
        }

        .custom-range::-ms-fill-lower {
        background-color: #8755F1; /* Color of the filled part */
        }

        .custom-range::-ms-fill-upper {
        background-color: #ddd; /* Color of the unfilled part */
        }

        img{
            width: 320px;
        }
    </style>