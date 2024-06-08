<?php $title = 'Immobilier Bénin - Tableau de bord'; 


 ob_start(); ?>

<section class="section">
    <div class="container">
      <div class="row g-0 gx-5 align-items-end">
                    <!--menu-->   
                    <?php include 'menu.php'; ?>

                       <!-- Show account -->
                            <?php include 'account.php'; ?>
                        <!-- End account -->

                    <!--new add-->
                    <?php include 'newAd.php'; ?>
                    <!--new add-->

                    <!--update ad-->
                    <?php include 'updateAd.php'; ?>
                    <!--end edit ad-->

                    <!-- list--> 
                    <div class='col-sm-12 col-md-12  mt-4 mx-auto' data-wow-delay="0.5s" v-if='showAll' >
                         <h1 class="mx-auto text-center">
                            Mes annonces ({{ this.details.length}})
                         </h1>

                         <p class="text text-bold text-grey text-center" v-if='details.length == 0 '>
                            Vous n'avez publié aucune annonce pour l'instant
                         </p>

                        <div class="mt-2table-container" v-if='details.length > 0'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Nom</th>
                                            <th>Ville</th>
                                            <th>Prix</th>
                                            <th>Image</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for='detail in details' :key='detail.id'>
                                            <td data-label="Date"> {{ formatDate(detail.date_of_insertion) }} </td>
                                            <td data-label="Nom">{{ detail.name }}</td>
                                            <td data-label="Ville">{{ detail.location }} </td>
                                            <td data-label="Prix"> {{ format(detail.price) }} </td>
                                            <td data-label="Image">
                                                <img :src='getImgUrl(detail.pic1)' alt="">
                                            </td>
                                            <td data-label="Statut" > 
                                                <p class="text-success" v-if="detail.situation =='Disponible'">
                                                        {{ detail.situation }}
                                                </p>   
                                                
                                                <p class="text-danger" v-if="detail.situation =='Non disponible'">
                                                        {{ detail.situation }}
                                                </p>   
                                            </td>
                                           
                                            <td data-label="">

                                                <button class="btn btn-warning m-1 text-white" @click="pause(detail.id)" 
                                                    v-if="detail.situation == 'Disponible'">
                                                    <i class="fa fa-pause m1-3 text-white "></i> Pause
                                                </button>

                                                <button class="btn btn-success  m-1" @click="publish(detail.id)"
                                                      v-if="detail.situation == 'Non disponible'" >
                                                      <i class="fa fa-play m1-3 text-white "></i> Publier
                                                </button>

                                                <button class="btn btn-info m-1 text-white" @click="displayEdit(detail.id)">
                                                <i class="fa fa-pen m1-3 text-white "></i> Modifier
                                                </button>


                                                <button class="btn btn-danger m-1" @click="remove(detail.id)" >
                                                    <i class="fa fa-trash m1-3 text-white "></i> Supprimer
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
                    <!-- end list-->

                    <!-- needs--> 
                    <?php include 'needs.php'; ?>
                    <!--end needs-->
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
                    location: ''
                },
                mounted(){
                    //this.displayAll();
                    this.displayNew();
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
                publish(id){
                        window.location.replace('./api/script.php?action=publish&id='+id);
                },
                remove(id){
                    window.location.replace('./api/script.php?action=delete&id='+id);
                },
                goToProperty(id){
                    window.location.replace('./index.php?action=adPage&id='+id);
                }

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
