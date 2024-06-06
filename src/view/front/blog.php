<?php $title = "Immobilier Bénin - Blog"; 
     
 ob_start(); ?>

    <div class="app" id="app">
            <!--Blog-->
    <div class="container-xxl py-2">
            <div class="container">
                <div class="row">
                    <h1 class="text text-center">
                        Blog
                    </h1>
                </div>
                <div class="row g-2 align-items-center">
                    <div class="col-sm-12 col-md-4 p-3 wow fadeInUp" data-wow-delay="0.1s" 
                         v-for="detail in details" :key='detail.id' @click='goToArticle(detail.id)'>
                        <img class="img-fluid" :src="getImg(detail.image)" alt="">
                        <h4>
                            {{detail.name}}
                        </h4>

                        <p>

                        </p>

                        <div class="details">
                            <div class="date">
                            {{ detail.date }}
                            </div>

                            <div class="views">
                                {{ detail.views }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>

<?php $content = ob_get_clean(); ?>
        
<?php require './src/view/layout.php'; ?>

<script>
            new Vue({
                el: '#app',
                data: {
                    details: ''
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
                },
                methods: {
                    displayAll(){
                        this.showAll = true;
                        this.showFiltered = false;
                        axios.get('api/script.php?action=posts')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
                    },
                    filter(){
                        this.showAll = false;
                        this.showFiltered = true;
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
                        return "public/img/" + pic;
                    },
                    getImg(pic) {
                        return "public/img/" + pic;
                    },
                    goToArticle(id){
                        window.location.replace('index.php?action=articlePage&id='+id);
                    }
                }
            });
    </script>