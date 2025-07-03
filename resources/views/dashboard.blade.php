@extends('/layouts.app') {{-- ou 'layouts.front' si ton layout s'appelle front.blade.php --}}

@section('content')

<!-- Dashboard Container Isolé -->
<div id="dashboard-container">
    <div class="db-layout">
        <!-- Overlay mobile -->
        <div class="db-overlay" id="dbOverlay"></div>

        <!-- Sidebar -->
        <aside class="db-sidebar" id="dbSidebar">
            <div class="db-sidebar-header">
                <a href="index.html" class="db-logo">
                    <i class="fas fa-home"></i>
                    <span class="db-logo-text">ImmobilierBenin</span>
                </a>
                <button class="db-toggle" id="dbToggle">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>

            <nav class="db-nav">
                <div class="db-nav-section">
                    <div class="db-nav-title">Principal</div>
                    <div class="db-nav-item">
                        <a
                            href="#"
                            class="db-nav-link db-active"
                            data-section="dashboard">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="db-nav-text">Tableau de bord</span>
                        </a>
                    </div>
                    <div class="db-nav-item">
                        <a href="#" class="db-nav-link" data-section="properties">
                            <i class="fas fa-home"></i>
                            <span class="db-nav-text">Mes Propriétés</span>
                            <span class="db-badge">15</span>
                        </a>
                    </div>
                    <div class="db-nav-item">
                        <a href="#" class="db-nav-link" data-section="messages">
                            <i class="fas fa-envelope"></i>
                            <span class="db-nav-text">Messages</span>
                            <span class="db-badge">7</span>
                        </a>
                    </div>
                    <div class="db-nav-item">
                        <a href="#" class="db-nav-link" data-section="analytics">
                            <i class="fas fa-chart-bar"></i>
                            <span class="db-nav-text">Analytiques</span>
                        </a>
                    </div>
                </div>

                <!--
                <div class="db-nav-section">
                    <div class="db-nav-title">Gestion</div>
                    <div class="db-nav-item">
                        <a href="#" class="db-nav-link" data-section="users">
                            <i class="fas fa-users"></i>
                            <span class="db-nav-text">Utilisateurs</span>
                        </a>
                    </div>
                    <div class="db-nav-item">
                        <a href="#" class="db-nav-link" data-section="reports">
                            <i class="fas fa-file-alt"></i>
                            <span class="db-nav-text">Rapports</span>
                        </a>
                    </div>
                    <div class="db-nav-item">
                        <a href="#" class="db-nav-link" data-section="settings">
                            <i class="fas fa-cog"></i>
                            <span class="db-nav-text">Paramètres</span>
                        </a>
                    </div>
                </div>
-->

                <div class="db-nav-section">
                    <div class="db-nav-title">Compte</div>
                    <div class="db-nav-item">
                        <a href="#" class="db-nav-link" data-section="profile">
                            <i class="fas fa-user"></i>
                            <span class="db-nav-text">Mon Profil</span>
                        </a>
                    </div>
                    <div class="db-nav-item">
                        <a href="index.html" class="db-nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="db-nav-text">Déconnexion</span>
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="db-main">
            <!-- Header -->
            <header class="db-header">
                <div class="db-header-left">
                    <button class="db-mobile-toggle" id="dbMobileToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="db-title">Tableau de Bord</h1>
                </div>

                <div class="db-header-right">
                    <div class="db-search">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher..." />
                    </div>

                    <button class="db-notifications">
                        <i class="fas fa-bell"></i>
                        <span class="db-notif-badge">3</span>
                    </button>

                    <div class="db-user">
                        <div class="db-avatar">JD</div>
                        <div class="db-user-info">
                            <div class="db-user-name">Jean Dupont</div>
                            <div class="db-user-role">Agent Premium</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="db-content">
                <!-- Dashboard Section -->
                <div id="db-dashboard-section" class="db-content-view">
                    <!-- Stats Cards -->
                    <div class="db-stats">
                        <div class="db-stat-card">
                            <div class="db-stat-header">
                                <div class="db-stat-icon db-properties">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <div class="db-stat-number">15</div>
                            <div class="db-stat-label">Propriétés actives</div>
                            <div class="db-stat-change db-positive">
                                <i class="fas fa-arrow-up"></i>
                                +3 ce mois
                            </div>
                        </div>

                        <div class="db-stat-card">
                            <div class="db-stat-header">
                                <div class="db-stat-icon db-views">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                            <div class="db-stat-number">2,847</div>
                            <div class="db-stat-label">Vues totales</div>
                            <div class="db-stat-change db-positive">
                                <i class="fas fa-arrow-up"></i>
                                +25% cette semaine
                            </div>
                        </div>

                        <div class="db-stat-card">
                            <div class="db-stat-header">
                                <div class="db-stat-icon db-messages">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="db-stat-number">47</div>
                            <div class="db-stat-label">Messages reçus</div>
                            <div class="db-stat-change db-positive">
                                <i class="fas fa-arrow-up"></i>
                                +8 aujourd'hui
                            </div>
                        </div>

                        <div class="db-stat-card">
                            <div class="db-stat-header">
                                <div class="db-stat-icon db-revenue">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                            <div class="db-stat-number">12.8M</div>
                            <div class="db-stat-label">Valeur portefeuille (FCFA)</div>
                            <div class="db-stat-change db-positive">
                                <i class="fas fa-arrow-up"></i>
                                +18% ce mois
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="db-section">
                        <div class="db-section-header">
                            <h2 class="db-section-title">
                                <i class="fas fa-clock"></i>
                                Activité Récente
                            </h2>
                            <div class="db-section-actions">
                                <button
                                    class="db-btn db-btn-primary"
                                    onclick="dbOpenModal('dbAddPropertyModal')">
                                    <i class="fas fa-plus"></i>
                                    Nouvelle Propriété
                                </button>
                            </div>
                        </div>
                        <div style="padding: 2rem">
                            <p>Contenu de l'activité récente...</p>
                        </div>
                    </div>
                </div>

                <!-- Properties Section -->
                <div id="db-properties-section" class="db-content-view db-hidden">
                    <div class="db-section">
                        <div class="db-section-header">
                            <h2 class="db-section-title">
                                <i class="fas fa-home"></i>
                                Mes Propriétés
                            </h2>
                            <div class="db-section-actions">
                                <div class="db-search">
                                    <i class="fas fa-search"></i>
                                    <input
                                        type="text"
                                        placeholder="Rechercher une propriété..."
                                        id="dbPropertySearch" />
                                </div>
                                <button
                                    class="db-btn db-btn-primary"
                                    onclick="dbOpenModal('dbAddPropertyModal')">
                                    <i class="fas fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                        </div>

                        <div class="db-table-container">
                            <div class="db-table-responsive">
                                <table class="db-table">
                                    <thead>
                                        <tr>
                                            <th>Propriété</th>
                                            <th>Type</th>
                                            <th>Prix</th>
                                            <th>Statut</th>
                                            <th>Vues</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Propriété">
                                                <div class="db-property">
                                                    <div class="db-property-thumb">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                                            alt="Villa moderne" />
                                                    </div>
                                                    <div class="db-property-details">
                                                        <h4>Villa moderne à Cotonou</h4>
                                                        <p>Cotonou, Bénin</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Type">Vente</td>
                                            <td data-label="Prix">85,000,000 FCFA</td>
                                            <td data-label="Statut">
                                                <span class="db-status db-active">Actif</span>
                                            </td>
                                            <td data-label="Vues">247</td>
                                            <td data-label="Date">15 Mars 2024</td>
                                            <td data-label="Actions">
                                                <div class="db-actions">
                                                    <button
                                                        class="db-action-btn db-view"
                                                        title="Voir">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button
                                                        class="db-action-btn db-edit"
                                                        title="Modifier">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button
                                                        class="db-action-btn db-delete"
                                                        title="Supprimer"
                                                        onclick="dbDeleteProperty(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Propriété">
                                                <div class="db-property">
                                                    <div class="db-property-thumb">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                                            alt="Appartement de luxe" />
                                                    </div>
                                                    <div class="db-property-details">
                                                        <h4>Appartement de luxe</h4>
                                                        <p>Porto-Novo, Bénin</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Type">Location</td>
                                            <td data-label="Prix">450,000 FCFA/mois</td>
                                            <td data-label="Statut">
                                                <span class="db-status db-active">Actif</span>
                                            </td>
                                            <td data-label="Vues">189</td>
                                            <td data-label="Date">12 Mars 2024</td>
                                            <td data-label="Actions">
                                                <div class="db-actions">
                                                    <button
                                                        class="db-action-btn db-view"
                                                        title="Voir">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button
                                                        class="db-action-btn db-edit"
                                                        title="Modifier">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button
                                                        class="db-action-btn db-delete"
                                                        title="Supprimer"
                                                        onclick="dbDeleteProperty(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Propriété">
                                                <div class="db-property">
                                                    <div class="db-property-thumb">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                                            alt="Maison familiale" />
                                                    </div>
                                                    <div class="db-property-details">
                                                        <h4>Maison familiale</h4>
                                                        <p>Parakou, Bénin</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Type">Vente</td>
                                            <td data-label="Prix">35,000,000 FCFA</td>
                                            <td data-label="Statut">
                                                <span class="db-status db-pending">En attente</span>
                                            </td>
                                            <td data-label="Vues">156</td>
                                            <td data-label="Date">10 Mars 2024</td>
                                            <td data-label="Actions">
                                                <div class="db-actions">
                                                    <button
                                                        class="db-action-btn db-view"
                                                        title="Voir">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button
                                                        class="db-action-btn db-edit"
                                                        title="Modifier">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button
                                                        class="db-action-btn db-delete"
                                                        title="Supprimer"
                                                        onclick="dbDeleteProperty(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Propriété">
                                                <div class="db-property">
                                                    <div class="db-property-thumb">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                                            alt="Duplex spacieux" />
                                                    </div>
                                                    <div class="db-property-details">
                                                        <h4>Duplex spacieux</h4>
                                                        <p>Bohicon, Bénin</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Type">Vente</td>
                                            <td data-label="Prix">65,000,000 FCFA</td>
                                            <td data-label="Statut">
                                                <span class="db-status db-active">Actif</span>
                                            </td>
                                            <td data-label="Vues">203</td>
                                            <td data-label="Date">08 Mars 2024</td>
                                            <td data-label="Actions">
                                                <div class="db-actions">
                                                    <button
                                                        class="db-action-btn db-view"
                                                        title="Voir">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button
                                                        class="db-action-btn db-edit"
                                                        title="Modifier">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button
                                                        class="db-action-btn db-delete"
                                                        title="Supprimer"
                                                        onclick="dbDeleteProperty(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="Propriété">
                                                <div class="db-property">
                                                    <div class="db-property-thumb">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                                            alt="Terrain constructible" />
                                                    </div>
                                                    <div class="db-property-details">
                                                        <h4>Terrain constructible</h4>
                                                        <p>Abomey-Calavi, Bénin</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Type">Vente</td>
                                            <td data-label="Prix">15,000,000 FCFA</td>
                                            <td data-label="Statut">
                                                <span class="db-status db-sold">Vendu</span>
                                            </td>
                                            <td data-label="Vues">89</td>
                                            <td data-label="Date">05 Mars 2024</td>
                                            <td data-label="Actions">
                                                <div class="db-actions">
                                                    <button
                                                        class="db-action-btn db-view"
                                                        title="Voir">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button
                                                        class="db-action-btn db-edit"
                                                        title="Modifier"
                                                        disabled>
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button
                                                        class="db-action-btn db-delete"
                                                        title="Supprimer"
                                                        onclick="dbDeleteProperty(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="db-pagination-container">
                                <div class="db-pagination">
                                    <div class="db-pagination-info">
                                        Affichage de 1 à 5 sur 15 résultats
                                    </div>

                                    <div class="db-pagination-controls">
                                        <button class="db-page-btn" disabled>
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button class="db-page-btn db-active">1</button>
                                        <button class="db-page-btn">2</button>
                                        <button class="db-page-btn">3</button>
                                        <button class="db-page-btn">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>

                                    <div class="db-page-size">
                                        <span>Afficher</span>
                                        <select>
                                            <option value="5" selected>5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select>
                                        <span>par page</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings Section -->
                <div id="db-settings-section" class="db-content-view db-hidden">
                    <div class="db-section">
                        <div class="db-section-header">
                            <h2 class="db-section-title">
                                <i class="fas fa-cog"></i>
                                Paramètres du Compte
                            </h2>
                        </div>

                        <form class="db-form">
                            <div class="db-form-group">
                                <label class="db-label">
                                    <i class="fas fa-user"></i>
                                    Prénom
                                </label>
                                <input type="text" class="db-input" value="Jean" required />
                            </div>

                            <div class="db-form-group">
                                <label class="db-label">
                                    <i class="fas fa-user"></i>
                                    Nom
                                </label>
                                <input
                                    type="text"
                                    class="db-input"
                                    value="Dupont"
                                    required />
                            </div>

                            <div class="db-form-group db-full">
                                <label class="db-label">
                                    <i class="fas fa-envelope"></i>
                                    Email
                                </label>
                                <input
                                    type="email"
                                    class="db-input"
                                    value="jean.dupont@email.com"
                                    required />
                            </div>

                            <div class="db-form-group">
                                <label class="db-label">
                                    <i class="fas fa-phone"></i>
                                    Téléphone
                                </label>
                                <input
                                    type="tel"
                                    class="db-input"
                                    value="+229 XX XX XX XX"
                                    required />
                            </div>

                            <div class="db-form-group">
                                <label class="db-label">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Ville
                                </label>
                                <select class="db-input" required>
                                    <option value="cotonou" selected>Cotonou</option>
                                    <option value="porto-novo">Porto-Novo</option>
                                    <option value="parakou">Parakou</option>
                                    <option value="abomey-calavi">Abomey-Calavi</option>
                                </select>
                            </div>

                            <div class="db-form-group db-full">
                                <label class="db-label">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Adresse
                                </label>
                                <input
                                    type="text"
                                    class="db-input"
                                    value="123 Avenue de l'Indépendance"
                                    required />
                            </div>

                            <div class="db-form-group db-full">
                                <label class="db-label">
                                    <i class="fas fa-info-circle"></i>
                                    Bio / Description
                                </label>
                                <textarea
                                    class="db-input"
                                    rows="4"
                                    placeholder="Parlez-nous de vous...">
Agent immobilier expérimenté spécialisé dans les propriétés de luxe à Cotonou.</textarea>
                            </div>

                            <div class="db-form-group">
                                <label class="db-label">
                                    <i class="fas fa-lock"></i>
                                    Nouveau mot de passe
                                </label>
                                <input
                                    type="password"
                                    class="db-input"
                                    placeholder="Laisser vide pour ne pas changer" />
                            </div>

                            <div class="db-form-group">
                                <label class="db-label">
                                    <i class="fas fa-lock"></i>
                                    Confirmer le mot de passe
                                </label>
                                <input
                                    type="password"
                                    class="db-input"
                                    placeholder="Confirmer le nouveau mot de passe" />
                            </div>

                            <div class="db-form-group db-full">
                                <button type="submit" class="db-btn db-btn-primary">
                                    <i class="fas fa-save"></i>
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Other sections (hidden by default) -->
                <div id="db-messages-section" class="db-content-view db-hidden">
                    <div class="db-section">
                        <div class="db-section-header">
                            <h2 class="db-section-title">
                                <i class="fas fa-envelope"></i>
                                Messages
                            </h2>
                        </div>
                        <div style="padding: 2rem">
                            <p>Section des messages en cours de développement...</p>
                        </div>
                    </div>
                </div>

                <div id="db-analytics-section" class="db-content-view db-hidden">
                    <div class="db-section">
                        <div class="db-section-header">
                            <h2 class="db-section-title">
                                <i class="fas fa-chart-bar"></i>
                                Analytiques
                            </h2>
                        </div>
                        <div style="padding: 2rem">
                            <p>Section analytiques en cours de développement...</p>
                        </div>
                    </div>
                </div>

                <div id="db-users-section" class="db-content-view db-hidden">
                    <div class="db-section">
                        <div class="db-section-header">
                            <h2 class="db-section-title">
                                <i class="fas fa-users"></i>
                                Utilisateurs
                            </h2>
                        </div>
                        <div style="padding: 2rem">
                            <p>Section utilisateurs en cours de développement...</p>
                        </div>
                    </div>
                </div>

                <div id="db-reports-section" class="db-content-view db-hidden">
                    <div class="db-section">
                        <div class="db-section-header">
                            <h2 class="db-section-title">
                                <i class="fas fa-file-alt"></i>
                                Rapports
                            </h2>
                        </div>
                        <div style="padding: 2rem">
                            <p>Section rapports en cours de développement...</p>
                        </div>
                    </div>
                </div>

                <div id="db-profile-section" class="db-content-view db-hidden">
                    <div class="db-section">
                        <div class="db-section-header">
                            <h2 class="db-section-title">
                                <i class="fas fa-user"></i>
                                Mon Profil
                            </h2>
                        </div>
                        <div style="padding: 2rem">
                            <p>Section profil en cours de développement...</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Property Modal -->
    <div id="dbAddPropertyModal" class="db-modal">
        <div class="db-modal-content">
            <div class="db-modal-header">
                <h2 class="db-modal-title">
                    <i class="fas fa-plus"></i>
                    Ajouter une nouvelle propriété
                </h2>
                <button
                    class="db-close"
                    onclick="dbCloseModal('dbAddPropertyModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form class="db-form">
                <div class="db-form-group">
                    <label class="db-label">
                        <i class="fas fa-home"></i>
                        Titre de la propriété
                    </label>
                    <input
                        type="text"
                        class="db-input"
                        placeholder="Ex: Villa moderne à Cotonou"
                        required />
                </div>
                <div class="db-form-group">
                    <label class="db-label">
                        <i class="fas fa-tag"></i>
                        Type de transaction
                    </label>
                    <select class="db-input" required>
                        <option value="">Sélectionner</option>
                        <option value="vente">Vente</option>
                        <option value="location">Location</option>
                    </select>
                </div>
                <div class="db-form-group">
                    <label class="db-label">
                        <i class="fas fa-building"></i>
                        Type de propriété
                    </label>
                    <select class="db-input" required>
                        <option value="">Sélectionner</option>
                        <option value="maison">Maison</option>
                        <option value="appartement">Appartement</option>
                        <option value="villa">Villa</option>
                        <option value="terrain">Terrain</option>
                    </select>
                </div>
                <div class="db-form-group">
                    <label class="db-label">
                        <i class="fas fa-dollar-sign"></i>
                        Prix (FCFA)
                    </label>
                    <input
                        type="number"
                        class="db-input"
                        placeholder="Ex: 85000000"
                        required />
                </div>
                <div class="db-form-group db-full">
                    <label class="db-label">
                        <i class="fas fa-align-left"></i>
                        Description
                    </label>
                    <textarea
                        class="db-input"
                        rows="4"
                        placeholder="Décrivez votre propriété..."
                        required></textarea>
                </div>
            </form>
            <div class="db-modal-footer">
                <button
                    type="button"
                    class="db-btn db-btn-secondary"
                    onclick="dbCloseModal('dbAddPropertyModal')">
                    <i class="fas fa-times"></i>
                    Annuler
                </button>
                <button type="submit" class="db-btn db-btn-primary">
                    <i class="fas fa-save"></i>
                    Publier la propriété
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Variables globales avec préfixe
    const dbSidebar = document.getElementById("dbSidebar");
    const dbToggle = document.getElementById("dbToggle");
    const dbMobileToggle = document.getElementById("dbMobileToggle");
    const dbOverlay = document.getElementById("dbOverlay");
    const dbToggleIcon = dbToggle.querySelector("i");

    // Fonctions avec préfixe pour éviter les conflits
    function dbToggleSidebar() {
        dbSidebar.classList.toggle("db-collapsed");

        if (dbSidebar.classList.contains("db-collapsed")) {
            dbToggleIcon.className = "fas fa-chevron-right";
        } else {
            dbToggleIcon.className = "fas fa-chevron-left";
        }
    }

    function dbShowSidebar() {
        dbSidebar.classList.add("db-show");
        dbOverlay.classList.add("db-show");
    }

    function dbHideSidebar() {
        dbSidebar.classList.remove("db-show");
        dbOverlay.classList.remove("db-show");
    }

    // Event listeners
    dbToggle.addEventListener("click", dbToggleSidebar);
    dbMobileToggle.addEventListener("click", dbShowSidebar);
    dbOverlay.addEventListener("click", dbHideSidebar);

    // Navigation
    const dbNavLinks = document.querySelectorAll(
        "#dashboard-container .db-nav-link[data-section]"
    );
    const dbContentViews = document.querySelectorAll(
        "#dashboard-container .db-content-view"
    );
    const dbTitle = document.querySelector("#dashboard-container .db-title");

    function dbShowSection(sectionId) {
        dbContentViews.forEach((view) => view.classList.add("db-hidden"));

        const targetSection = document.getElementById(
            "db-" + sectionId + "-section"
        );
        if (targetSection) {
            targetSection.classList.remove("db-hidden");
        }

        dbNavLinks.forEach((link) => link.classList.remove("db-active"));
        const activeLink = document.querySelector(
            `#dashboard-container [data-section="${sectionId}"]`
        );
        if (activeLink) {
            activeLink.classList.add("db-active");
            const linkText = activeLink.querySelector(".db-nav-text").textContent;
            dbTitle.textContent = linkText;
        }

        if (window.innerWidth <= 1024) {
            dbHideSidebar();
        }
    }

    dbNavLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const sectionId = link.getAttribute("data-section");
            dbShowSection(sectionId);
        });
    });

    // Modal functions
    function dbOpenModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add("db-show");
            document.body.style.overflow = "hidden";
        }
    }

    function dbCloseModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove("db-show");
            document.body.style.overflow = "auto";
        }
    }

    // Close modal when clicking outside
    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("db-modal")) {
            const modalId = e.target.id;
            dbCloseModal(modalId);
        }
    });

    // Close modal with Escape key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            const openModal = document.querySelector(
                "#dashboard-container .db-modal.db-show"
            );
            if (openModal) {
                dbCloseModal(openModal.id);
            }
        }
    });

    // Search functionality
    const dbPropertySearch = document.getElementById("dbPropertySearch");
    if (dbPropertySearch) {
        dbPropertySearch.addEventListener("input", function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll(
                "#dashboard-container .db-table tbody tr"
            );

            tableRows.forEach((row) => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    }

    // Delete property function
    function dbDeleteProperty(button) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette propriété?")) {
            const row = button.closest("tr");
            row.style.animation = "dbFadeOut 0.3s ease-out";

            setTimeout(() => {
                row.remove();
                dbShowNotification("Propriété supprimée avec succès!", "success");
            }, 300);
        }
    }

    // Notification system
    function dbShowNotification(message, type = "success") {
        const notification = document.createElement("div");
        notification.className = `db-notification ${type}`;
        notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 2rem;
                background: var(--db-white);
                padding: 1rem 1.5rem;
                border-radius: 8px;
                box-shadow: var(--db-shadow-xl);
                border-left: 4px solid ${
                  type === "success" ? "#22c55e" : "#ef4444"
                };
                z-index: 3000;
                transform: translateX(400px);
                transition: var(--db-transition);
                display: flex;
                align-items: center;
                gap: 0.5rem;
                font-family: "Inter", sans-serif;
            `;

        notification.innerHTML = `
                <i class="fas fa-${
                  type === "success" ? "check-circle" : "exclamation-circle"
                }" style="color: ${
          type === "success" ? "#22c55e" : "#ef4444"
        };"></i>
                <span>${message}</span>
            `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.transform = "translateX(0)";
        }, 100);

        setTimeout(() => {
            notification.style.transform = "translateX(400px)";
            setTimeout(() => {
                if (document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }

    // Pagination functionality
    const dbPageButtons = document.querySelectorAll(
        "#dashboard-container .db-page-btn"
    );
    dbPageButtons.forEach((button) => {
        button.addEventListener("click", function() {
            if (!this.disabled && !this.classList.contains("db-active")) {
                dbPageButtons.forEach((btn) => btn.classList.remove("db-active"));

                if (!this.querySelector("i")) {
                    this.classList.add("db-active");
                }

                dbShowNotification("Page changée avec succès!", "success");
            }
        });
    });

    // Page size selector
    const dbPageSizeSelector = document.querySelector(
        "#dashboard-container .db-page-size select"
    );
    if (dbPageSizeSelector) {
        dbPageSizeSelector.addEventListener("change", function() {
            dbShowNotification(
                `Affichage modifié à ${this.value} éléments par page`,
                "success"
            );
        });
    }

    // Responsive handling
    function dbHandleResize() {
        if (window.innerWidth <= 1024) {
            dbSidebar.classList.remove("db-collapsed");
            dbHideSidebar();
        } else {
            dbSidebar.classList.add("db-show");
            dbOverlay.classList.remove("db-show");
        }
    }

    window.addEventListener("resize", dbHandleResize);
    dbHandleResize();

    // Form submission handling
    document.addEventListener("submit", function(e) {
        if (!e.target.closest("#dashboard-container")) return;

        e.preventDefault();

        const submitBtn = e.target.querySelector('button[type="submit"]');
        if (submitBtn) {
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML =
                '<i class="fas fa-spinner fa-spin"></i> Enregistrement...';
            submitBtn.disabled = true;

            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;

                const modal = e.target.closest(".db-modal");
                if (modal) {
                    dbCloseModal(modal.id);
                }

                dbShowNotification("Données enregistrées avec succès!", "success");
            }, 2000);
        }
    });

    // Initialize dashboard
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            dbShowNotification("Bienvenue sur votre tableau de bord!", "success");
        }, 1000);
    });
</script>
@endsection