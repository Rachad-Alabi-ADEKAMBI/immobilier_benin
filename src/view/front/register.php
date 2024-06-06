<?php $title = 'Immobilier Bénin - Inscription'; ?>

<?php ob_start(); ?>

<section class="section">
    <div class="container">
    <div class="row g-0 gx-5 align-items-end">
                    <div class="col-sm-12 col-md-8 mt-4 mx-auto" v-if='showNew'>
                        <div class="bg-white border mt-2 rounded p-2 wow fadeInUp" data-wow-delay="0.5s">
                            <form action="api/script.php?action=register" method="POST" >
                                <h1 class="mx-auto text-center">Inscription</h1>

                                <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" 
                                        placeholder="" name="email"  value="<?=$_SESSION['register']['email']?>"  required>
                                        <label for="email">Email <span class="red">*</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="phone" placeholder=""
                                         name="phone" required  value="<?=$_SESSION['register']['phone']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <label for="phone">Numéro <span class="red">*</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control"
                                         id="first_name"  value="<?=$_SESSION['register']['first_name']?>" 
                                        placeholder="e" name="first_name" required>
                                        <label for="first_name">Prénom <span class="red">*</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="last_name"
                                         placeholder="" required   value="<?=$_SESSION['register']['last_name']?>" name="last_name">
                                        <label for="last_name">Nom <span class="red">*</span></label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password"
                                        required  placeholder="" 
                                        name="password">
                                        <label for="password">mot de passe <span class="red">*</span></label>
                                    </div>
                                </div>

                               
                                <div class="col-sm-6 text-center">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password_2" 
                                        placeholder="" name="password_2" required>
                                        <label for="password_2">Confirmez le mot de passe <span class="red">*</span></label>
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-4 ml-0">
                                        
                                        <label for="cgu">
                                        <input type="checkbox" class="mr-3" id="" 
                                        placeholder="Yes, I accept the CGU" name="checked" required> 
                                        J'ai lu et j'accepte les <a href="index.php?action=termsPage">CGU</a></label>
                                </div>
                            </div>
                                <div class="row g-3 mt-1">
                                    <div class="col-sm-12 col-md-6 mx-auto text-center">
                                        <button class="btn btn-success w-100 py-3" type="submit">
                                            Créer mon compte
                                        </button>

                                        <p class="mt-3">
                                            Vous avez déjà un compte ? <a href="index.php?action=loginPage">Connexion</a>
                                        </p>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
        </div>

    </div>
</section>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>

<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>

<style>
    .red{
        color: red;
        font-weight: bold;
    }
</style>