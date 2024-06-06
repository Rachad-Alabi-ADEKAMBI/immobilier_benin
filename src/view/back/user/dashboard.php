<?php $title = 'Immobilier Bénin - Tableau de bord'; 


 ob_start(); ?>

<section class="section">
    <div class="container">
      <div class="row g-0 gx-5 align-items-end">
                    <!--menu-->   
                    <?php include 'menu.php'; ?>

                       <!-- Show account -->
                <div class="col-sm-12 col-md-8 mt-4 mx-auto" v-if="showAccount">
                    <div class="bg-white border mt-2 rounded p-2 wow fadeInUp" data-wow-delay="0.5s">
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
                <!-- End account -->

                    <!--new add-->
                    <div class="col-sm-12 col-md-8 mt-4 mx-auto" v-if='showNew'>
                            <div class="bg-white border mt-2 rounded p-2 wow fadeInUp" data-wow-delay="0.5s">
                                <form action="api/script.php?action=newAd" method="POST" enctype='multipart/form-data'>
                                <span class="ml-0" @click="displayAll()">
                                    <i class="fa fa-times me-3 text-blue"></i>
                                    </span>

                                    <h1 class="mx-auto text-center">Nouvelle annonce</h1>

                                    <div class="row g-3">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" required name='name' placeholder="Nom">
                                                <label for="name">Nom</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-floating">
                                            <input type="text" class="form-control" required name='price' 
                                            id="price" placeholder="Prix" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                                                <label for="price">Prix</label>
                                            </div>
                                        </div>
                                    </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="category" name="category" v-model="category" required>
                                                <option selected>Catégorie</option>
                                                <option value="Appartement">Appartement</option>
                                                <option value="Appartement meublé">Appartement meublé</option>
                                                <option value="Boutique">Boutique</option>
                                                <option value="Maison">Maison</option>
                                                <option value="Terrain">Terrain</option>
                                            </select>
                                            <label for="category">Catégorie</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-floating">
                                    <select class="form-select" id="action" name="action" required>
                                    <option selected>Action</option>
                                    <option value="A louer">A louer</option>
                                    <option value="A vendre">A vendre</option>
                                    </select>
                                    <label for="action">Action</label>
                                            </div>
                                </div>

                                <!--oter city-->
                                <div class="row g-3 mt-3">
                                <div class="col-sm-6 col-md-6">
                                        <div class="form-floating">
                                            <input type="text"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name='size' id="size" placeholder="Superficie">
                                            <label for="size">Superficie</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="row g-3 mt-3" v-if='showLand'>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-floating">
                                            <input type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name='size' id="size" placeholder="Superficie">
                                            <label for="size">Superficie</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-3" v-if='showHouse'>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" name='rooms'>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                            <label for="rooms">Chambres</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-floating"> <label for="bathrooms">Douches</label>
                                            <select class="form-select" name='bathrooms'>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-floating">
                                        <label for="people">Ménages</label>
                                            <select class="form-select" name='people'>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name='description' 
                                            required id="description" placeholder="Description"></textarea>
                                            <label for="description">Description</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-floating">
                                            <input type="file" class="form-control"  accept=".jpg, .jpeg, .png, image/*"
                                            name='pic1' id="pic1" placeholder="Photo1" required>
                                            <label for="pic1">Photo 1</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-floating">
                                            <input type="file" class="form-control" name='pic2'  accept=".jpg, .jpeg, .png, image/*"
                                             id="pic2" placeholder="Photo2">
                                            <label for="pic2">Photo 2</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-floating">
                                            <input type="file" class="form-control" name='pic3'  accept=".jpg, .jpeg, .png, image/*"
                                             id="pic3" placeholder="Photo3">
                                            <label for="pic3">Photo 3</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-floating">
                                            <input type="file" class="form-control" name='pic4'  accept=".jpg, .jpeg, .png, image/*"
                                             id="pic4" placeholder="Photo4">
                                            <label for="pic4">Photo 4</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-4">
                                    <div class="col-sm-12 col-md-4 mx-auto text-center">
                                        <button class="btn btn-blue w-100 py-3" type="submit">Ajouter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--new add-->

                    <!--update ad-->
                    <div class="col-sm-12 col-md-8 mt-4 mx-auto" v-if='showEdit'>
                        <div class="bg-white border mt-2 rounded p-2 wow fadeInUp" data-wow-delay="0.5s"  v-for="detail in details" :key='detail.id'>
                            <form  :action="'api/script.php?action=updateAd&id=' + detail.id" method="POST" enctype='multipart/form-data'>
                                <span class="ml-0" @click="displayAll()">
                                <i class="fa fa-times me-3 text-blue"></i>
                                </span>
                                <h1 class="mx-auto text-center">Modifier annonce</h1>
                                <div class="row g-3">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" 
                                        placeholder="Nom">
                                            <label for="name">Nom</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-floating">
                                        <input type="text" class="form-control"  name='price' id="price" placeholder="Prix" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                                            <label for="price">Prix</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name='description' 
                                             id="description" placeholder="Description"></textarea>
                                            <label for="description">Description</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-floating">
                                            <input type="file" class="form-control"  accept=".jpg, .jpeg, .png, image/*"
                                            name='pic1' id="pic1" placeholder="Photo1" >
                                            <label for="pic1">Photo 1</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-floating">
                                            <input type="file" class="form-control" name='pic2'  accept=".jpg, .jpeg, .png, image/*"
                                             id="pic2" placeholder="Photo2">
                                            <label for="pic2">Photo 2</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-floating">
                                            <input type="file" class="form-control" name='pic3'  accept=".jpg, .jpeg, .png, image/*"
                                             id="pic3" placeholder="Photo3">
                                            <label for="pic3">Photo 3</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-floating">
                                            <input type="file" class="form-control" name='pic4'  accept=".jpg, .jpeg, .png, image/*"
                                             id="pic4" placeholder="Photo4">
                                            <label for="pic4">Photo 4</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-4">
                                    <div class="col-sm-12 col-md-4 mx-auto text-center">
                                        <button class="btn btn-blue w-100 py-3" type="submit">Valider</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                    <div class='col-sm-12 col-md-10 mt-4 mx-auto fadeInUp' data-wow-delay="0.5s" v-if='showNeeds' >
                         <h1 class="mx-auto text-center">
                            Demandes clients ({{ this.details.length}})
                         </h1>

                         <p class="text text-bold text-grey text-center">
                            Avez vous des réponses pour ces recherches ? Si oui, vous pouvez contacter les demandeurs
                         </p>

                        <div class="mt-2table-container" v-if='details.length > 0'>
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
                                        <tr v-for='detail in details' :key='detail.id'>
                                            <td data-label="Date"> {{ formatDate(detail.date_of_insertion) }} </td>
                                            <td data-label="Catégorie">{{ detail.category}}</td>
                                            <td data-label="Action">{{ detail.action }} </td>
                                            <td data-label="Ville"> {{ detail.location }} </td>
                                            <td data-label="Client">{{ detail.user_name }} </td>
                                            <td data-label="Téléphone"> {{ detail.user_phone }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
                    showmoreLocation: false,
                    location: ''
                },
                mounted(){
                    this.displayAll();
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
                            this.showmoreLocation = true;
                        } else{
                            this.showmoreLocation = false;
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
    </style>
