<template>
    <section class="container xxl">
            <div class='col-sm-12 col-md-12  mt-4 mx-auto' data-wow-delay="0.5s" >
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
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Téléphone</th>
                                                            <th scope="col">Nom complet</th>
                                                            <th scope='col'>Photo</th>
                                                            <th scope='col'>Annonces</th>
                                                            </tr>
                                    </thead>    
                                                        <tbody>
                                                            <tr v-for='detail in paginatedData' :key='detail.id'>
                                                            <td data-label="Date">{{ formatDate(detail.created_at) }}</td>
                                                            <td data-label="Email">{{ detail.email }}  </td>
                                                            <td data-label="Phone">{{ detail.phone }}  </td>
                                                            <td data-label="Full name">{{ detail.first_name }} {{ detail.last_name}}  </td>
                                                             <td data-label="Photo">
                                                            <img :src='getImgUrl(detail.profile_photo_path)'  v-if="detail.profile_photo_path" alt="utilisateur immobilier benin">
                                                            <p class="text-danger" v-if="!detail.profile_photo_path">
                                                                Non renseigné
                                                            </p>
                                                            </td>
                                                            <td data-label="Annonces" >{{ detail.ads }}</td>
                                                           
                                                            <td data-label="">

                                                <button class="btn btn-danger m-1 text-white" @click="deleteUser(detail.id)">
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
                    showEdit: false,
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
                                alert('Failed to fetch datas');
                            });
                        
                            this.showAll = true;
                            this.showEdit = false;
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
                    pause(id){
                            window.location.replace('./api/script.php?action=pause&id='+id);
                    },
                    play(id){
                            window.location.replace('./api/script.php?action=play&id='+id);
                    },
                    deleteUser(id){
                        window.location.replace('deleteUserApi/'+id);
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
                    },
                    manage(id){
                        window.location.replace('index.php?action=managePage&id='+id);
                    }

                }
    };
</script>