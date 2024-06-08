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