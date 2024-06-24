<div class='col-sm-12 col-md-12  mt-4 mx-auto' data-wow-delay="0.5s" v-if='showAll' >
                         <h1 class="mx-auto text-center">
                            Gestion de 
                         </h1>

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
                                            id="price" placeholder="Prix"
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