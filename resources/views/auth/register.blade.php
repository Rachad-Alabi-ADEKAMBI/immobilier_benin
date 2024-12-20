<x-guest-layout>
<x-authentication-card>
<div class="container-xxl p">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
                <div class="col-sm-12 col-md-7 mx-auto text-center ">
                        <x-validation-errors class="mb-4 text-danger" />
                </div>

                        <div class="col-sm-12 col-md-7 mx-auto" >
                            <div class="bg-white border mt-2 rounded p-sm-5 mb-3 wow">
                                <form method="POST" action="{{ route('register') }}" >
                                    @csrf
                                    <h1 class="mx-auto text-center">Inscription</h1>

                                    <div class="row g-3 mt-4">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-floating">
                                                <x-label for=""/>Email: <span class="red">*</span>
                                                <x-input type="email" class="form-control" 
                                                required name='email' value="{{ __('email') }}"  placeholder=""
                                                :value="old('email')" required autocomplete="email" />
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-floating">
                                                <x-label for="phone" value="Numéro:" />
                                                <x-input 
                                                    type="number" 
                                                    class="form-control" 
                                                    name="phone" 
                                                    value="{{ old('phone') }}"  
                                                    placeholder=""
                                                    min="0" 
                                                    step="1"
                                                    required 
                                                    autocomplete="phone" 
                                                />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row g-3 mt-4">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-floating">
                                                <x-label for="first_name"/>Prénom: <span class="red">*</span>
                                                <x-input type="text" class="form-control" 
                                                required name='first_name' value="{{ __('first_name') }}"  placeholder="" 
                                                :value="old('first_name')" required autofocus autocomplete="first_name" />
                                                
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-floating">
                                                <x-label for="last_name" />Nom: <span class="red">*</span>
                                                <x-input type="text" class="form-control" 
                                                required name='last_name' value="{{ __('last_name') }}"  placeholder="" 
                                                :value="old('last_name')" required autofocus autocomplete="last_name"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 mt-4">
    <div class="col-sm-12 col-md-6">
        <div class="form-floating">
            <x-label for="location" value="Ville:"/>
            <select class="form-control" name="location" required autofocus autocomplete="location">
                <option value="" disabled selected>-- Sélectionner une ville --</option>
                                                         <option value="Abomey">Abomey</option>
                                                        <option value="Abomey-Calavi">Abomey-Calavi</option>
                                                        <option value="Cotonou">Cotonou</option>
                                                        <option value="Bohicon">Bohicon</option>
                                                        <option value="Grand-popo">Grand-popo</option>
                                                        <option value="Malanville">Malanville</option>
                                                        <option value="Natitingou">Natitingou</option>
                                                        <option value="N'dali">N'dali</option>
                                                        <option value="Nikki">Nikki</option>
                                                        <option value="Ouidah">Ouidah</option>
                                                        <option value="Parakou">Parakou</option>
                                                        <option value="Porto-Novo">Porto-Novo</option>
                                                        <option value="Sakété">Sakété</option>
                                                        <option value="Savè">Savè</option>
                                                        <option value="Sèmè">Sèmè</option>
            </select>
        </div>
    </div>

    <!--
    <div class="col-sm-12 col-md-6">
        <div class="form-floating">
            <x-label for="featured" value="Je suis agent immobilier:"/>
            <select class="form-control" name="featured" required autofocus autocomplete="featured">
                <option value="" disabled selected>-- Sélectionner une option --</option>
                <option value="yes">Oui</option>
                <option value="no">Non</option>
            </select>
        </div>
    </div>
-->
</div>


                                    <div class="row g-3 mt-4">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-floating">
                                                <x-label for="first_name" />Mot de passe: <span class="red">*</span>
                                                <x-input type="password" class="form-control" 
                                                required name='password' value="{{ __('Password') }}"  placeholder="" 
                                                required autocomplete="new-password"    />
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-floating">
                                                <x-label for="password_confirmation" />Confirmez le mot de passe: <span class="red">*</span>
                                                <x-input type="password" class="form-control" 
                                                required name='password_confirmation' value="{{ __('Confirm Password') }}"  placeholder=""
                                                required autocomplete="new-password" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row-g-3">
                                        <div class="col-12 text-center mt-4 ml-0">
                                            <label for="terms">
                                                <input type="checkbox" class="mr-1" id="terms" name="terms" required>
                                                J'ai lu et j'accepte les <a href="{{ url('termsPage') }}">CGU</a>
                                            </label>
                                        </div>
                                    </div>

                                        <div class="col-sm-12 mt-2 text-center">
                                            <button class="btn btn-primary w-50 py-3 " type="submit">
                                                Incription
                                            </button> 
                                        </div>

                                        <div class="col-sm-12 text-center">
                                            <p class="mt-4">
                                               Vous avez déjà un compte ? <a href="{{ url('/login')}}"
                                                class="text-blue">Connexion</a>
                                            </p>        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
        </div>
    </div>
    </x-authentication-card>
    </x-guest-layout>
