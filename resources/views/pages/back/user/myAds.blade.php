@extends('layouts.app')

@section('title', 'Mes annonces')


<head>
</head>

@section('content')

    @include('pages.back.user.mobile_menu')

    <div class="dashboard-container">
        <!-- Sidebar -->
        @include('pages.back.user.sidebar')


        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-title">
                    <i class="fas fa-tachometer-alt"></i>
                    <span id="pageTitle">Mes annonces</span>
                </div>
                <div class="header-actions">
                    <a href="{{ route('newAd') }}" class="header-btn">
                        <i class="fas fa-plus"></i>
                        Nouvelle annonce
                    </a>

                    @include('pages.back.user.user_profile')

                </div>

            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <!-- Overview Section -->
                <section class="page-section active" id="section-overview">
                    <!-- Stats Grid -->
                    <div class="stats-grid fade-in">
                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <div class="stat-number">127</div>
                            <div class="stat-label">Propriétés actives</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> +12% ce mois
                            </div>
                        </div>



                        <div class="stat-card">
                            <div class="stat-header">
                                <div class="stat-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                            <div class="stat-number">45,678</div>
                            <div class="stat-label">Vues ce mois</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> +23% ce mois
                            </div>
                        </div>


                    </div>

                    <!-- Quick Actions -->
                    <div class="quick-actions fade-in">
                        <a href="{{ url('newAd') }}" class="quick-action" onclick="showSection('properties')">
                            <i class="fas fa-plus"></i>
                            <h4>Ajouter une propriété</h4>
                            <p>Publier une nouvelle annonce</p>
                        </a>
                        <a href="#" class="quick-action" onclick="showSection('messages')">
                            <i class="fas fa-envelope"></i>
                            <h4>Messages</h4>
                            <p>Consulter les notifications</p>
                        </a>
                    </div>

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
                                            <td data-label="Statut"><span class="status-badge status-active">Actif</span>
                                            </td>
                                            <td data-label="Date">Il y a 2 jours</td>
                                        </tr>
                                        <tr>
                                            <td data-label="Propriété">Appartement de luxe</td>
                                            <td data-label="Type">Location</td>
                                            <td data-label="Prix">450,000 FCFA/mois</td>
                                            <td data-label="Statut"><span class="status-badge status-active">Actif</span>
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
                                            <td data-label="Statut"><span class="status-badge status-active">Actif</span>
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
                                            <td data-label="Statut"><span class="status-badge status-active">Actif</span>
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

                <!-- Users Section -->
                <section class="page-section" id="section-users">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-users"></i>
                                Gestion des utilisateurs
                            </div>
                            <div class="card-actions">
                                <button class="card-btn card-btn-primary" onclick="openModal('addUserModal')">
                                    <i class="fas fa-user-plus"></i>
                                    Ajouter
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
                                    <input type="text" class="form-control" placeholder="Nom, email...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-user-tag"></i>
                                        Rôle
                                    </label>
                                    <select class="form-control">
                                        <option>Tous les rôles</option>
                                        <option>Administrateur</option>
                                        <option>Agent</option>
                                        <option>Utilisateur</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-toggle-on"></i>
                                        Statut
                                    </label>
                                    <select class="form-control">
                                        <option>Tous les statuts</option>
                                        <option>Actif</option>
                                        <option>Inactif</option>
                                        <option>Banni</option>
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
                                            <th>Utilisateur</th>
                                            <th>Email</th>
                                            <th>Rôle</th>
                                            <th>Statut</th>
                                            <th>Inscription</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Utilisateur">Jean Kouassi</td>
                                            <td data-label="Email">jean.kouassi@email.com</td>
                                            <td data-label="Rôle">Administrateur</td>
                                            <td data-label="Statut"><span class="status-badge status-active">Actif</span>
                                            </td>
                                            <td data-label="Inscription">15 Jan 2024</td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('viewUserModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('editUserModal')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Utilisateur">Marie Adjovi</td>
                                            <td data-label="Email">marie.adjovi@email.com</td>
                                            <td data-label="Rôle">Agent</td>
                                            <td data-label="Statut"><span class="status-badge status-active">Actif</span>
                                            </td>
                                            <td data-label="Inscription">12 Jan 2024</td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('viewUserModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('editUserModal')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Utilisateur">Paul Dossou</td>
                                            <td data-label="Email">paul.dossou@email.com</td>
                                            <td data-label="Rôle">Utilisateur</td>
                                            <td data-label="Statut"><span
                                                    class="status-badge status-inactive">Banni</span></td>
                                            <td data-label="Inscription">10 Jan 2024</td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('viewUserModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem; margin-right: 0.5rem;"
                                                    onclick="openModal('editUserModal')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;">
                                                    <i class="fas fa-check"></i>
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
                                <div class="pagination-info">Page 1 sur 25 (1,234 éléments)</div>
                                <button class="pagination-btn active">1</button>
                                <button class="pagination-btn">2</button>
                                <button class="pagination-btn">3</button>
                                <span>...</span>
                                <button class="pagination-btn">25</button>
                                <button class="pagination-btn">
                                    Suivant <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Transactions Section -->
                <section class="page-section" id="section-transactions">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-handshake"></i>
                                Gestion des transactions
                            </div>
                            <div class="card-actions">
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
                                        <i class="fas fa-calendar"></i>
                                        Période
                                    </label>
                                    <select class="form-control">
                                        <option>Ce mois</option>
                                        <option>Mois dernier</option>
                                        <option>3 derniers mois</option>
                                        <option>Cette année</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-tag"></i>
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
                                        <i class="fas fa-toggle-on"></i>
                                        Statut
                                    </label>
                                    <select class="form-control">
                                        <option>Tous les statuts</option>
                                        <option>Complétée</option>
                                        <option>En cours</option>
                                        <option>Annulée</option>
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
                                            <th>Référence</th>
                                            <th>Propriété</th>
                                            <th>Client</th>
                                            <th>Agent</th>
                                            <th>Montant</th>
                                            <th>Statut</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Référence">#TXN001</td>
                                            <td data-label="Propriété">Villa moderne à Cotonou</td>
                                            <td data-label="Client">Koffi Mensah</td>
                                            <td data-label="Agent">Jean Kouassi</td>
                                            <td data-label="Montant">85,000,000 FCFA</td>
                                            <td data-label="Statut"><span
                                                    class="status-badge status-active">Complétée</span></td>
                                            <td data-label="Date">20 Jan 2024</td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('viewTransactionModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Référence">#TXN002</td>
                                            <td data-label="Propriété">Appartement de luxe</td>
                                            <td data-label="Client">Awa Diallo</td>
                                            <td data-label="Agent">Marie Adjovi</td>
                                            <td data-label="Montant">450,000 FCFA/mois</td>
                                            <td data-label="Statut"><span class="status-badge status-pending">En
                                                    cours</span></td>
                                            <td data-label="Date">18 Jan 2024</td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-secondary"
                                                    style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('viewTransactionModal')">
                                                    <i class="fas fa-eye"></i>
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
                                <div class="pagination-info">Page 1 sur 9 (89 éléments)</div>
                                <button class="pagination-btn active">1</button>
                                <button class="pagination-btn">2</button>
                                <button class="pagination-btn">3</button>
                                <span>...</span>
                                <button class="pagination-btn">9</button>
                                <button class="pagination-btn">
                                    Suivant <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Analytics Section -->
                <section class="page-section" id="section-analytics">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-chart-line"></i>
                                Analytiques et rapports
                            </div>
                            <div class="card-actions">
                                <button class="card-btn card-btn-secondary">
                                    <i class="fas fa-download"></i>
                                    Exporter
                                </button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="chart-container">
                                <i class="fas fa-chart-bar" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                                <p>Graphiques et analyses détaillées à venir</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Messages Section -->
                <section class="page-section" id="section-messages">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-envelope"></i>
                                Messages et notifications
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Expéditeur</th>
                                            <th>Sujet</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Expéditeur">client@email.com</td>
                                            <td data-label="Sujet">Demande d'information - Villa Cotonou</td>
                                            <td data-label="Date">Il y a 2h</td>
                                            <td data-label="Statut"><span class="status-badge status-pending">Non
                                                    lu</span></td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-primary" style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('viewMessageModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Expéditeur">agent@email.com</td>
                                            <td data-label="Sujet">Rapport mensuel</td>
                                            <td data-label="Date">Il y a 1 jour</td>
                                            <td data-label="Statut"><span class="status-badge status-active">Lu</span>
                                            </td>
                                            <td data-label="Actions">
                                                <button class="card-btn card-btn-primary" style="padding: 0.25rem 0.5rem;"
                                                    onclick="openModal('viewMessageModal')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Settings Section -->
                <section class="page-section" id="section-settings">
                    <div class="content-card fade-in">
                        <div class="card-header">
                            <div class="card-title">
                                <i class="fas fa-cog"></i>
                                Paramètres du site
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
                                        <i class="fas fa-globe"></i>
                                        Nom du site
                                    </label>
                                    <input type="text" class="form-control" value="ImmobilierBenin">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-envelope"></i>
                                        Email de contact
                                    </label>
                                    <input type="email" class="form-control" value="contact@immobilierbenin.com">
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
                                        <i class="fas fa-map-marker-alt"></i>
                                        Adresse
                                    </label>
                                    <input type="text" class="form-control" value="Cotonou, Bénin">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Profile Section -->
                <section class="page-section" id="section-profile">
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
                </section>
            </div>
        </main>
    </div>


    <script>
        // Theme Management
        function toggleTheme() {
            const body = document.body;
            const themeIcon = document.getElementById('themeIcon');

            if (body.getAttribute('data-theme') === 'dark') {
                body.removeAttribute('data-theme');
                themeIcon.className = 'fas fa-moon';
                localStorage.setItem('theme', 'light');
            } else {
                body.setAttribute('data-theme', 'dark');
                themeIcon.className = 'fas fa-sun';
                localStorage.setItem('theme', 'dark');
            }
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            const themeIcon = document.getElementById('themeIcon');

            if (savedTheme === 'dark') {
                document.body.setAttribute('data-theme', 'dark');
                themeIcon.className = 'fas fa-sun';
            }
        });

        // Sidebar functionality
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = sidebar.querySelector('.sidebar-toggle i');

            sidebar.classList.toggle('collapsed');

            if (sidebar.classList.contains('collapsed')) {
                toggleBtn.className = 'fas fa-chevron-right';
            } else {
                toggleBtn.className = 'fas fa-chevron-left';
            }
        }

        // Mobile sidebar functionality
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');

            sidebar.classList.add('mobile-open');
            overlay.classList.add('active');
        }

        function closeMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');

            sidebar.classList.remove('mobile-open');
            overlay.classList.remove('active');
        }

        // Section navigation
        function showSection(sectionName) {
            // Hide all sections
            document.querySelectorAll('.page-section').forEach(section => {
                section.classList.remove('active');
            });

            // Show selected section
            const targetSection = document.getElementById(`section-${sectionName}`);
            if (targetSection) {
                targetSection.classList.add('active');
            }

            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });

            // Find and activate the correct nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.getAttribute('onclick') && link.getAttribute('onclick').includes(sectionName)) {
                    link.classList.add('active');
                }
            });

            // Update page title
            const titles = {
                'overview': 'Vue d\'ensemble',
                'properties': 'Propriétés',
                'users': 'Utilisateurs',
                'transactions': 'Transactions',
                'analytics': 'Analytiques',
                'messages': 'Messages',
                'settings': 'Paramètres',
                'profile': 'Mon profil'
            };

            const pageTitle = document.getElementById('pageTitle');
            if (pageTitle && titles[sectionName]) {
                pageTitle.textContent = titles[sectionName];
            }

            // Close mobile sidebar if open
            closeMobileSidebar();

            // Trigger fade-in animations
            setTimeout(() => {
                const elements = targetSection.querySelectorAll('.fade-in');
                elements.forEach(el => {
                    el.classList.add('visible');
                });
            }, 100);
        }

        // Logout functionality
        function logout() {
            if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                window.location.href = 'index.html';
            }
        }

        // Modal functionality
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('active');
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('active');
        }

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', function() {
            // Trigger initial animations
            setTimeout(() => {
                document.querySelectorAll('.fade-in').forEach(el => {
                    el.classList.add('visible');
                });
            }, 100);

            // Add click handlers for form interactions
            document.querySelectorAll('.form-control').forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 4px 15px rgba(102, 126, 234, 0.2)';
                });

                input.addEventListener('blur', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '';
                });
            });

            // Add hover effects to cards
            document.querySelectorAll('.stat-card, .content-card, .quick-action').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Simulate real-time updates
            setInterval(() => {
                const statNumbers = document.querySelectorAll('.stat-number');
                statNumbers.forEach(stat => {
                    const currentValue = parseInt(stat.textContent.replace(/\D/g, ''));
                    const change = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
                    if (change !== 0) {
                        stat.textContent = (currentValue + change).toLocaleString();
                    }
                });
            }, 30000); // Update every 30 seconds
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                closeMobileSidebar();
            }
        });
    </script>

@endsection
