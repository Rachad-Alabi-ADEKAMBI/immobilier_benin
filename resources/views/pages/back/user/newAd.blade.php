@extends('layouts.app')

@section('title', 'Nouvelle Annonce')


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
                    <div class="" id="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title">
                                    <i class="fas fa-plus"></i> Ajouter une propriété
                                </div>
                                <button class="modal-close" onclick="closeModal('addPropertyModal')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-home"></i> Titre
                                        </label>
                                        <input type="text" class="form-control" placeholder="Titre de la propriété">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-tag"></i> Type
                                        </label>
                                        <select class="form-control">
                                            <option>Vente</option>
                                            <option>Location</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-dollar-sign"></i> Prix
                                        </label>
                                        <input type="number" class="form-control" placeholder="Prix en FCFA">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-map-marker-alt"></i> Ville
                                        </label>
                                        <select class="form-control">
                                            <option>Cotonou</option>
                                            <option>Porto-Novo</option>
                                            <option>Parakou</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-align-left"></i> Description
                                    </label>
                                    <textarea class="form-control" rows="4" placeholder="Description de la propriété"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="card-btn card-btn-secondary" onclick="closeModal('addPropertyModal')">
                                    Annuler
                                </button>
                                <button class="card-btn card-btn-primary">
                                    <i class="fas fa-save"></i> Sauvegarder
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
@endsection
