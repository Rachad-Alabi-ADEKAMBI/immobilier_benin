<?php $title = 'Immobilier Bénin - Tableau de bord admin'; ?>

<?php ob_start(); ?>

<section class="section">
    <div class="container">
    <div class="row g-0 gx-5 align-items-end">
        <p class="text text-center">
            Bonjour <strong>
                        admin
                    </strong>
        </p>
                    <!--menu-->   
                    <?php include 'menu.php'; ?>

                    <!--ads list--> 
                    <?php include 'ads.php'; ?>
                    <!--end ads list-->

                     <!--users list--> 
                    <?php include 'users.php'; ?>
                    <!--end users list-->

                     <!-- needs--> 
                     <?php include 'needs.php'; ?>
                    <!--end needs-->



                    <?php include 'pagination.php'; ?>
                </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>

<script>
        new Vue({
            el: '#app',
            data: {
                showAll: true,
                showUsers: false,
                showNeeds: false,
                details: [],
                currentPage: 1,
                itemsPerPage: 5,
            },
            mounted() {
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
                displayAll() {
                    this.showUsers = false;
                    this.showNeeds = false;
                    axios.get('api/script.php?action=allDatas')
                        .then((response) => {
                            console.log(response.data);
                            this.details = response.data;
                            this.showAll = true;
                        })
                        .catch((error) => {
                            console.error(error);
                            alert('Failed to fetch datas');
                        });
                },
                displayUsers() {
                    this.showAll = false;
                    this.showNeeds = false;
                    axios.get('api/script.php?action=users')
                        .then((response) => {
                            console.log(response.data);
                            this.details = response.data;
                            this.showUsers = true;
                        })
                        .catch((error) => {
                            console.error(error);
                            alert('Failed to fetch user data.');
                        });
                },
                displayNeeds() {
                    this.showAll = false;
                    this.showUsers = false;
                    axios.get('api/script.php?action=needs')
                        .then((response) => {
                            console.log(response.data);
                            this.details = response.data;
                            this.showNeeds = true;
                        })
                        .catch((error) => {
                            console.error(error);
                            alert('Failed to fetch needs data.');
                        });
                },
                format(num) {
                    return new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
                },
                formatDate(da) {
                    const [datePart, timePart] = da.split(' ');
                    const [year, month, day] = datePart.split('-');
                    return `${day}-${month}-${year}`;
                },
                getImgUrl(pic) {
                    return "public/img/" + pic;
                },
                pauseUser(id){
                        window.location.replace('./api/script.php?action=pauseUser&id='+id);
                },
                authorizeUser(id){
                        window.location.replace('./api/script.php?action=authorizeUser&id='+id);
                },
                stop(id){
                        window.location.replace('./api/script.php?action=stop&id='+id);
                },
                publish(id){
                        window.location.replace('./api/script.php?action=publish&id='+id);
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

        .btn-success{
            background: green;;
        }

        .text-success{
            color: green;
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
    </style>
