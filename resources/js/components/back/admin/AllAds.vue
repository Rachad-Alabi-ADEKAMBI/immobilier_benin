<template>
    <section class="container xxl">
         <div class="row" id='myads'>
            <div class='col-sm-12 col-md-12  mt-4 mx-auto' data-wow-delay="0.5s" v-if='showAll' >
                         <h1 class="mx-auto text-center">
                            Mes annonces ({{ this.details.length}})
                         </h1>

                         <p class="text text-bold text-grey text-center" v-if='details.length == 0 '>
                            Vous n'avez publié aucune annonce pour l'instant
                         </p>

                        <div class="mt-2 table-container" v-if='details.length > 0'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Nom</th>
                                            <th>Prix</th>
                                            <th>Image</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for='detail in paginatedData' :key='detail.id'>
                                            <td data-label="Date"> {{ formatDate(detail.date_of_insertion) }} </td>
                                            <td data-label="Nom">{{ capitalizeFirstLetter(detail.name) }}</td>
                                            <td data-label="Prix"> {{ format(detail.price) }} XOF </td>
                                            <td data-label="Image">
                                                <img :src='getImgUrl(detail.pic1)' alt="">
                                            </td>
                                            <td data-label="Statut" > 
                                                <p class="text-success" v-if="detail.situation =='Disponible'">
                                                        {{ detail.situation }}
                                                </p>  
                                                
                                                <p class="text-danger" v-if="detail.situation =='Stop'">
                                                        Désactivé par l'administrateur
                                                </p> 
                                                
                                                <p class="text-warning" v-if="detail.situation =='Non disponible'">
                                                        {{ detail.situation }}
                                                </p>   
                                            </td>
                                           
                                            <td data-label="">

                                                <button class="btn btn-warning m-1 text-white" @click="manage(detail.id)" 
                                                    v-if="detail.situation == 'Disponible'">
                                                    <i class="bi bi-building"></i> Gérer
                                                </button>

                                                <button class="btn btn-info m-1 text-white" @click="displayEdit(detail.id)">
                                                <i class="fa fa-pen m1-3 text-white "></i> Modifier
                                                </button>

                                                <span @click="goToProperty(detail.id)">
                                                <i class="fa fa-eye me-3 text-blue"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
            </div>
        </div>
    </section>
</template> 
 

 <script>
    export default {
        name: 'AllAds',
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
                        alert('ok');
                        axios.get('/myAdsApi')
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
                    displayEdit(id){
                        axios.get('./api/script.php?action=getProperty&id='+id)
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
                        
                        this.showAll = false;
                        this.showEdit = true;
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