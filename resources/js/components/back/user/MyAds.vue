<template>
    <section class="container xxl">
        <div class="row" id='myads'>
            <div class='col-sm-12 col-md-12 mx-auto' data-wow-delay="0.5s" >
                <h1 class="mx-auto text-center" v-if='showAll'>
                    Mes annonces ({{ details.length }})
                </h1>

                 <h1 class="mx-auto text-center" v-if='showFiltered'>
                   Résultas de la recherche ({{ filteredResults.length }})
                </h1>

                <div class="table-top">
                    <a class="btn btn-success new" href="/newAd">
                        <i class="bi bi-plus-circle"></i> Nouvelle annonce
                    </a>
                    <div class="search-menu">
                        <input type="search" v-model="searchKey" @input="handleInput">
                        <span class="ml-2 open" v-if="!isSearching">
                            <i class="bi bi-search"></i>
                        </span>
                        <span @click="clearSearch" class="close" v-if="isSearching">
                            <i class="bi bi-x"></i>
                        </span>
                    </div>
                </div>

                <p class="text text-bold text-grey text-center" v-if='showAll && details.length === 0'>
                    Vous n'avez publié aucune annonce pour l'instant
                </p>

                 <p class="text text-bold text-grey text-center" v-if='showFiltered && filteredResults.length === 0'>
                    Aucun résultat
                </p>
   
               <div class="table mt-0 mx-auto text-left" v-if="showAll">
                    <div class="table-responsive mt-1" v-if="details.length > 0">
                        <table class="table table-bordered table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="detail in paginatedData" :key="detail.id">
                                    <td data-label="Id">{{ detail.id }}</td>
                                    <td data-label="Nom">{{ capitalizeFirstLetter(detail.name) }}</td>
                                    <td data-label="Prix">{{ format(detail.price) }} XOF</td>
                                    <td data-label="Statut">
                                        <p class="text-success" v-if="detail.situation === 'Disponible'">
                                            {{ detail.situation }}
                                        </p>
                                        <p class="text-danger" v-if="detail.situation === 'Stop'">
                                            Désactivé par l'administrateur <br>
                                            Motif: <span>{{ detail.reason }}</span>
                                        </p>
                                        <p class="text-warning" v-if="detail.situation === 'Non disponible'">
                                            {{ detail.situation }}
                                        </p>
                                    </td>
                                    <td data-label="Actions">
                                        <button class="btn btn-warning m-1 text-white" @click="displayEdit(detail.id)">
                                            <i class="fa fa-pen m-1 text-white"></i> Modifier
                                        </button>
                                        <button class="btn btn-danger m-1" @click="displayDelete(detail.id)">
                                            <i class="fa fa-trash m-1 text-white"></i> Supprimer
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


                <div class="table mt-0 mx-auto text-left" v-if="showFiltered && filteredResults.length > 0 ">
                     <div class="table-responsive mt-1" >
                    <table class="table table-bordered table-striped table-hover mx-auto text-center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='detail in filteredResults' :key='detail.id'>
                                <td data-label='Id'>{{detail.id }}</td>
                                <td data-label="Nom">{{ capitalizeFirstLetter(detail.name) }}</td>
                                <td data-label="Prix">
                                    {{ format(detail.price) }} XOF
                                </td>
                                <td data-label="Statut">
                                    <p class="text-success" v-if="detail.situation === 'Disponible'">
                                        {{ detail.situation }}
                                    </p>
                                    <p class="text-danger" v-if="detail.situation === 'Stop'">
                                        Désactivé par l'administrateur <br>
                                        Motif: <span>{{detail.reason    }}</span>
                                    </p>
                                    <p class="text-warning" v-if="detail.situation === 'Non disponible'">
                                        {{ detail.situation }}
                                    </p>
                                </td>
                                <td data-label="Actions">
                                    <button class="btn btn-warning m-1 text-white" @click="displayEdit(detail.id)">
                                        <i class="fa fa-pen m-1 text-white"></i> Modifier
                                    </button>

                                     <button class="btn btn-danger m-1 text-red" @click="displayDelete(detail.id)">
                                        <i class="fa fa-trash m-1 text-white"></i> Supprimer
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

             <div class="col-12 text-center" v-if="showAll && details.length > 0">
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

            <div class="col-sm-12 col-md-8 mt-4 mx-auto" v-if='showEdit'>
                <div class="bg-white border mt-2 rounded p-2 wow fadeInUp">
                    <form @submit.prevent="updateAd" enctype="multipart/form-data">
                        <span class="mx-0" @click="displayAll()">
                            <i class="fa fa-times me-3 text-blue"></i>
                        </span>

                        <h1 class="mx-auto text-center">Modifier annonce</h1>
                        <div class="row g-3">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-floating">

                                <input type="hidden" v-model="currentDetail.id">

                                 <label for="name">Nom</label>
                                    <input type="text" class="form-control" v-model="currentDetail.name" id="name" placeholder="Nom">
                                   
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-floating">
                                <label for="price">Prix</label>
                                    <input type="text" class="form-control" v-model="currentDetail.price" id="price" placeholder="Prix"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mt-3">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating">
                                 <label for="description">Description</label>
                                    <textarea class="form-control" v-model="currentDetail.description" id="description" placeholder="Description"></textarea>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mt-3">
                                        <!-- Only the first image is required -->
                                        <div class="col-sm-6 col-md-3">
                                        <label for="pic1">Photo 1</label>
                                        <div class="form-floating">
                                            <input type="file" class="form-control" 
                                            accept=".jpg, .jpeg, .png, image/*" name="pic1" id="pic1" 
                                            placeholder="Photo1">
                                        </div>
                                        </div>
                                        <!-- Start at the second image but not required -->
                                        <div class="col-sm-6 col-md-3" v-for="i in 9" :key="i + 1">
                                        <label :for="'pic' + (i + 1)">Photo {{ i + 1 }}</label>
                                        <div class="form-floating">
                                            <input type="file" class="form-control" 
                                            accept=".jpg, .jpeg, .png, image/*" :name="'pic' + (i + 1)" :id="'pic' + (i + 1)" placeholder="Photo {{ i + 1 }}">
                                        </div>
                                        </div>
                        </div>

                        <div class="row g-3 mt-3">
                            <div class="col-sm-4 col-md-6">
                                <label for="location">Le bien est'il disponible actuellement ?</label>
                                    <div class="">
                                        <select class="" id="availability"
                                                 v-model="availability" >
                                            <option selected value="yes">Oui</option>
                                            <option value="no">Non</option>
                                        </select>
                                    </div>
                            </div>
                        </div>

                        

                        <div class="row g-3 mt-4">
                            <div class="col-sm-12 col-md-4 mx-auto text-center">
                                <button class="btn btn-blue w-100 py-3" type="submit">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

             <div class="col-sm-12 col-md-8 mt-4 mx-auto" v-if="showDelete">
                <div class="bg-white border mt-2 rounded p-sm-3 m-3 p-3 wow">
                    <form @submit.prevent="deleteAd" class="p-3">
                        <h1 class="mx-auto text-center">Suppression de l'annonce</h1>

                        <div class="row g-3 mt-2">
                            <p class="text text-grey">
                               Souhaitez-vous réellement supprimer cette annonce ? <br>
                               Attention, cette action est irréversible.
                            </p>
                        </div>

                        <div class="row-sm-12 col-md-8 mx-auto text-center">
                            <button class="btn btn-primary m-2" @click="displayAll">Non</button>
                            <button class="btn btn-danger m-2" type="submit">Oui, supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';

