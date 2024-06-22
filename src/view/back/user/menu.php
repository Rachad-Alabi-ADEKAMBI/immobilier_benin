                        <p class="text text-center">
                        Bonjour <strong><?= $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name']?>
                                </strong> 
                        </p> <br>
                        <?php if($_SESSION['user']['situation'] != 'Disponible'){ ?>
                        <p class="text text-danger text-center">
                                Votre profil a été temporairement désactivé par l'administrateur du site, <br>
                                Un email descriptif vous a été envoyé, merci de régulariser votre compte.
                        </p>
                        <?php } ?>
                    <div class="col-sm-12 text-center">
                    <div class="menu">
    <?php 
        $currentAction = isset($_GET['action']) ? $_GET['action'] : '';

        if ($_SESSION['user']['situation'] == 'Disponible' && $currentAction != 'newAdPage') { ?>
            <a class="btn btn-blue m-2" href="index.php?action=newAdPage">
            <i class="bi bi-plus-circle"></i> Nouvelle annonce
            </a>
    <?php } ?>

    <?php if ($currentAction != 'dashboardPage') { ?>
        <a class="btn btn-blue m-2" href="index.php?action=dashboardPage">
        <i class="bi bi-card-list"></i> Mes annonces
        </a>
    <?php } ?>

    <?php if ($currentAction != 'needsPage') { ?>
        <a class="btn btn-blue m-2" href="index.php?action=needsPage">
        <i class="bi bi-question-circle-fill"></i> Demandes clients
        </a>
    <?php } ?>

    <?php if ($currentAction != 'accountPage') { ?>
        <a class="btn btn-blue m-2" href="index.php?action=accountPage">
            <i class="bi bi-gear"></i> Paramètres
        </a>
    <?php } ?>
</div>

                    </div>