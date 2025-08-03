<x-guest-layout>
    <!-- Login Page -->
    <div class="page" id="page-connexion">
        <div
            style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: var(--bg-gray); padding: 2rem 0;">
            <div class="container" style="max-width: 500px;">
                <div class="content-card fade-in">
                    <div class="card-content" style="padding: 3rem;">

                        <!-- Logo -->
                        <div style="text-align: center; margin-bottom: 2rem;">
                            <div class="logo" style="justify-content: center; font-size: 2rem; margin-bottom: 1rem;">
                                <i class="fas fa-home"></i> ImmobilierBenin
                            </div>
                            <p style="color: var(--text-light);">Connectez-vous à votre compte</p>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="form-group" style="margin-bottom: 1.5rem;">
                                <label class="form-label">
                                    <i class="fas fa-envelope"></i> Email
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                    class="form-control" placeholder="votre@email.com">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="form-group" style="margin-bottom: 1.5rem;">
                                <label class="form-label">
                                    <i class="fas fa-lock"></i> Mot de passe
                                </label>
                                <input type="password" name="password" required class="form-control"
                                    placeholder="••••••••">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me / Forgot Password -->
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                    <input type="checkbox" name="remember" style="margin: 0;">
                                    <span style="color: var(--text-light); font-size: 0.9rem;">Se souvenir de
                                        moi</span>
                                </label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        style="color: #667eea; text-decoration: none; font-size: 0.9rem;">
                                        Mot de passe oublié ?
                                    </a>
                                @endif
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary"
                                style="width: 100%; justify-content: center; margin-bottom: 1.5rem;">
                                <i class="fas fa-sign-in-alt"></i> Se connecter
                            </button>

                            <!-- Or -->
                            <div style="text-align: center; margin-bottom: 2rem;">
                                <span style="color: var(--text-light);">ou</span>
                            </div>

                            <!-- Social Buttons (dummy) -->
                            <button type="button" class="btn btn-outline"
                                style="width: 100%; justify-content: center; color: #667eea; border-color: #667eea; margin-bottom: 1rem;">
                                <i class="fab fa-google"></i> Continuer avec Google
                            </button>

                            <button type="button" class="btn btn-outline"
                                style="width: 100%; justify-content: center; color: #667eea; border-color: #667eea;">
                                <i class="fab fa-facebook"></i> Continuer avec Facebook
                            </button>
                        </form>

                        <!-- Register -->
                        <div
                            style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e9ecef;">
                            <p style="color: var(--text-light);">
                                Pas encore de compte ?
                                <a href="{{ route('register') }}"
                                    style="color: #667eea; text-decoration: none; font-weight: 600;">
                                    Créer un compte
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
