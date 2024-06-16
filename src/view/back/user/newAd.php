<?php $title = 'Immobilier Bénin - Tableau de bord'; 


 ob_start(); ?>

<section class="section">
    <div class="container">
      <div class="row g-0 gx-5 align-items-end">
                    <!--menu-->   
                    <?php include 'menu.php'; ?>

                    <!--new add-->
                   <div class="col-sm-12 col-md-8 mt-4 mx-auto">
                            <div class="bg-white border mt-2 rounded p-2 wow">
                                <form action="api/script.php?action=newAd" method="POST" enctype='multipart/form-data'>
                                <span class="ml-0" @click="displayAll()">
                                    <i class="fa fa-times me-3 text-blue"></i>
                                    </span>

                                    <h1 class="mx-auto text-center">Nouvelle annonce</h1>
                                        <p class="text-center">
                                            Si vous avez des questions concernant le formulaire <br> vous pouvez
                                            consulter <a href="index.php?action=faqPage">la FAQ</a>
                                        </p>
                                    <div class="row g-3">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" required name='name' placeholder="Nom">
                                                <label for="name">Nom <span class="red">*</span> </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-floating">
                                            <input type="text" class="form-control" required name='price' 
                                            id="price" placeholder="Prix" maxlength="5"
                                             oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                                                <label for="price">Prix <span class="red">*</span></label>
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
                                            <label for="category">Catégorie <span class="red">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="action" name="action" required>
                                            <option selected>Action</option>
                                            <option value="A louer">A louer</option>
                                            <option value="A vendre">A vendre</option>
                                            </select>
                                            <label for="action">Action <span class="red">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="location" name="location" 
                                            v-model='location' required>
                                                <option value=''>Ville</option>
                                                <option value="Abomey">Abomey</option>
                                                <option value="Abomey-Calavi">Abomey-Calavi</option>
                                                <option value="Cotonou">Cotonou</option>
                                                <option value="Bohicon">Bohicon</option>
                                                <option value="Grand-popo">Grand-popo</option>
                                                <option value="Malanville">Malanville</option>
                                                <option value="Natitingou">Natitingou</option>
                                                <option value="N'dali">N'dali</option>
                                                <option value="Nikki">Nikki</option>
                                                <option value="Ouidah">Ouidah</option>
                                                <option value="Parakou">Parakou</option>
                                                <option value="Porto-Novo">Porto-Novo</option>
                                                <option value="Sakété">Sakété</option>
                                                <option value="Savè">Savè</option>
                                                <option value="Sèmè">Sèmè</option>
                                                <option value="other">Autre</option>
                                        </select>
                                        <label for="location">Ville <span class="red">*</span></label>
                                    </div>
                                </div>
                                </div>

                                <div class="row g-3 mt-3" >
                                    <div class="col-sm-6 col-md-6" v-if='showMoreLocation'>
                                        <div class="form-floating">
                                            <input type="text"  class="form-control" name='more_location' id="more_location" 
                                            placeholder="Ville">
                                            <label for="more_location">Ville <span class="red">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6" v-if='showLand'>
                                        <div class="form-floating">
                                            <input type="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name='size' id="size" placeholder="Superficie">
                                            <label for="size">Superficie <span class="red">*</span></label>
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
                                            <label for="rooms">Chambres <span class="red">*</span></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-floating"> <label for="bathrooms">Douches <span class="red">*</span></label>
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
                                        <label for="people">Ménages <span class="red">*</span></label>
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
                                            <label for="description">Description <span class="red">*</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-floating">
                                            <input type="file" class="form-control"  accept=".jpg, .jpeg, .png, image/*"
                                            name='pic1' id="pic1" placeholder="Photo1" required>
                                            <label for="pic1">Photo 1 <span class="red">*</span></label>
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
