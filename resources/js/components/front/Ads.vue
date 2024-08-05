<template>
    <div class="container xxl">
        <div class="container">
            <!-- Property List Start -->
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-sm-12 col-md-6">
                    <div v-if="showAll" class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mx-auto mb-3">Dernières annonces</h1>
                        <p class="text text-left">Toutes les annonces</p>
                    </div>

                    <div v-if="showToSell" class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mx-auto mb-3">Annonces de vente</h1>
                        <p class="text text-left">Toutes les annonces de vente</p>
                    </div>

                    <div v-if="showToRent" class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mx-auto mb-3">Annonces de location</h1>
                        <p class="text text-left">Toutes les annonces de location</p>
                    </div>

                    <div v-if="showFiltered" class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mx-auto mb-3">Résultats du tri</h1>
                        <p class="text text-left">
                            Annonces avec un prix inférieur à <strong>{{ format(rangeValue) }} XOF</strong>
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item m-1">
                            <button class="btn btn-blue active" @click="displayAll()">Populaires</button>
                        </li>
                        <li class="nav-item m-1">
                            <button class="btn btn-blue" @click="displayToSell()">A vendre</button>
                        </li>
                        <li class="nav-item m-1">
                            <button class="btn btn-blue" @click="displayToRent()">A louer</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row mb-2">
                <div class="options__item">
                    <input type="range" class="mt-2 custom-range" v-model="rangeValue" min="0" max="5000000" @input="filter()" style="color: #8755F1">
                </div>
            </div>
            <div class="">
                <div id="tab-1" class="container" v-if="showAll">
                    <div class="row ads mt-3">
                        <div class="ad" v-for="detail in paginatedData" :key="detail.id" @click="goToProperty(detail.id)">
                            <div class="ad__image">
                                <img :src="getImg(detail.pic1)" alt="appartement a louer a cotonou">
                                <div class="action">{{ detail.action }}</div>
                                <div class="category">{{ detail.category }}</div>
                            </div>
                            <div class="ad__infos">
                                <div class="price">{{ format(detail.price) }} XOF</div>
                                <div class="name">{{ capitalizeFirstLetter(detail.name) }}</div>
                                <div class="more__details">
                                    <div class="location"><i class="bi bi-geo-alt"></i> {{ detail.location }}</div>
                                    <div class="date"><i class="bi bi-calendar"></i> {{ formatDate(detail.created_at) }}</div>
                                </div>
                                <div class="final__details" v-if="detail.category !== 'Terrain' && detail.category !== 'Boutique'">
                                    <div class="detail"><i class="fa-solid fa-users"></i> {{ detail.people }} ménage{{ detail.people > 1 ? 's' : '' }}</div>
                                    <div class="detail"><i class="fa-solid fa-bed"></i> {{ detail.rooms }} chambre{{ detail.rooms > 1 ? 's' : '' }}</div>
                                    <div class="detail"><i class="fa-solid fa-shower"></i> {{ detail.bathrooms }} douche{{ detail.bathrooms > 1 ? 's' : '' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tab-2" class="" v-if="showToSell">
                    <div class="row ads mt-3">
                        <div class="ad" v-for="detail in paginatedData" :key="detail.id" @click="goToProperty(detail.id)">
                            <div class="ad__image">
                                <img :src="getImg(detail.pic1)" alt="appartement a louer a cotonou">
                                <div class="action">{{ detail.action }}</div>
                                <div class="category">{{ detail.category }}</div>
                            </div>
                            <div class="ad__infos">
                                <div class="price"> {{ format(detail.price) }} XOF</div>
                                <div class="name">{{ detail.name }}</div>
                                <div class="more__details">
                                    <div class="location"><i class="bi bi-geo-alt"></i> {{ detail.location }}</div>
                                    <div class="date"><i class="bi bi-calendar"></i> {{ formatDate(detail.created_at )}}</div>
                                </div>
                                <div class="final__details" v-if="detail.category !== 'Terrain' && detail.category !== 'Boutique'">
                                    <div class="detail"><i class="fa-solid fa-users"></i> {{ detail.people }} ménage{{ detail.people > 1 ? 's' : '' }}</div>
                                    <div class="detail"><i class="fa-solid fa-bed"></i> {{ detail.rooms }} chambre{{ detail.rooms > 1 ? 's' : '' }}</div>
                                    <div class="detail"><i class="fa-solid fa-shower"></i> {{ detail.bathrooms }} douche{{ detail.bathrooms > 1 ? 's' : '' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tab-3" class="" v-if="showToRent">
                    <div class="row ads mt-3">
                        <div class="ad" v-for="detail in paginatedData" :key="detail.id" @click="goToProperty(detail.id)">
                            <div class="ad__image">
                                <img :src="getImg(detail.pic1)" alt="appartement a louer a cotonou">
                                <div class="action">{{ detail.action }}</div>
                                <div class="category">{{ detail.category }}</div>
                            </div>
                            <div class="ad__infos">
                                <div class="price">{{ format(detail.price) }} XOF</div>
                                <div class="name">{{ capitalizeFirstLetter(detail.name) }}</div>
                                <div class="more__details">
                                    <div class="location"><i class="bi bi-geo-alt"></i> {{ detail.location }}</div>
                                    <div class="date"><i class="bi bi-calendar"></i> {{ formatDate(detail.created_at) }}</div>
                                </div>
                                <div class="final__details" v-if="detail.category !== 'Terrain' && detail.category !== 'Boutique'">
                                    <div class="detail"><i class="fa-solid fa-users"></i> {{ detail.people }} ménage{{ detail.people > 1 ? 's' : '' }}</div>
                                    <div class="detail"><i class="fa-solid fa-bed"></i> {{ detail.rooms }} chambre{{ detail.rooms > 1 ? 's' : '' }}</div>
                                    <div class="detail"><i class="fa-solid fa-shower"></i> {{ detail.bathrooms }} douche{{ detail.bathrooms > 1 ? 's' : '' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tab-3" class="" v-if="showFiltered">
                    <div class="row ads mt-3">
                        <div class="ad" v-for="detail in filteredItems" :key="detail.id" @click="goToProperty(detail.id)">
                            <div class="ad__image">
                                <img :src="getImg(detail.pic1)" alt="appartement a louer a cotonou">
                                <div class="action">{{ detail.action }}</div>
                                <div class="category">{{ detail.category }}</div>
                            </div>
                            <div class="ad__infos">
                                <div class="price">{{ format(detail.price) }} XOF</div>
                                <div class="name">{{ capitalizeFirstLetter(detail.name) }}</div>
                                <div class="more__details">
                                    <div class="location"><i class="bi bi-geo-alt"></i> {{ detail.location }}</div>
                                    <div class="date"><i class="bi bi-calendar"></i> {{ formatDate(detail.created_at) }}</div>
                                </div>
                                <div class="final__details" v-if="detail.category !== 'Terrain' && detail.category !== 'Boutique'">
                                    <div class="detail"><i class="fa-solid fa-users"></i> {{ detail.people }} ménage{{ detail.people > 1 ? 's' : '' }}</div>
                                    <div class="detail"><i class="fa-solid fa-bed"></i> {{ detail.rooms }} chambre{{ detail.rooms > 1 ? 's' : '' }}</div>
                                    <div class="detail"><i class="fa-solid fa-shower"></i> {{ detail.bathrooms }} douche{{ detail.bathrooms > 1 ? 's' : '' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
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
        <!-- Property List End -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            details: [],
            currentPage: 1,
            itemsPerPage: 5,
            rangeValue: 5000000,
            showAll: true,
            showToSell: false,
            showToRent: false,
            showFiltered: false
        };
    },
    computed: {
        paginatedData() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.details.slice(start, end);
        },
        totalPages() {
            return Math.ceil(this.details.length / this.itemsPerPage);
        },
        filteredItems() {
            return this.details.filter(detail => detail.price < this.rangeValue);
        }
    },
    methods: {
        displayAll() {
             axios.get('availableAdsApi')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
            this.showAll = true;
            this.showToSell = false;
            this.showToRent = false;
            this.showFiltered = false;
            this.currentPage = 1;
        },
        displayToSell() {
             axios.get('availableToSellApi')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
            this.showAll = false;
            this.showToSell = true;
            this.showToRent = false;
            this.showFiltered = false;
            this.currentPage = 1;
        },
        displayToRent() {
             axios.get('availableToRentApi')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
            this.showAll = false;
            this.showToSell = false;
            this.showToRent = true;
            this.showFiltered = false;
            this.currentPage = 1;
        },
        filter() {
            this.showAll = false;
            this.showToSell = false;
            this.showToRent = false;
            this.showFiltered = true;
            this.currentPage = 1;
        },
        format(value) {
            return value.toLocaleString('fr-FR');
        },
        getImg(pic) {
            return pic ? `/img/ads/${pic}` : '/img/logo-immo-remove.png';
        },
        goToProperty(id) {
            window.location.replace('ad/'+id); 
        },
        changePage(page) {
            this.currentPage = page;
        },
          capitalizeFirstLetter(word) {
                        if (!word) return '';
                        return word.charAt(0).toUpperCase() + word.slice(1);
                    },
         formatDate(dateString) {
            const date = new Date(dateString);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based in JavaScript
            const year = date.getFullYear();
            return `${day}-${month}-${year}`;
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
    },
    mounted() {
        this.displayAll();
    }
};
</script>

<style scoped>
.ad {
    cursor: pointer;
}

.ad img {
    width: 100%;
}
</style>
