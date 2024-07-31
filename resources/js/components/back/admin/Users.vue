<template>
    <section class="container xxl">
            <div class='col-sm-12 col-md-12  mt-4 mx-auto' data-wow-delay="0.5s" v-if='showAll'>
                            <div class='col-12 mt-4 mx-auto data-wow-delay="0.5s"' >
                         <h1 class="mx-auto text-center">
                            Utilisateurs ({{details.length}})
                         </h1>
                         
                         <div class="table mx-auto">
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover mx-auto text-center">
                                    <thead>
                                                            <tr>
                                                            <th scope="col">Date</th>
                                                             <th scope="col">Nom</th>
                                                            <th scope='col'>Photo</th>
                                                            <th scope='col'>Annonces</th>
                                                            </tr>
                                    </thead>    
                                                        <tbody>
                                                            <tr v-for='detail in paginatedData' :key='detail.id'>
                                                            <td data-label="Date">{{ formatDate(detail.created_at) }}</td>
                                                            <td data-label="Full name">{{ capitalizeFirstLetter(detail.first_name) }} {{ capitalize(detail.last_name) }}  </td>
                                                             <td data-label="Photo">
                                                            <img :src='getImgUrl(detail.profile_photo_path)'  v-if="detail.profile_photo_path" alt="utilisateur immobilier benin">
                                                            <p class="text-danger" v-if="!detail.profile_photo_path">
                                                                Non renseigné
                                                            </p>
                                                            </td>
                                                            <td data-label="Annonces" >{{ detail.ads }}</td>
                                                           
                                                            <td data-label="">

                                                <button class="btn btn-danger m-1 text-white" @click="displayBan(detail.id)">
                                                    <i class="fa fa-trash m1-3 text-white "></i> Bannir
                                                </button>
                                            </td>
                                                            </tr>
                                                        </tbody>
                                </table>
                        </div> 
                        </div>
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

            <div class="col-sm-12 col-md-8 mx-auto" v-if="showBan">
                <div class="card p-3">
                    <form @submit.prevent="ban">
                        <span class="mx-auto bold" @click="displayAll()">
                                <i class="fa fa-times me-3 mx-auto text-blue"></i>
                        </span>

                        <h2>Bannir un utilisateur</h2>
                        <p>{{ capitalizeFirstLetter(selectedDetail.first_name) }} {{ capitalizeFirstLetter(selectedDetail.last_name) }}</p>
                        <label for="reason">Motif <span class="red">*</span></label>
                        <textarea class="form-control" v-model="reason" id="reason" placeholder="Motif" required></textarea>
                        <button class="btn btn-success mt-3" type="submit">Bannir</button>
                    </form>
                </div>
            </div>
    </section>
</template> 
 

 <script>
    export default {
        name: 'Users',
        props: {
        img_url: String
        }
        ,
      data() {
        return {
             showNew: false,
                    showAll: false,
                    details: [],
                    showBan: false,
                    reason: '',
                    selectedDetail: null,
                    location: '',
                    currentPage: 1,
                    itemsPerPage: 5,
        };
      },
        mounted(){
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
                    displayAll(){
                        axios.get('/usersApi')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                            });
                        
                            this.showAll = true;
                            this.showBan = false;
                    },
                    format(num){
                        let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
                            return res;
                    },
    formatDate(dateString) {
            const date = new Date(dateString);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based in JavaScript
            const year = date.getFullYear();
            return `${day}-${month}-${year}`;
        },
                    getImgUrl(pic) {
                        return "img/users/" + pic;
                    },
                    displayBan(id){
                        this.selectedDetail = this.details.find(detail => detail.id === id);
                       this.showBan = true;
                       this.showAll = false;
                    },
                     ban() {
            if (!this.selectedDetail) return; // Ensure there's a selected detail
            const formData = new FormData();
            formData.append('reason', this.reason);
            formData.append('id', this.selectedDetail.id);

            axios.post('/banUserApi', formData)
                .then(response => {
                    alert('Cet utilisateur a été banni !');
                    this.displayAll();
                })
                .catch(error => {
                    console.error('Form submission error', error);
                });
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
                    capitalize(word){
                        if(!word) return '';
                        return word.toUpperCase();
                    }

                }
    };
</script>