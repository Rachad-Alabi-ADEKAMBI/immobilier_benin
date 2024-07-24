<div class="search">
                <form action="{{ url('/search') }}" method="POST" class="container mx-auto">
                    @csrf 
                    <div class="row search__content mx-auto" >
                        <div class="col-sm-12 col-md-3 search__content__item">
                            <select class="form-select border-0 py-3" name='category' required>
                                        <option >Type de bien</option>
                                        <option value="Appartement meublé">Appartement meublé</option>
                                        <option value="Appartement">Appartement</option>
                                        <option value="Boutique">Boutique</option>
                                        <option value="Maison">Maison</option>
                                        <option value="Terrain">Terrain</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-3 search__content__item">
                            <select class="form-select border-0 py-3" name='action'>
                                    <option >Action</option>
                                    <option value="A louer">A louer</option>
                                    <option value="A vendre">A vendre</option>
                            </select> 
                        </div>

                        <div class="col-sm-12 col-md-3 search__content__item">
                            <select class="form-select border-0 py-3"  name="location" required>
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
                                </select>
                        </div>

                        <div class="col-sm-12 col-md-3 search__content__item">
                            <button type="submit" class="btn btn-dark border-0 w-100 py-3">
                                <i class="bi bi-search"></i> Chercher
                            </button>
                        </div>
                    </div>
                </form>
        </div>