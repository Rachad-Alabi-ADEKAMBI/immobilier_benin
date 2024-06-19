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
                                        <input type="text" class="form-control"  
                                        name='price' id="price" placeholder="Prix"
                                         oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">

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