<template>
    <section class="container xxl mt-0">
        <div class="row " id='myads'>
            <div class='col-sm-12 col-md-12 mx-auto' id='pageTop' data-wow-delay="0.5s" v-if='showAll'>
                <h1 class="mx-auto text-center">
                    Toutes les annonces ({{ details.length }})
                </h1>

                <div class="mt-2 table-container" v-if='details.length > 0'>
                    <div class="mt-3 mx-auto">
                        <div class="table-responsive-sm mt-2">
                            <table class="table table-bordered table-striped table-hover mx-auto text-center">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Image</th>
                                        <th>Annonceur</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='detail in paginatedData' :key='detail.id'>
                                        <td data-label="Nom">{{ capitalizeFirstLetter(detail.name) }}</td>
                                        <td data-label="Image">
                                            <img :src='getImgUrl(detail.pic1)' alt="annonces immobilieres au benin">
                                        </td>
                                        <td data-label="Annonceur">{{ capitalizeFirstLetter(detail.user_first_name) }} {{ capitalizeFirstLetter(detail.user_last_name) }}</td>
                                        <td data-label="Statut">
                                            <p class="text-success" v-if="detail.situation === 'Disponible'">
                                                {{ detail.situation }}
                                            </p>
                                        </td>
                                        <td data-label="Actions">
                                            <button class="btn btn-warning m-1 text-white" @click="displayPause(detail.id)">
                                                <i class="fa fa-pause m-1 text-white"></i> Pause
                                            </button>
                                            <button class="btn btn-info m-1 text-white" @click="goToProperty(detail.id)">
                                                <i class="fa fa-eye m-1 text-white"></i> Voir
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-8 mx-auto" v-if="showPause">
                <div class="card p-3">
                    <form @submit.prevent="submit">
                        <span class="mx-auto bold" @click="displayAll()">
                                <i class="fa fa-times me-3 mx-auto text-blue"></i>
                        </span>

                        <h2>Mise en pause de l'annonce</h2>
                        <p>{{ selectedDetail.name }}</p>
                        <label for="reason">Motif <span class="red">*</span></label>
                        <textarea class="form-control" v-model="reason" id="reason" placeholder="Motif" required></textarea>
                        <button class="btn btn-success mt-3" type="submit">Mettre en pause</button>
                    </form>
                </div>
            </div>

            <div class="col-12 text-center" v-if="showAll">
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
    </section>
</template>

 

<script>
export default {
    name: 'AllAds',
    props: {
        img_url: String
    },
    data() {
        return {
            showAll: false,
            showPause: false,
            reason: '',
            details: [],
            selectedDetail: null,
            currentPage: 1,
            itemsPerPage: 5,
        };
    },
    mounted() {
        this.displayAll();
    },
    computed: {
        totalPages() {
            return Math.ceil(this.details.length / this.itemsPerPage);
        },
        paginatedData() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.details.slice(start, end);
        }
    },
    methods: {
        displayAll() {
            axios.get('/allAdsApi')
                .then((response) => {
                    this.details = response.data;
                    this.showAll = true;
                    this.showPause = false;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        displayPause(id) {
            this.selectedDetail = this.details.find(detail => detail.id === id);
            this.showAll = false;
            this.showPause = true;
        },
        submit() {
            if (!this.selectedDetail) return; // Ensure there's a selected detail
            const formData = new FormData();
            formData.append('reason', this.reason);
            formData.append('id', this.selectedDetail.id);

            axios.post('/pauseAdApi', formData)
                .then(response => {
                    alert('Annonce mise en pause !');
                    this.displayAll();
                })
                .catch(error => {
                    console.error('Form submission error', error);
                });
        },
        format(num) {
            return new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
        },
        formatDate(da) {
            const [datePart] = da.split(' ');
            const [year, month, day] = datePart.split('-');
            return `${day}-${month}-${year}`;
        },
        getImgUrl(pic) {
            return "img/ads/" + pic;
        },
        goToProperty(id) {
            window.location.replace('ad/' + id);
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
    .table{
        margin: auto;
    }
</style>
