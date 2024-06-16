<?php $title = 'Immobilier Bénin - Mon compte'; 


 ob_start(); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
  
<section class="section">
    <div class="container">
      <div class="row g-0 gx-5 align-items-end">
                    <!--menu-->   
                    <?php include 'menu.php'; ?>

                    <div class="col-sm-12 col-md-8 mt-4 mx-auto">
                        <div class="bg-white border mt-2 rounded p-2">
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
                                            <input type="file" class="form-control" id="image" name="pic" accept="image/*">
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

                                    <div class="form-group">
                                    <div class="img-container" style="width: 300px; height: 300px; margin: 10px auto;">
                                        <img id="imageToCrop" style="display: none;">
                                    </div>
                                                </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="cropButton">Rogner image</button>
                        </div>
                        <div class="form-group preview" id="preview"></div>
                        <input type="hidden" name="croppedImage" id="croppedImage">
                                    <div class="col-sm-12 col-md-6 mx-auto text-center">
                                        <button class="btn btn-blue w-100 py-3" type="submit">Valider</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                },
                mounted(){
                   // this.displayAll();
                },
                computed: {
                   
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
                   
                }
            });
        </script>

<style>
        

        img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            border-radius: 50%;
        }
    </style>
