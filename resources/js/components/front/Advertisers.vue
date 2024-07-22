<template>
    <div class="container xxl">
              <div class="container">
                    <!-- advertisers List Start -->
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
                                    <strong>{{ format(rangeValue) }} XOF</strong>
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

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0  active" v-if='showAll'>
                            <div class="row g-4" >
                                <div class="col-lg-4 col-md-6 wow fadeInUp item ad" data-wow-delay="0.1s " v-for="detail in paginatedData"
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

                        <div id="tab-0" class="tab-pane fade show p-0 active" v-if='showFiltered'>
                            <div class="row g-4" >
                                <div class="col-lg-4 col-md-6 wow fadeInUp item ad" data-wow-delay="0.1s" v-for='detail in filteredItems' 
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

                    <!--pagination-->
                     <div class="row mt">
                                <div class="col-12 text-center">
                                    <nav aria-label="Page navigation mx-auto">
                                        <ul class="pagination">
                                            <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
                                            <a class="page-link" href="#" @click.prevent="previousPage">Précédent</a>
                                            </li>
                                            <li class="page-item" v-for="page in totalPages" :key="page" :class="{ 'active': page === currentPage }">
                                            <a class="page-link" href="#" @click.prevent="gotoPage(page)">{{ page }}</a>
                                            </li>
                                            <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                                            <a class="page-link" href="#" @click.prevent="nextPage">Suivant</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
            </div>
    </div>
</template> 
 

 <script>
    export default {
        name: 'Advertisers',
        props: {
        img_url: String
        }
        ,
      data() {
        return {
            details: '',
                    showAll: false,
                    showFilterd: false,
                    currentPage: 1,
                    itemsPerPage: 9,
        };
      },
       computed: {
                    filteredItems() {
                        return this.details.filter(detail => {
                            return detail.price <= this.rangeValue;
                        });
                        },
                    totalPages() {
                            return Math.ceil(this.details.length / this.itemsPerPage);
                            },
                    paginatedData() {
                            const start = (this.currentPage - 1) * this.itemsPerPage;
                            const end = start + this.itemsPerPage;
                            return this.details.slice(start, end);
                            }
                },
            
        mounted(){
                    this.displayAll();
            },

      methods: {
                    displayAll(){
                        this.showAll = true;
                        this.showFiltered = false;
                        axios.get('advertisersApi')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                            });
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
                        return "img/ads/" + pic;
                    },
                    goToProperty(id){
                        window.location.replace('ad/'+id);
                    },
                    previousPage() {
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
                    capitalizeFirstLetter(word) {
                        if (!word) return '';
                        return word.charAt(0).toUpperCase() + word.slice(1);
                    }
                }
    };
</script>