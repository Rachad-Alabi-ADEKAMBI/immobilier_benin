<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

        @include('pages/back/user/menu')

        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    <!--my ads-->
    <div class="profile" id="profile">
        <div class="col-sm-12 col-md-8 mx-auto">
        <h3 class="text-primary"><i class="bi bi-arrow-right m-1"></i> Informations générales</h3>
                    <form action="api/script.php?action=updateAccount" method="POST" enctype="multipart/form-data">
                        <div class="row g-3 mt-2">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                <label for="phone">Numéro de téléphone :</label>
                                    <input type="text" class="form-control" id="phone" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                            </div> <br>

                            <div class="col-sm-12 mt-2">
                                <div class="form-floating">
                                <label for="description">Message à afficher sur votre profil : </label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                            </div>

                            <div class="col-sm-6 mt-2">
                                <div class="form-floating">
                                    <label for="password">Nouveau mot de passe : </label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <div class="form-floating">
                                    <label for="password_2">Confirmez le mot de passe : </label>
                                    <input type="password" class="form-control" id="password_2" name="password_2">
                                </div>
                            </div>

                            <div class="col-sm-6 ml-0 mt-2">
                                <div class="form-floating">
                                <label for="featured">Afficher profil dans la page Annonceurs :  </label> <br>
                                    <select class="form-select" id="featured" name="featured">
                                        <option >Veuillez sélectionner</option>
                                        <option value="yes">Oui</option>
                                        <option value="no">Non</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-8 mx-auto mt-3 text-center">
                                <button class="btn btn-blue w-50 py-3" type="submit">Valider</button>
                            </div>
                        </div>
                    </form>

                    <hr class="mt-5">
                    <h3> <i class="bi bi-arrow-right m-1"></i> Photo de profil</h3>
                    <form id="uploadForm" action="api/script.php?action=uploadImage" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="profileImage">
                                1- Selectionnez l'image: <br>
                                2- Rognez l'image et cliquez sur <strong>"Rogner image"</strong> <br>
                                3- Enregistrez l'image en cliquant sur <strong>"Enregistrer"</strong> <br>
                            </label>

                            <input type="file" class="form-control mt-3" id="profileImage" 
                            name="profileImage" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <div class="img-container" style="width: 300px; height: 300px; margin: 10px auto;">
                                <img id="imageToCrop" style="display: none;">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="cropButton">Rogner image</button>
                        </div>
                        <div class="form-group preview" id="preview mt-5"></div>
                        <input type="hidden" name="croppedImage" id="croppedImage">
                        <button type="submit" class="btn btn-blue w-45 py-3 mt-3" id="submitButton">Enregistrer</button>
                    </form> 

                    <hr class="mt-5">
                    <h3> <i class="bi bi-arrow-right m-1"></i>
                        Suppresion de compte
                    </h3>

                    <form action="" class="text-center">
                        <button class="btn btn-danger mt-2" id='deleteBtn'>Supprimer mon compte</button>
                    </form>
        </div>
    </div>
</x-app-layout>
