<!DOCTYPE html>
<html lang="en">

<head>
    <title>Immobilier Bénin - Inscription</title>

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
                    <div class="col-sm-12 col-md-8 mt-4 mx-auto" v-if='showNew'>
                        <div class="bg-white border mt-2 rounded p-2 wow fadeInUp" data-wow-delay="0.5s">
                            <form action="api/script.php?action=register" method="POST" >
                                <h1 class="mx-auto text-center">Inscription</h1>

                                <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" 
                                        placeholder="" name="email" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="phone" placeholder=""
                                         name="phone" required>
                                        <label for="phone">Numéro</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="first_name" 
                                        placeholder="e" name="first_name" required>
                                        <label for="first_name">Prénom</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="last_name"
                                         placeholder="" required name="last_name">
                                        <label for="last_name">Nom</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password"
                                        required  placeholder="" 
                                        name="password">
                                        <label for="password">mot de passe</label>
                                    </div>
                                </div>

                               
                                <div class="col-sm-6 text-center">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password_2" 
                                        placeholder="" name="password_2" required>
                                        <label for="password_2">Confirmez le mot de passe</label>
                                    </div>
                                </div>

                                <div class="col-12 text-center mt-4 ml-0">
                                        
                                        <label for="cgu">
                                        <input type="checkbox" class="mr-3" id="" 
                                        placeholder="Yes, I accept the CGU" name="checked" required> 
                                        J'ai lu et j'accepte les <a href="terms.php">CGU</a></label>
                                </div>
                            </div>
                                <div class="row g-3">
                                    <div class="col-sm-12 col-md-6 mx-auto text-center">
                                        <button class="btn btn-success w-100 py-3" type="submit">
                                            Créer mon compte
                                        </button>

                                        <p class="mt-3">
                                            Vous avez déjà un compte ? <a href="login.php">Connexion</a>
                                        </p>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
        </div>

        <?php include 'parts/footer.php'; ?>

    </div>

    <?php include 'parts/includeJs.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>


</body>

</html>