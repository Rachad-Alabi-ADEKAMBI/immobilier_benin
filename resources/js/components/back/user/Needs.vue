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
                                            <td data-label="Date"> {{detail.created_at }} </td>
                                            <td data-label="Catégorie">{{ detail.category}}</td>
                                            <td data-label="Action">{{ detail.action }} </td>
                                            <td data-label="Ville"> {{ detail.location }} </td>
                                            <td data-label="Client">rrrrr</td>
                                            <td data-label="Téléphone"> 0000 </td>
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
    </section>
</template> 
 

 <script>
    export default {
        name: 'Needs',
        props: {
        img_url: String
        }
        ,
      data() {
        return {
             details: '',
                    currentPage: 1,
                    itemsPerPage: 5,
                    user_id: 3
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
                                // Split the date string to extract the date and time parts
                                const [day, timeWithYear] = dateString.split('T');
                                const [time, rest] = timeWithYear.split('Z');
                                const [month, year] = rest.split('-');

                                // Format the date as dd/mm/yy
                                const formattedDate = `${day}/${month}/${year.slice(-2)}`;

                                return formattedDate;
                            },
                    deleteMyNeed(id){
                        window.location.replace('delete/'+id)
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

                }

    };
</script>