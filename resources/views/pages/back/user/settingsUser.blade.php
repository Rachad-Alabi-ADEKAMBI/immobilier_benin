@extends('layouts.app')

@section('title', 'Tableau de bord')


@section('content')

    <div class="dashboard-wrapper">

        @include('pages.back.user.mobile_menu')

        <div class="dashboard-container">

            @include('pages.back.user.sidebar')


            <!-- Main Content -->
            <main class="main-content">
                <!-- Header -->
                <header class="dashboard-header">
                    <div class="header-title">
                        <i class="fas fa-tachometer-alt"></i>
                        <span id="pageTitle">Vue d'ensemble</span>
                    </div>
                    @include('pages.back.user.user_profile')
                </header>

                <!-- Dashboard Content -->
                <div class="dashboard-content">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-user"></i>
                                Mon profil
                            </div>
                            <div class="card-actions">
                                <button class="card-btn card-btn-primary">
                                    <i class="fas fa-save"></i>
                                    Sauvegarder
                                </button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-user"></i>
                                        Prénom
                                    </label>
                                    <input type="text" class="form-control" value="Jean">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-user"></i>
                                        Nom
                                    </label>
                                    <input type="text" class="form-control" value="Kouassi">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-envelope"></i>
                                        Email
                                    </label>
                                    <input type="email" class="form-control" value="jean.kouassi@email.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-phone"></i>
                                        Téléphone
                                    </label>
                                    <input type="tel" class="form-control" value="+229 XX XX XX XX">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-lock"></i>
                                        Nouveau mot de passe
                                    </label>
                                    <input type="password" class="form-control"
                                        placeholder="Laisser vide pour ne pas changer">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-lock"></i>
                                        Confirmer le mot de passe
                                    </label>
                                    <input type="password" class="form-control"
                                        placeholder="Confirmer le nouveau mot de passe">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
@endsection
