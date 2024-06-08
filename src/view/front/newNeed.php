<?php $title = 'Immobilier Benin - Nouvelle recherche personnalisée'; ?>

<?php ob_start(); ?>

<div class="section">

    <div class="container">
    <div class="row g-0 gx-5 align-items-end" id='app'>
                    <div class="col-sm-12 col-md-8 mt-4 mx-auto">
                        <div class="bg-white border mt-2 rounded p-sm-3 m-3 p-3 wow">
                            <form action="" method="POST" >
                                <h1 class="mx-auto text-center">
                                    Nouvelle recherche personnalisée
                                </h1>

                                <div class="row g-3 mt-2">
                                    <p class="text text-grey">
                                        Malheureusement nous n'avons trouvé aucun résultat pour cette recherche, mais vous pouvez en faire une recherche 
                                        personnalisée, les annonceurs de Immobilier Bénin seront alors informés que vous avez ce besoin. <br>
                                         Il est nécéssaire de 
                                        posséder un compte gratuit Immobilier Bénin pour cette option.
                                    </p>
                                </div>

                                <div class="row-sm-12 col-md-8 mx-auto text-center">
                                        <?php if (isset($_SESSION['user']['id'])) { ?>
                                            <a class="btn btn-success m-2" href="api/script.php?action=newNeed">
                                                Oui, créer
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-blue m-2" href="index.php?action=registerPage">
                                                Créer mon compte
                                            </a>
                                        <?php } ?>


                                        <btn class="btn btn-danger m-2" onclick="window.history.back()" >
                                            Non, merci
                                        </btn>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>