<?php 
    session_start();

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Immobilier Bénin - Tableau de bord</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <?php include 'parts/meta.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <?php include 'parts/spinner.php'; ?>

        <?php include 'parts/header.php'; ?>

        <div id="app">
        <div class="row g-0 gx-5 align-items-end">
                    <!--menu-->   
                    <div class="col-sm-12 mt-3 text-center">
                                <div class="menu">
                                            <button class="btn btn-primary m-2" @click="displayAll()" v-if='!showAll'>
                                                Annonces
                                            </button>

                                            <button class="btn btn-primary m-2" @click="displayUsers()" v-if='!showUsers'>
                                                Utilisateurs
                                            </button>

                                            <button class="btn btn-primary m-2" @click="displayNeeds()" v-if='!showNeeds'>
                                                Demandes
                                            </button>
                                </div>
                    </div>


                    <!-- list--> 
                    <div class='col-sm-12 col-md-8 mt-4 mx-auto data-wow-delay="0.5s"' v-if='showAll' >
                         <h1 class="mx-auto text-center">
                            Toutes les annonces
                         </h1>
                        <div class="mt-2table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Nom</th>
                                            <th>Ville</th>
                                            <th>Prix</th>
                                            <th>Image</th>
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
                                            <td data-label="">

                                                <a :href="'api/script.php?action=pauseid=' + detail.id">
                                                        <i class="fa fa-pause me-3"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end list-->

                     <!-- list--> 
                     <div class='col-sm-12 col-md-8 mt-4 mx-auto data-wow-delay="0.5s"' v-if='showUsers' >
                         <h1 class="mx-auto text-center">
                            Utilisateurs
                         </h1>
                        
                         <div class="table-container">
                               <table>
                                    <thead>
                                                            <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Nom complet</th>
                                                            <th scope='col'>Picture</th>
                                                            <th scope='col'>Ip</th>
                                                            </tr>
                                    </thead>
                                                        <tbody>
                                                            <tr v-for='detail in details' :key='detail.id'>
                                                            <td data-label="Date">{{ formatDate(detail.date_of_insertion) }}</td>
                                                            <td data-label="Email">{{ detail.email }} {{ detail.last_name}}  </td>
                                                            
                                                            <td data-label="Full name">{{ detail.first_name }} {{ detail.last_name}}  </td>
                                                             <td data-label="Picture">
                                                            <img :src='getImgUrl(detail.pic)' alt="">
                                                            </td>
                                                            <td data-label="Ip">{{ detail.ip }}</td>
                                                            </tr>
                                                        </tbody>
                                </table>
                        </div>
                    </div>
                    <!--end list-->
                </div>
        </div>

        <?php include 'parts/footer.php'; ?>
        <script>
        new Vue({
            el: '#app',
            data: {
                showAll: true,
                showUsers: false,
                details: [],
            },
            mounted(){
                this.displayAll();
            },
            methods: {
                displayAll(){
                    this.showUsers= false;
                    axios.get('api/script.php?action=allDatas')
                        .then((response) => {
                            // Ensure 'this' refers to the Vue component's instance
                            console.log(response.data);
                            this.details = response.data;
                        })
                        .catch((error) => {
                            console.error(error);
                            alert('Failed to fetch datas');
                        });
                    
                        this.showAll = true;
                },
                displayUsers(){
                    axios.get('api/script.php?action=users')
                        .then((response) => {console.log(response.data);
                            this.details = response.data;
                        })
                        .catch((error) => {
                            console.error(error);
                            alert('Failed to fetch user data.');
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
                    return "img/" + pic;
                },
               pause(id){
                    window.location.replace('api/script.php?action=pause&id='+id);
               }
            }
        });
    </script>

    </div>

    <?php include 'parts/includeJs.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

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
    </style>

</body>

</html>