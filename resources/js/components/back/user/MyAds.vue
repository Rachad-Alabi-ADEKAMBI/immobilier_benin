<template>
    <section class="container xxl">
        <div class="row" id='myads'>
            <div class='col-sm-12 col-md-10 mx-auto' data-wow-delay="0.5s" v-if='showAll'>
                <h1 class="mx-auto text-center">
                    Mes annonces ({{ details.length }})
                </h1>

                <p class="text text-bold text-grey text-center" v-if='details.length === 0'>
                    Vous n'avez publié aucune annonce pour l'instant
                </p>

               <div class="table mt-3">
                     <div class="table-container" v-if='details.length > 0'>
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Image</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for='detail in paginatedData' :key='detail.id'>
                                <td data-label="Nom">{{ capitalizeFirstLetter(detail.name) }}</td>
                                <td data-label="Image">
                                    <img :src='getImgUrl(detail.pic1)' alt="">
                                </td>
                                <td data-label="Statut">
                                    <p class="text-success" v-if="detail.situation === 'Disponible'">
                                        {{ detail.situation }}
                                    </p>
                                    <p class="text-danger" v-if="detail.situation === 'Stop'">
                                        Désactivé par l'administrateur
                                    </p>
                                    <p class="text-warning" v-if="detail.situation === 'Non disponible'">
                                        {{ detail.situation }}
                                    </p>
                                </td>
                                <td data-label="Actions">
                                    <button class="btn btn-warning m-1 text-white" @click="displayEdit(detail.id)">
                                        <i class="fa fa-pen m1-3 text-white"></i> Modifier
                                    </button>

                                     <button class="btn btn-danger m-1 text-red" @click="displayDelete(detail.id)">
                                        <i class="fa fa-pen m1-3 text-white"></i> Supprimer
                                    </button>

                                     <button class="btn btn-info m-1 text-white" @click="goToProperty(detail.id)">
                                         <i class="fa fa-eye me-3 text-white"></i> Voir
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
               </div>
            </div>

            <div class="col-sm-12 col-md-8 mt-4 mx-auto" v-if='showEdit'>
                <div class="bg-white border mt-2 rounded p-2 wow fadeInUp" data-wow-delay="0.5s"  v-for="detail in details" :key='detail.id'>
                                    <form action="/editAd/" method="POST" >
                                            <span class="mx-0" @click="displayAll()">
                                                <i class="fa fa-times me-3 text-blue"></i>
                                                </span>

                                            <h1 class="mx-auto text-center">Modifier "{{ detail.name }}"</h1>
                                            <div class="row g-3">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-floating">
                                                    <input type="text" class="form-control" id="name" name="name" 
                                                    placeholder="Nom">
                                                        <label for="name">Nom</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-floating">
                                                    <input type="text" class="form-control"  
                                                    name='price' id="price" placeholder="Prix"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                                                        <label for="price">Prix</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 mt-3">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" name='description' 
                                                        id="description" placeholder="Description"></textarea>
                                                        <label for="description">Description</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 mt-3">
                                                @for($i = 0; $i < 11; $i++)
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="form-floating">
                                                            <input type="file" class="form-control" accept=".jpg, .jpeg, .png, image/*"
                                                                name="pic{{ $i }}" id="pic{{ $i }}" placeholder="Photo{{ $i }}">
                                                            <label for="pic{{ $i }}">Photo {{ $i }}</label>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>

                                            

                                            <div class="row g-3 mt-4">
                                                <div class="col-sm-12 col-md-4 mx-auto text-center">
                                                    <button class="btn btn-blue w-100 py-3" type="submit">Valider</button>
                                                </div>
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
            details: [],
            showEdit: false,
            location: '',
            currentPage: 1,
            itemsPerPage: 5
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
            axios.get('/myAdsApi')
                .then((response) => {
                    console.log(response.data);
                    this.details = response.data;
                    this.showAll = true;
                })
                .catch((error) => {
                    console.error(error);
                    alert('Failed to fetch data');
                });
        },
        displayEdit(id) {
            axios.get(`/adApi/${id}`)
                .then((response) => {
                    console.log(response.data);
                    this.details = response.data;
                    this.showAll = false;
                    this.showEdit = true;
                })
                .catch((error) => {
                    console.error(error);
                    alert('Failed to fetch data');
                });
        },
        format(num) {
            return new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
        },
        getImgUrl(pic) {
            return `img/ads/${pic}`;
        },
        pause(id) {
            window.location.replace(`./api/script.php?action=pause&id=${id}`);
        },
        play(id) {
            window.location.replace(`./api/script.php?action=play&id=${id}`);
        },
        remove(id) {
            window.location.replace(`./api/script.php?action=delete&id=${id}`);
        },
        goToProperty(id) {
            window.location.replace(`ad/${id}`);
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
        manage(id) {
            window.location.replace(`index.php?action=managePage&id=${id}`);
        }
    }
};
</script>
