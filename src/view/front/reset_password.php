<?php $title = 'Immobilier Bénin - Mot de passe oublié'; ?>

<?php ob_start(); ?>

<div class="row g-0 gx-5 align-items-end">
                    <div class="col-sm-12 col-md-6 mt-4 mx-auto" >
                        <div class="bg-white border mt-2 rounded p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                            <form action="api/script.php?action=login" method="POST" >
                                <h1 class="mx-auto text-center">Réinitialiser le mot de passe</h1>

                                <div class="row g-3 mt-3">
                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" required name='email' placeholder="">
                                            <label for="name">Email <span class="red">*</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-4">
                                    <div class="col-sm-12 col-md-6 mx-auto text-center">
                                        <button class="btn btn-success w-100 py-3" type="submit">
                                            Réinitialiser le mot de passe
                                        </button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
        </div>

<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>

<style>
    .red{
        color: red;
        font-weight: bold;
    }
</style>