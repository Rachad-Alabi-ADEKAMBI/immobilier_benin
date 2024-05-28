<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Immobilier Bénin - Nouvelle recherche personalisée</title>

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
                    <div class="col-sm-12 col-md-6 mt-4 mx-auto" v-if='showNew'>
                        <div class="bg-white border mt-2 rounded p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                            <form action="api/script.php?action=login" method="POST" >
                                <h1 class="mx-auto text-center">
                                    Nouvelle recherche personnalisée
                                </h1>

                                <div class="row g-3">
                                    <p class="text text-grey">
                                        Nous n'avons trouvé aucun résultat pour cette recherche, mais vous pouvez en faire une recherche 
                                        personnalisée, les agents de Immobilier Bénin seront alors informés que vous avez ce besoin. <br>
                                         Il est nécéssaire de 
                                        posséder un compte gratuit Immobilier Bénin pour cette option.
                                    </p>
                                </div>

                                <div class="row g-3 mt-4">
                                    <div class="col-sm-12 col-md-6 mx-auto text-center">
                                        <button class="btn btn-success w-100 py-3" @click="createNeed()" >
                                           Oui, créer
                                        </button>

                                        <button class="btn btn-success w-100 py-3" @click="back()" >
                                            Non, merci
                                        </button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
        </div>

        <?php include 'parts/footer.php'; ?>

        <script>
        new Vue({
            el: '#app',
            data: {
                details: []           },
            mounted(){
                this.displayDetails();
            },
            methods: {
                createNeed(){
                    window.location.replace('api/script.php?action=newNeed')
                },
                back(){

                },
                format(num){
                    return new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
                },
                formatDate(da) {
                    const [datePart, timePart] = da.split(' ');
                    const [year, month, day] = datePart.split('-');
                    return `${day}-${month}-${year}`;
                },
                getImgUrl(pic) {
                    return "img/" + pic;
                },
                goToProperty(id){
                        window.location.replace('property.php?id='+id);
                }
            }
        });
    </script>

    </div>

    <?php include 'parts/includeJs.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

</body>

</html>