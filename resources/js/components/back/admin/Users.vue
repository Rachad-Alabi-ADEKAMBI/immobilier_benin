<template>
    <section class="container xxl">
            <div class='col-sm-12 col-md-12  mt-4 mx-auto' data-wow-delay="0.5s" >
                            <div class='col-12 mt-4 mx-auto data-wow-delay="0.5s"' >
                         <h1 class="mx-auto text-center">
                            Utilisateurs ({{details.length}})
                         </h1>
                         
                         <div class="table m-3 mx-auto">
                            <div class="table-container table-boredered mx-auto">
                               <table>
                                    <thead>
                                                            <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Téléphone</th>
                                                            <th scope="col">Nom complet</th>
                                                            <th scope='col'>Photo</th>
                                                            <th scope='col'>Annonces</th>
                                                            <th scope='col'>Statut</th>
                                                            </tr>
                                    </thead>    
                                                        <tbody>
                                                            <tr v-for='detail in paginatedData' :key='detail.id'>
                                                            <td data-label="Date">{{ formatDate(detail.created_at) }}</td>
                                                            <td data-label="Email">{{ detail.email }}  </td>
                                                            <td data-label="Phone">{{ detail.phone }}  </td>
                                                            <td data-label="Full name">{{ detail.first_name }} {{ detail.last_name}}  </td>
                                                             <td data-label="Photo">
                                                            <img :src='getImgUrl(detail.pic)'  v-if="detail.pic" alt="utilisateur immobilier benin">
                                                            <p class="text-danger" v-if="!detail.pic">
                                                                Non renseigné
                                                            </p>
                                                            </td>
                                                            <td data-label="Annonces" >{{ detail.ads }}</td>
                                                            <td data-label="Statut" > 
                                                                    <p class="text-success" v-if="detail.situation =='Disponible'">
                                                                            Validé
                                                                    </p>   
                                                                    
                                                                    <p class="text-warning" v-if="detail.situation =='Non disponible'">
                                                                           En pause
                                                                    </p>   
                                                                </td>
                                                            <td data-label="">

                                                <button class="btn btn-warning m-1 text-white" @click="pauseUser(detail.id)" 
                                                    v-if="detail.situation == 'Disponible'">
                                                    <i class="fa fa-pause m1-3 text-white "></i> Pause
                                                </button>

                                                <button class="btn btn-success  m-1" @click="authorizeUser(detail.id)"
                                                      v-if="detail.situation == 'Non disponible'" >
                                                      <i class="fa fa-play m1-3 text-white "></i> Autoriser
                                                </button>

                                                <button class="btn btn-danger m-1 text-white" @click="deleteUser(detail.id)">
                                                    <i class="fa fa-trash m1-3 text-white "></i> Supprimer
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
                    formatDate(da) {
                        const [datePart, timePart] = da.split(' ');
                        const [year, month, day] = datePart.split('-');
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
                    remove(id){
                        window.location.replace('./api/script.php?action=delete&id='+id);
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