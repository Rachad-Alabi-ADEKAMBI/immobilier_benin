<?php 
$title = 'Immobilier Bénin - Mon compte'; 
ob_start(); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <style>
        img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<section class="section">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <!-- Menu -->
            <?php include 'menu.php'; ?>

            <div class="col-sm-12 col-md-8 mt-4 mx-auto">
                <div class="bg-white border mt-2 rounded p-2">
                    <h1 class="mx-auto text-center">Mon compte</h1>
                    <hr>
                    <h3>Informations générales</h3>
                    <form action="api/script.php?action=updateAccount" method="POST" enctype="multipart/form-data">
                        <div class="row g-3 mt-2">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phone" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <label for="phone">Numéro</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="image" name="pic" accept="image/*">
                                    <label for="pic">Photo</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                    <label for="description">Message à afficher sur votre profil</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <label for="password">Nouveau mot de passe</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_2" name="password_2">
                                    <label for="password_2">Confirmez le mot de passe</label>
                                </div>
                            </div>
                            <div class="col-sm-6 ml-0">
                                <div class="form-floating">
                                    <select class="form-select" id="featured" name="featured">
                                        <option selected>Afficher mon profil sur le site</option>
                                        <option value="yes">Oui</option>
                                        <option value="no">Non</option>
                                    </select>
                                    <label for="featured">Afficher</label>
                                </div>
                            </div>
                            <div class="col-8 mx-auto text-center">
                                <button class="btn btn-blue w-50 py-3" type="submit">Valider</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h3>Photo de profil</h3>
                    <form id="uploadForm" action="api/script.php?action=uploadImage" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="profileImage">Selectionner image:</label>
                            <input type="file" class="form-control" id="profileImage" name="profileImage" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <div class="img-container" style="width: 300px; height: 300px; margin: 10px auto;">
                                <img id="imageToCrop" style="display: none;">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="cropButton">Rogner image</button>
                        </div>
                        <div class="form-group preview" id="preview"></div>
                        <input type="hidden" name="croppedImage" id="croppedImage">
                        <button type="submit" class="btn btn-success" id="submitButton">Enregistrer</button>
                    </form> 

                    <hr>

                    <h3>
                        Suppresion de compte
                    </h3>

                    <form action="">
                        <button onclick=''>Supprimer mon compte</button>
                    </form>
                     
                </div>
            </div>

            <div class="col-sm-12 col-md-8 mt-4 mx-auto">
                <p>
                    Cette action est irréversible, etes vous sur de vous ? <br>
                    <div class="options">
                        <a class="text text-danger" class='btn btn-danger' href='api/script=deleteUser' > 
                            Oui, supprimer mon compte
                        </a>

                        <button class="text text-danger" onclick=""> 
                            Non
                        </button>
                    </div>
                </p>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script>
    let cropper;
    document.getElementById('profileImage').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                const img = document.getElementById('imageToCrop');
                img.src = event.target.result;
                img.style.display = 'block';
                cropper = new Cropper(img, {
                    aspectRatio: 1,
                    viewMode: 3,
                    preview: '.preview'
                });
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('cropButton').addEventListener('click', function () {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160
            });
            document.getElementById('croppedImage').value = canvas.toDataURL('image/png');
            document.getElementById('preview').innerHTML = '';
            document.getElementById('preview').appendChild(canvas);
        } else {
            alert("Veuillez choisir d'abord une image.");
        }
    });

    document.getElementById('uploadForm').addEventListener('submit', function (e) {
        const croppedImage = document.getElementById('croppedImage').value;
        if (!croppedImage) {
            e.preventDefault();
            alert("Veuillez rogner l'image avant de soumettre.");
        }
    });
</script>
</body>
</html>

<?php 
$content = ob_get_clean(); 
require './src/view/layout.php'; 
?>
