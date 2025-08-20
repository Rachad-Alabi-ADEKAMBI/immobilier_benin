@extends('layouts.app')

@section('title', 'Mes n')

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
                        <span id="pageTitle">Mes annonces</span>
                    </div>

                    @include('pages.back.user.user_profile')
                </header>

                <!-- Dashboard Content -->
                <div class="dashboard-content">
                    <!-- Overview Section -->
                    <section class="page-section active" id="section-overview">
                        <!-- Recent Activity -->
                        <div class="content-card fade-in">
                            <div class="card-header">
                                <div class="card-title">
                                    <i class="fas fa-clock"></i>
                                    Activité récente
                                </div>
                                <div class="card-actions">
                                    <button class="card-btn card-btn-secondary">
                                        <i class="fas fa-filter"></i>
                                        Filtrer
                                    </button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-container">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Propriété</th>
                                                <th>Type</th>
                                                <th>Prix</th>
                                                <th>Statut</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-label="Propriété">Villa moderne à Cotonou</td>
                                                <td data-label="Type">Vente</td>
                                                <td data-label="Prix">85,000,000 FCFA</td>
                                                <td data-label="Statut"><span
                                                        class="status-badge status-active">Actif</span>
                                                </td>
                                                <td data-label="Date">Il y a 2 jours</td>
                                            </tr>
                                            <tr>
                                                <td data-label="Propriété">Appartement de luxe</td>
                                                <td data-label="Type">Location</td>
                                                <td data-label="Prix">450,000 FCFA/mois</td>
                                                <td data-label="Statut"><span
                                                        class="status-badge status-active">Actif</span>
                                                </td>
                                                <td data-label="Date">Il y a 1 jour</td>
                                            </tr>
                                            <tr>
                                                <td data-label="Propriété">Terrain constructible</td>
                                                <td data-label="Type">Vente</td>
                                                <td data-label="Prix">15,000,000 FCFA</td>
                                                <td data-label="Statut"><span class="status-badge status-pending">En
                                                        attente</span></td>
                                                <td data-label="Date">Il y a 3 jours</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Properties Section -->
                    <section class="page-section" id="section-properties">
                        <div class="content-card fade-in">
                            <div class="card-header">
                                <div class="card-title">
                                    <i class="fas fa-building"></i>
                                    Gestion des propriétés
                                </div>
                                <div class="card-actions">
                                    <button class="card-btn card-btn-primary" onclick="openModal('addPropertyModal')">
                                        <i class="fas fa-plus"></i>
                                        Ajouter
                                    </button>
                                    <button class="card-btn card-btn-secondary">
                                        <i class="fas fa-download"></i>
                                        Exporter
                                    </button>
                                </div>
                            </div>
                            <div class="card-content">
                                <!-- Filters Row -->
                                <div class="filters-row">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-search"></i>
                                            Rechercher
                                        </label>
                                        <input type="text" class="form-control" placeholder="Titre, description...">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-filter"></i>
                                            Type
                                        </label>
                                        <select class="form-control">
                                            <option>Tous les types</option>
                                            <option>Vente</option>
                                            <option>Location</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-map-marker-alt"></i>
                                            Ville
                                        </label>
                                        <select class="form-control">
                                            <option>Toutes les villes</option>
                                            <option>Cotonou</option>
                                            <option>Porto-Novo</option>
                                            <option>Parakou</option>
                                        </select>
                                    </div>
                                    <button class="card-btn card-btn-primary">
                                        <i class="fas fa-search"></i>
                                        Filtrer
                                    </button>
                                </div>

                                <div class="table-container">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Propriété</th>
                                                <th>Type</th>
                                                <th>Prix</th>
                                                <th>Ville</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-label="Propriété">Villa moderne à Cotonou</td>
                                                <td data-label="Type">Vente</td>
                                                <td data-label="Prix">85,000,000 FCFA</td>
                                                <td data-label="Ville">Cotonou</td>
                                                <td data-label="Statut"><span
                                                        class="status-badge status-active">Actif</span>
                                                </td>
                                                <td data-label="Actions">
                                                    <button class="card-btn card-btn-secondary"
                                                        style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                        onclick="openModal('viewPropertyModal')">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="card-btn card-btn-secondary"
                                                        style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                        onclick="openModal('editPropertyModal')">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="card-btn card-btn-secondary"
                                                        style="padding: 0.25rem 0.5rem;"
                                                        onclick="openModal('deletePropertyModal')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-label="Propriété">Appartement de luxe</td>
                                                <td data-label="Type">Location</td>
                                                <td data-label="Prix">450,000 FCFA/mois</td>
                                                <td data-label="Ville">Porto-Novo</td>
                                                <td data-label="Statut"><span
                                                        class="status-badge status-active">Actif</span>
                                                </td>
                                                <td data-label="Actions">
                                                    <button class="card-btn card-btn-secondary"
                                                        style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                        onclick="openModal('viewPropertyModal')">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="card-btn card-btn-secondary"
                                                        style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                        onclick="openModal('editPropertyModal')">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="card-btn card-btn-secondary"
                                                        style="padding: 0.25rem 0.5rem;"
                                                        onclick="openModal('deletePropertyModal')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-label="Propriété">Terrain constructible</td>
                                                <td data-label="Type">Vente</td>
                                                <td data-label="Prix">15,000,000 FCFA</td>
                                                <td data-label="Ville">Abomey-Calavi</td>
                                                <td data-label="Statut"><span class="status-badge status-pending">En
                                                        attente</span></td>
                                                <td data-label="Actions">
                                                    <button class="card-btn card-btn-secondary"
                                                        style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                        onclick="openModal('viewPropertyModal')">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="card-btn card-btn-secondary"
                                                        style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                        onclick="openModal('editPropertyModal')">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="card-btn card-btn-secondary"
                                                        style="padding: 0.25rem 0.5rem;"
                                                        onclick="openModal('deletePropertyModal')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <div class="pagination">
                                    <button class="pagination-btn" disabled>
                                        <i class="fas fa-chevron-left"></i> Précédent
                                    </button>
                                    <div class="pagination-info">Page 1 sur 10 (127 éléments)</div>
                                    <button class="pagination-btn active">1</button>
                                    <button class="pagination-btn">2</button>
                                    <button class="pagination-btn">3</button>
                                    <span>...</span>
                                    <button class="pagination-btn">10</button>
                                    <button class="pagination-btn">
                                        Suivant <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>

    </div>

@endsection
