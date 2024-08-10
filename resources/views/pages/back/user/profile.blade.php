<!-- Include Cropper.js CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

<!-- Include Cropper.js JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Paramètres du compte') }}
        </h2>
    </x-slot>

    @include('pages/back/user/menu')

    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <!--my ads-->
    <div class="profile mt-1" id="profile">
        <div class="col-sm-12 col-md-8 mx-auto">
            <h2 ><i class="bi bi-arrow-right m-1"></i> Informations générales</h2>

            <form action="{{ route('updateUserApi') }}" class="mt-3 card p-3" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 mt-2">
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <label for="phone">Numéro de téléphone :</label>
                            <input type="text" class="form-control" id="phone" name="phone" 
                                value="{{ old('phone', $user->phone) }}" 
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                    </div> <br>

                    <div class="col-sm-12 mt-2">
                        <div class="form-floating">
                            <label for="description">Message à afficher sur votre profil : </label>
                            <textarea class="form-control" id="description" name="description">{{ old('description', $user->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-floating">
                            <label for="password">Nouveau mot de passe : </label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-floating">
                            <label for="password_2">Confirmez le mot de passe : </label>
                            <input type="password" class="form-control" id="password_2" name="password_2">
                        </div>
                    </div>

                    <div class="col-sm-6 ml-0 mt-2">
                        <div class="form-floating">
                            <label for="featured">Afficher profil dans la page Annonceurs : </label> <br>
                            <select class="form-select" id="featured" name="featured">
                                <option value="">Veuillez sélectionner</option>
                                <option value="yes" {{ old('featured', $user->featured) == 'yes' ? 'selected' : '' }}>Oui</option>
                                <option value="no" {{ old('featured', $user->featured) == 'no' ? 'selected' : '' }}>Non</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-8 mx-auto mt-3 text-center">
                        <button class="btn btn-blue w-50 py-3" type="submit">Valider</button>
                    </div>
                </div>
            </form>

            <hr class="mt-5">
            <h3> <i class="bi bi-arrow-right m-1"></i> Photo de profil</h3>
            <form id="uploadForm" action="{{ route('updateUserPictureApi') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="profileImage">
            1- Selectionnez l'image: <br>
            2- Rognez l'image et cliquez sur <strong>"Rogner image"</strong> <br>
            3- Enregistrez l'image en cliquant sur <strong>"Enregistrer"</strong> <br>
        </label>
        <input type="file" class="form-control mt-3" id="profileImage" name="profileImage" accept="image/*" required>
    </div>
    <div class="form-group">
        <div class="img-container" style="width: 300px; height: 300px; margin: 10px auto;">
            <img id="imageToCrop" style="display: none;">
        </div>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-primary" id="cropButton">Rogner image</button>
    </div>
    <div class="form-group preview mt-5" id="preview"></div>
    <input type="hidden" name="croppedImage" id="croppedImage">
    <button type="submit" class="btn btn-blue w-45 py-3 mt-3" id="submitButton" disabled>Enregistrer</button>
</form>

<!-- JavaScript for image cropping -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    let cropper;
    const image = document.getElementById('imageToCrop');
    const profileImageInput = document.getElementById('profileImage');
    const cropButton = document.getElementById('cropButton');
    const submitButton = document.getElementById('submitButton');
    const croppedImageInput = document.getElementById('croppedImage');

    profileImageInput.addEventListener('change', function (event) {
        const files = event.target.files;
        const reader = new FileReader();

        reader.onload = function (e) {
            image.src = e.target.result;
            if (cropper) {
                cropper.destroy();
            }
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
                preview: '.preview',
            });
            submitButton.disabled = false;
        };

        if (files && files.length > 0) {
            reader.readAsDataURL(files[0]);
        }
    });

    cropButton.addEventListener('click', function () {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300,
            });

            canvas.toBlob(function (blob) {
                const url = URL.createObjectURL(blob);
                croppedImageInput.value = url; // Store the image data URL in a hidden input
                preview.innerHTML = `<img src="${url}" style="max-width: 100%; height: auto;">`;
            });

            // Optionally, you can also store the cropped image as a base64 string if needed
            // const base64Image = canvas.toDataURL('image/png');
            // croppedImageInput.value = base64Image;
        }
    });
});
</script>


            <hr class="mt-5">
            <h3> <i class="bi bi-arrow-right m-1"></i>
                Suppression de compte
            </h3>

            <form action="{{ route('deleteAccountApi') }}" method="POST" class="text-center">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-2" id='deleteBtn'>Supprimer mon compte</button>
            </form>
        </div>
    </div>
</x-app-layout>
