<template>
   <div class="container-xxl p">
            <div class="container" v-for='detail in details' :key='detail.id'>

                <div class="row">
                    <div class="col">
                        <h1 class="text-center">
                            {{ detail.first_name }} {{ detail.last_name }}
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 mx-auto text-center">
                        <img :src="getImgUrl(detail.pic)" alt="annonceur immobilier benin" class="image">
                    </div>
                </div>

            
                <div class="row">
                    <div class="col-12 text-center">
                        <p>
                                {{ detail.description }} 
                                 <br> <i class="bi bi-phone text-blue"></i> {{ detail.phone }} 
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-8 mx-auto ">
                        <p class="text text-blue text-bold text-center">
                        {{ detail.ads }} annonce{{ detail.ads > 0 ? 's' : '' }}
                        </p>
                    </div>
                </div>

                <div class="row mt-2" >
                                <div class="col-lg-4 col-md-6 wow fadeInUp item ad" data-wow-delay="0.1s "
                                 v-for="detail in ads"
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
                <div class="row">
                    <div class="col-sm-12 col-md-8 mt-3 mx-auto text-center">
                        <p>
                            Partager: <br>
                                <a href="https://wa.me/?text=bitly.com?action=advertiserPage&id=<?=$_GET['id']?>)">
                                <i class="fab fa-whatsapp text-whatsapp m-1"></i>
                                </a>

                                <a href="https://www.facebook.com/share.php?u=bitly.com?action=advertiserPage&id=<?=$_GET['id']?>" target="_blank">
                                <i class="fab fa-facebook text-facebook m-1"></i>
                                </a>

                        </p>
                        </div>
                    </div>
                </div>
            </div>
        
</template> 
 

 <script>
    export default {
        name: 'Advertiser',
        props: {
        img_url: String
        }
        ,
      data() {
        return {
             details: [],
                ads: [],
               id: 3,
            showAll: false,
            showFilterd: false,
            currentPage: 1,
            itemsPerPage: 5,
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
                        axios.get('/advertiserApi/3')
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
                        return "img/users/" + pic;
                    },
                    goToProperty(id){
                        window.location.replace('ad/'+id);
                    },
                    previousPage() {
                        if (this.currentPage > 1) {
                            this.currentPage--;
                            window.scrollTo({ top: 0, behavior: 'smooth' });
                        }
                    },
                    nextPage() {
                        if (this.currentPage < this.totalPages) {
                            this.currentPage++;
                            window.scrollTo({ top: 0, behavior: 'smooth' });
                        }
                    },
                    gotoPage(page) {
                        this.currentPage = page;
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    },
                    capitalizeFirstLetter(word) {
                        if (!word) return '';
                        return word.charAt(0).toUpperCase() + word.slice(1);
                    }
                }
    };
</script>

<style scoped>
    .user_image{
        width: 120px;
        height: 120px;
        border-radius: 90px;
    }
</style>