  <!-- Search Start -->
  <div class="container-fluid  bg-blue mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <form class="row g-2" action="api/script.php?action=search" method="POST">
            <div class="col-md-10">
                <div class="row g-2">
                    <!--
                    <div class="col-md-4">
                        <input type="text" class="form-control border-0 py-3" placeholder="Mots-clés">
                    </div>
                    -->

                   
                    <div class="col-md-4">
                        <select class="form-select border-0 py-3" name='category' required>
                            <option >Type de bien</option>
                            <option value="Appartement meublé">Appartement meublé</option>
                            <option value="Appartement">Appartement</option>
                            <option value="Boutique">Boutique</option>
                            <option value="Maison">Maison</option>
                            <option value="Terrain">Terrain</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select class="form-select border-0 py-3" name='action'>
                            <option >Action</option>
                            <option value="A louer">A louer</option>
                            <option value="A vendre">A vendre</option>
                        </select>
                    </div>
                 
                    <div class="col-md-4">
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
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark border-0 w-100 py-3">
                <i class="bi bi-search"></i> Chercher
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->

<style>
    .bold{
        font-weight: bold;
        font-size: larger;
    }
</style>