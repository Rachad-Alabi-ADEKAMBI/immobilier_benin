<template>
    <div class="container xxl">
        <div class="container">
            <!-- advertisers List Start -->
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-sm-6">
                    <div class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s" v-if='showAll'>
                        <h1 class="mx-auto mb-3">Annonceurs</h1>
                        <p class="text text-left">Liste des agents immobiliers</p>
                    </div>

                    <div class="text-start mx-auto text-left mb-5 wow slideInLeft" data-wow-delay="0.1s" v-if='showFiltered'>
                        <h1 class="mx-auto mb-3">Annonceurs</h1>
                        <p class="text text-left">
                            Ville de <strong>{{ location }}</strong>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <select class="form-select border-0 py-3" name="location" required @change="filter">
                        <option value=''>Ville</option>
                        <option value="Abomey">Abomey</option>
                        <option value="Abomey-Calavi">Abomey-Calavi</option>
                        <option value="Cotonou">Cotonou</option>
                        <option value="Bohicon">Bohicon</option>
                        <option value="Grand-popo">Grand-popo</option>
                        <option value="Malanville">Malanville</option>
                        <option value="Natitingou">Natitingou</option>
                        <option value="N'dali">N'dali</option>
                        <option value="Nikki">Nikki</option>
                        <option value="Ouidah">Ouidah</option>
                        <option value="Parakou">Parakou</option>
                        <option value="Porto-Novo">Porto-Novo</option>
                        <option value="Sakété">Sakété</option>
                        <option value="Savè">Savè</option>
                        <option value="Sèmè">Sèmè</option>
                    </select>
                </div>
            </div>
            
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active" v-if='showAll'>
                    <div class="row g-3 advertisers">
                        <div class="fadeInUp advertiser" data-wow-delay="0.1s" v-for="detail in paginatedData"
                            :key='detail.id' @click="goToAdvertiser(detail.id)">
                            <div class="property-item rounded overflow-hidden p-3">
                                <div class="position-relative overflow-hidden text-center">
                                    <img class="advertiser__image"
                                        :src="getImgUrl(detail.profile_photo_path)"
                                        alt="annonces immobilières au Bénin"
                                        @error="handleImgError">
                                </div>
                                <div class="p-4 pb-0">
                                    <h5 class="mb-3"><i class="fa-solid fa-user"></i>
                                        {{ capitalizeFirstLetter(detail.first_name) }}
                                        {{ capitalize(detail.last_name) }}
                                    </h5>
                                    <ul>
                                        <li><i class="bi bi-geo-alt"></i> {{ detail.location }}</li>
                                        <li><i class="bi bi-card-list"></i> {{ detail.ads }} annonce{{ detail.ads > 0 ? 's' : '' }}</li>
                                        <li><i class="bi bi-phone"></i> {{ detail.phone }}</li>
                                    </ul>
                                    <p class="text-center">
                                        {{ truncateText(detail.description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tab-1" class="tab-pane fade show p-0 active" v-if='showFiltered'>
                    <div class="row g-3 advertisers" v-if="filteredItems.length > 0">
                        <div class="fadeInUp advertiser" data-wow-delay="0.1s" v-for="detail in paginatedData"
                            :key='detail.id' @click="goToAdvertiser(detail.id)">
                            <div class="property-item rounded overflow-hidden p-3">
                                <div class="position-relative overflow-hidden text-center">
                                    <img class="advertiser__image"
                                        :src="getImgUrl(detail.profile_photo_path)"
                                        alt="annonces immobilières au Bénin"
                                        @error="handleImgError">
                                </div>
                                <div class="p-4 pb-0">
                                    <h5 class="mb-3"><i class="fa-solid fa-user"></i>
                                        {{ capitalizeFirstLetter(detail.first_name) }}
                                        {{ capitalize(detail.last_name) }}
                                    </h5>
                                    <ul>
                                        <li><i class="bi bi-geo-alt"></i> {{ detail.location }}</li>
                                        <li><i class="bi bi-card-list"></i> {{ detail.ads }} annonce{{ detail.ads > 0 ? 's' : '' }}</li>
                                        <li><i class="bi bi-phone"></i> {{ detail.phone }}</li>
                                    </ul>
                                    <p class="text-center">
                                        {{ truncateText(detail.description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="text-center" v-if="filteredItems.length == 0" >
                            Aucun annonceur trouvé à <strong>{{ location}}</strong>
                    </p>
                </div>

                <!-- Pagination -->
                <div class="row mt" v-if="showAll">
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
    </div>
</template>

<script>
export default {
    name: 'Advertisers',
    props: {
        img_url: String
    },
    data() {
        return {
            details: [],
            showAll: true,
            showFiltered: false,
            currentPage: 1,
            itemsPerPage: 9,
            location: ''
        };
    },
    computed: {
        filteredItems() {
            if (!this.location) return this.details;
            return this.details.filter(detail => detail.location === this.location);
        },
        totalPages() {
            return Math.ceil(this.filteredItems.length / this.itemsPerPage);
        },
        paginatedData() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.filteredItems.slice(start, end);
        }
    },
    mounted() {
        this.displayAll();
    },
    methods: {
        displayAll() {
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
        filter(event) {
            this.location = event.target.value;
            this.showAll = false;
            this.showFiltered = true;
        },
        getImgUrl(pic) {
            return pic ? `img/users/${pic}` : 'img/logo-immo.png';
        },
        goToAdvertiser(id) {
            window.location.replace(`advertiser/${id}`);
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
        },
        capitalize(word) {
            if (!word) return '';
            return word.toUpperCase();
        },
        truncateText(text, length = 50) {
            if (!text) return '';
            return text.length > length ? text.substring(0, length) + '...' : text;
        },
        handleImgError(event) {
            event.target.src = 'img/logo-immo.png';
        }
    }
};
</script>

