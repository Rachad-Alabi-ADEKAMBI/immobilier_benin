<?php $title = 'Immobilier Bénin - Tableau de bord'; 


 ob_start(); ?>

<section class="section">
    <div class="container">
      <div class="row g-0 gx-5 align-items-end">
                    <!--menu-->   
                    <?php include 'menu.php'; ?>

                    <!--update ad-->
                    <?php include 'updateAd.php'; ?>
                    <!--end edit ad-->

                    <!-- list--> 
                    <?php include 'myAds.php'; ?>
                    <!-- end list-->
                    
                    <!--pagination-->
                    <?php include 'pagination.php'; ?>
                    <!--end pagination-->
            </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>

<script>
            new Vue({
                el: '#app',
                data: {
                    showNew: false,
                    showAll: false,
                    showAccount: false,
                    showNeeds: false,
                    category: '',
                    details: '',
                    showLand: false,
                    showHouse: false,
                    showEdit: false,
                    geolocation: '',
                    showMoreLocation: false,
                    location: '',
                    currentPage: 1,
                    itemsPerPage: 5,
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
                watch: {
                        category() {
                        if (this.category == 'Terrain' || this.category == 'Boutique') {
                            this.showLand = true;
                            this.showHouse = false;
                        } else{
                            this.showLand = false;
                            this.showHouse = true;
                        }
                        },
                        location() {
                        if (this.location == 'other') {
                            this.showMoreLocation = true;
                        } else{
                            this.showMoreLocation = false;
                        }
                        }
                    },  
                methods: {
                    displayAll(){
                        this.showNew = false;
                        axios.get('api/script.php?action=myAds')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
                        
                            this.showAll = true;
                            this.showAccount = false;
                            this.showNeeds = false;
                            this.showEdit = false;
                    },
                    displayNeeds(){
                        this.showNew = false;
                        axios.get('api/script.php?action=needs')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
                        
                            this.showAll = false;
                            this.showAccount = false;
                            this.showNeeds = true;
                            this.showEdit = false;
                    },
                    displayNew(){
                        this.showAll = false;
                        this.showNew = true;
                        this.showAccount = false;
                        this.showNeeds = false;
                        this.showEdit = false;
                    },
                    displayAccount(){
                        this.showAll = false;
                        this.showNew = false;
                        this.showAccount = true;
                        this.showNeeds = false;
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
                        this.showAccount = false;
                        this.showNeeds = false;
                        this.showNew = false;
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
                        return "public/img/" + pic;
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
                    window.location.replace('./index.php?action=adPage&id='+id);
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
            });
        </script>

<style>
          body {
            font-family: Arial, sans-serif;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                display: none;
            }
            tr {
                margin-bottom: 15px;
            }
            td {
                position: relative;
                padding-left: 50%;
            }
            td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                background-color: #f4f4f4;
                border-right: 1px solid #ddd;
                box-sizing: border-box;
            }
        }

        img{
            width: 90px;
            height: 60px;
        }

        ul li{
            display: inline;
            list-style: none;
        }

        li i{
            cursor: pointer;
        }

        li i:hover{
            font-weight: bold;
        }
        
        .red{
            color: red;
            font-weight: bold;
        }
    </style>
