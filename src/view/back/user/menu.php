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
                                            <?php if($_SESSION['user']['situation'] == 'Disponible'){ ?>
                                                <a class="btn btn-blue m-2"  href="index.php?action=newAdPage">
                                                <i class="fas fa-plus   "></i> Nouvelle annonce
                                            </a>
                                            <?php } ?>

                                            <a class="btn btn-blue m-2" href="index.php?action=dashboardPage" >
                                            <i class="fas fa-list"></i> Mes annonces
                                            </a>


                                            <a class="btn btn-blue m-2" href="index.php?action=needsPage">
                                            <i class="fas fa-question"></i> Demandes clients
                                            </a>


                                            <button class="btn btn-blue m-2" href="index.php?action=accountPage" >
                                            <i class="fas fa-user"></i> Mon compte
                                            </button>


                                </div>
                    </div>