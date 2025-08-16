@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 700px; padding-top: 120px">
        <div class="content-card fade-in">
            <div class="card-content" style="padding: 3rem;">

                <!-- Logo -->
                <div style="text-align: center; margin-bottom: 2rem;">
                    <div class="logo" style="justify-content: center; font-size: 2rem; margin-bottom: 1rem;">
                        <i class="fas fa-home"></i> ImmobilierBenin
                    </div>
                    <p style="color: var(--text-light);">Créez votre compte</p>
                </div>

                <!-- Register Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- First Row: First + Last Name -->
                    <div class="form-row" style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
                        <div class="form-group" style="flex: 1;">
                            <label class="form-label"><i class="fas fa-user"></i> Prénom</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="form-control" placeholder="Prénom">
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label class="form-label"><i class="fas fa-user"></i> Nom</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                class="form-control" placeholder="Nom">
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Second Row: Username + Phone -->
                    <div class="form-row" style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
                        <div class="form-group" style="flex: 1;">
                            <label class="form-label"><i class="fas fa-id-badge"></i> Nom d'utilisateur</label>
                            <input type="text" name="username" value="{{ old('username') }}" required
                                class="form-control" placeholder="Pseudo">
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label class="form-label"><i class="fas fa-phone"></i> Téléphone</label>
                            <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control"
                                placeholder="Numéro">
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="form-control"
                            placeholder="votre@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password + Confirm Password -->
                    <div class="form-row" style="display: flex; gap: 1rem; margin-bottom: 2rem;">
                        <div class="form-group" style="flex: 1;">
                            <label class="form-label"><i class="fas fa-lock"></i> Mot de passe</label>
                            <input type="password" name="password" required class="form-control" placeholder="••••••••">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label class="form-label"><i class="fas fa-lock"></i> Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" required class="form-control"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                        <i class="fas fa-user-plus"></i> S'inscrire
                    </button>

                    <!-- Login Redirect -->
                    <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e9ecef;">
                        <p style="color: var(--text-light);">
                            Déjà un compte ?
                            <a href="{{ route('login') }}" style="color: #667eea; text-decoration: none; font-weight: 600;">
                                Connectez-vous
                            </a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection


<style>
    /* Pour tous les écrans */
    .form-row {
        display: flex;
        gap: 1rem;
    }

    /* Responsive pour petits écrans */
    @media (max-width: 400px) {
        .form-row {
            flex-direction: column;
        }
    }
</style>
