<?php $title = 'Immobilier Bénin - Demandes'; 


 ob_start(); ?>

<section class="section">
    <div class="container">
      <div class="row g-0 gx-5 align-items-end">
            <!--menu-->   
            <?php include 'menu.php'; ?>

            <div class="col-sm-12 col-md-8 mt-4 mx-auto">
                    <div class="bg-white border mt-2 rounded p-2 wow">
                        <form action="api/script.php?action=updateAccount" method="POST" enctype="multipart/form-data">
                            <h1 class="mx-auto text-center">Mon compte</h1>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="phone" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <label for="phone">Numéro</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="file" class="form-control" id="pic" name="pic">
                                        <label for="pic">Photo</label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="description"  name="description"></textarea>
                                        <label for="pic">Message à afficher sur votre profil</label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" name="password" >
                                        <label for="password">Nouveau mot de passe</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password_2" name="password_2">
                                        <label for="password_2">Confirmez le mot de passe</label>
                                    </div>
                                </div> <br>

                                <div class="col-sm-7 ml-0">
                                    <div class="form-floating">
                                        <select class="form-select" id="featured" name="featured">
                                            <option selected>Afficher mon profil sur le site</option>
                                            <option value="yes">Oui</option>
                                            <option value="no">Non</option>
                                        </select>
                                        <label for="featured">Afficher</label>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 mx-auto text-center">
                                    <button class="btn btn-blue w-100 py-3" type="submit">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                    category: '',
                    details: '',
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
                methods: {
                    displayAll(){
                        axios.get('api/script.php?action=needs')
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
                    formatDate(da) {
                        const [datePart, timePart] = da.split(' ');
                        const [year, month, day] = datePart.split('-');
                        return `${day}-${month}-${year}`;
                        },
                    getImgUrl(pic) {
                        return "public/img/" + pic;
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
