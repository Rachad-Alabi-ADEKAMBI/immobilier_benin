<template>
    <section class="container xxl">
            <div class='col-sm-12 col-md-10 mt-4 mx-auto'>
                         <h1 class="mx-auto text-center">
                            Demandes clients ({{ this.details.length}})
                         </h1>

                         <p class="text text-bold text-grey text-center" v-if='details.length > 0'>
                            Avez vous des propositions pour ces recherches personnalisées ?  <br>
                            Si oui, vous pouvez contacter les demandeurs.
                         </p>

                       <div class="table mt-3 mx-auto">
                             <div class="mt-2 table-container table-bordered mx-auto text-center" v-if='details.length > 0'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Catégorie</th>
                                            <th>Action</th>
                                            <th>Ville</th>
                                            <th>Client</th>
                                            <th>Téléphone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for='detail in paginatedData' :key='detail.id'>
                                            <td data-label="Date"> {{formatDate(detail.created_at) }} </td>
                                            <td data-label="Catégorie">{{ detail.category}}</td>
                                            <td data-label="Action">{{ detail.action }} </td>
                                            <td data-label="Ville"> {{ detail.location }} </td>
                                            <td data-label="Client">{{ capitalizeFirstLetter(detail.user_first_name) }}
                                                {{ capitalizeFirstLetter(detail.user_last_name) }} </td>
                                            <td data-label="Téléphone"> {{ (detail.user_phone) }} </td>
                                            <td v-if="detail.user_id === user_id">
                                                    <button class="btn btn-danger" @click='deleteMyNeed(detail.id)'>
                                                        <i class="fa fa-trash m1-3 text-white "></i> Supprimer
                                                    </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
    </section>
</template> 
 

 <script>
    export default {
        name: 'Needs_admin',
        props: {
        img_url: String
        }
        ,
      data() {
        return {
             details: '',
                    currentPage: 1,
                    itemsPerPage: 5,
                   user_id: 4
        };
      },
        mounted(){
                    this.displayAll();
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
                methods: {
                    displayAll(){
                        axios.get('/needsApi')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
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
                    deleteMyNeed(id){
                        window.location.replace('delete/'+id)
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