<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')

@section('title', 'Immobilier Bénin - Inscription')

@section('content')
<section class="section">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-sm-12 col-md-8 mt-4 mx-auto">
                <div class="bg-white border mt-2 rounded p-2">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <h1 class="mx-auto text-center">Inscription</h1>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    <label for="email">Email <span class="red">*</span></label>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 text-center">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="phone" name="phone_number" value="{{ old('phone_number') }}" required>
                                    <label for="phone_number">Numéro <span class="red">*</span></label>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                    <label for="first_name">Prénom <span class="red">*</span></label>
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 text-center">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                    <label for="last_name">Nom <span class="red">*</span></label>
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 text-center">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <label for="password">Mot de passe <span class="red">*</span></label>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 text-center">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    <label for="password_confirmation">Confirmez le mot de passe <span class="red">*</span></label>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4 ml-0">
                                <label for="terms">
                                    <input type="checkbox" class="mr-3" id="terms" name="terms" required>
                                    J'ai lu et j'accepte les <a href="{{ route('termsPage') }}">CGU</a>
                                </label>
                            </div>
                        </div>
                        <div class="row g-3 mt-1">
                            <div class="col-sm-12 col-md-6 mx-auto text-center">
                                <button class="btn btn-success w-100 py-3" type="submit">Créer mon compte</button>
                                <p class="mt-3">Vous avez déjà un compte ? <a href="{{ route('loginPage') }}">Connexion</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .red {
        color: red;
        font-weight: bold;
    }
</style>
@endsection