export default {
    name: 'MyAds',
    props: {
        img_url: String
    },
    data() {
        return {
            showNew: false,
            showAll: false,
            showDelete: false,
            showEdit: false,
            details: [],
            currentDetail: {},
            currentId: '',
            currentPage: 1,
            itemsPerPage: 5,
            searchKey: '',
            isSearching: false,
            showFiltered: false,
            availability: 'yes'
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
        },
        filteredResults() {
            if (!this.searchKey) {
                return [];
            }
            return this.details.filter(detail =>
                detail.name.toLowerCase().includes(this.searchKey.toLowerCase())
            );
        }
    },
    watch: {
        searchKey(newVal) {
            if (newVal === '') {
                this.showAll = true;
                this.showFiltered = false;
            } else {
                this.showAll = false;
                this.showFiltered = true;
            }
        }
    },
    methods: {
        displayAll() {
            axios.get('/myAdsApi')
                .then((response) => {
                    this.details = response.data;
                    this.showAll = true;
                    this.showDelete = false;
                    this.showEdit = false;
                    this.showFiltered = false;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        displayEdit(id) {
            this.currentId = id;
            this.showEdit = true;
            this.showFiltered = false;
            this.showAll = false;
            this.showDelete = false;
            axios.get(`/adApi/${id}`)
                .then((response) => {
                    this.currentDetail = response.data;
                    this.showAll = false;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        displayDelete(id) {
            this.currentId = id;
            this.showDelete = true;
            this.showAll = false;
            this.showEdit = false;
            this.showFiltered = false;
        },
        updateAd() {
            if (!this.currentDetail) return;

            const formData = new FormData();
            formData.append('name', this.currentDetail.name);
            formData.append('price', this.currentDetail.price);
            formData.append('description', this.currentDetail.description);
            formData.append('id', this.currentDetail.id);
            formData.append('availability', this.availability);

            for (let i = 1; i <= 11; i++) {
                const fileInput = document.getElementById('pic' + i);
                if (fileInput && fileInput.files.length > 0) {
                    formData.append('pic' + i, fileInput.files[0]);
                }
            }

            axios.post('/updateAdApi', formData)
                .then(response => {
                    alert('Annonce mise à jour !');
                    this.displayAll();
                    window.location.replace('#top');
                })
                .catch(error => {
                    console.error('Form submission error', error);
                });
        },
        deleteAd() {
            axios.delete(`/deleteAdApi/${this.currentId}`)
                .then((response) => {
                    alert('Annonce supprimée avec succès');
                    this.displayAll();
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        format(num) {
            return new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
        },
        getImgUrl(pic) {
            return `img/ads/${pic}`;
        },
        goToProperty(id) {
            window.location.replace(`ad/${id}`);
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
        },
        handleInput() {
            this.isSearching = !!this.searchKey;
            this.showAll = false;
            this.showFiltered = true;
        },
        clearSearch() {
            this.searchKey = '';
            this.isSearching = false;
            this.showAll = true;
            this.showFiltered = false;
        }
    }
};
</script>


<style scoped>
    .table{
        margin: auto;
    }
</style>
