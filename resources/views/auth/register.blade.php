@extends('layouts.app')

@section('title', "Création de compte - ImmobilierBenin")

@section('content')
<main class="main">

    <!-- Auth Container -->
    <div class="auth-container">
        <div class="auth-background">
            <div class="auth-shapes">
                <div class="auth-shape shape-1"></div>
                <div class="auth-shape shape-2"></div>
                <div class="auth-shape shape-3"></div>
            </div>
        </div>

        <div class="auth-content">
            <div class="auth-card" id="authCard">
                <!-- Register Form -->
                <div class="auth-form register-form active" id="registerForm">
                    <div class="auth-header">
                        <h1><i class="fas fa-user-plus"></i> Inscription</h1>
                        <p>Créez votre compte ImmobilierBenin</p>
                    </div>

                    <!-- FORMULAIRE Laravel -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_name">
                                    <i class="fas fa-user"></i>
                                    Prénom
                                </label>
                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Prénom" value="{{ old('first_name') }}" required>
                                @error('first_name') <div class="text-red-600">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name">
                                    <i class="fas fa-user"></i>
                                    Nom
                                </label>
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Nom" value="{{ old('last_name') }}" required>
                                @error('last_name') <div class="text-red-600">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="fas fa-envelope"></i>
                                Email
                            </label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="votre@email.com" value="{{ old('email') }}" required>
                            @error('email') <div class="text-red-600">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">
                                <i class="fas fa-phone"></i>
                                Téléphone
                            </label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="+229 XX XX XX XX" value="{{ old('phone') }}" required>
                            @error('phone') <div class="text-red-600">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">
                                <i class="fas fa-lock"></i>
                                Mot de passe
                            </label>
                            <div class="password-input">
                                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                                <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password') <div class="text-red-600">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">
                                <i class="fas fa-lock"></i>
                                Confirmer le mot de passe
                            </label>
                            <div class="password-input">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                                <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="auth-button">
                            <i class="fas fa-user-plus"></i>
                            Créer mon compte
                        </button>
                    </form>

                    <div class="auth-divider">
                        <span>ou</span>
                    </div>

                    <div class="social-login">
                        <button class="social-btn google">
                            <i class="fab fa-google"></i>
                            S'inscrire avec Google
                        </button>
                        <button class="social-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                            S'inscrire avec Facebook
                        </button>
                    </div>

                    <div class="auth-switch">
                        <p>Déjà un compte ?
                            <a href="{{ route('login') }}">Se connecter</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>
@endsection