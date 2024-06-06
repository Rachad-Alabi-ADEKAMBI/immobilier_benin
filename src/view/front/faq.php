<?php $title = "Immobilier Bénin - FAQ"; ?>

<?php ob_start(); ?>

    <div class="container-xxl p" id="app">

            <div class="container">
                <div class="row">
                    <div class="col-12 text text-center">
                        <h1 class="mt-4">
                            FAQ
                        </h1> 

                        <p class="text text-center mt-4">
                            Vous n'avez pas trouvé de réponses ci dessus ? <br>
                            <a href="index.php?action=contact">Envoyez-nous un message</a>
                        </p> 
                    </div>
                </div>
            </div>
    </div>

<?php $content = ob_get_clean(); ?>
           
<?php require './src/view/layout.php'; ?>

</body>

<style>
    img{
        width: 80%;
        height: auto;
        margin: 15px auto;
    }

    li{
        list-style: none;
        padding-left: 30px;
        display: inline;
        margin: 10px;
        
    }

    i{
        font-size: 1.5em;
        font-weight: bold;
        margin: 10px;
    }
</style>

