<?php $title = "Immobilier Bénin - Blog"; 
     
 ob_start(); ?>

    <div class="container" id="ap">
        <div class="row">
            .col
        </div>
    </div>

<?php $content = ob_get_clean(); ?>
        
<?php require './src/view/layout.php'; ?>

<script>
            new Vue({
                el: '#ap',
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
                        axios.get('api/script.php?action=articles')
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
                    goToProperty(id){
                        window.location.replace('index.php?action=adPage&id='+id);
                    }
                }
            });
    </script>