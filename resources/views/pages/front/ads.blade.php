@extends('layouts.app')

@section('title', "Annonces")

@section('content')
<main class="main">
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="breadcrumb">
                <a href="/"><i class="fas fa-home"></i> Accueil</a>
                <span class="separator">/</span>
                <span class="current">Propriétés</span>
            </div>
            <h1 class="page-title">
                <i class="fas fa-building"></i>
                Toutes les Propriétés
            </h1>
            <p class="page-subtitle">Découvrez notre collection complète de propriétés disponibles</p>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="filters-section">
        <div class="container">
            <div class="filters-header">
                <h2><i class="fas fa-filter"></i> Filtrer les résultats</h2>
                <button class="mobile-filter-btn" id="mobileFilterBtn">
                    <i class="fas fa-sliders-h"></i> Filtres
                </button>
            </div>

            <div class="filters-container" id="filtersContainer">
                <div class="filter-group">
                    <label>Type de bien</label>
                    <select class="filter-control">
                        <option value="">Tous les types</option>
                        <option value="house">Maison</option>
                        <option value="apartment">Appartement</option>
                        <option value="land">Terrain</option>
                        <option value="commercial">Commercial</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Transaction</label>
                    <select class="filter-control">
                        <option value="">Achat & Location</option>
                        <option value="sale">Vente</option>
                        <option value="rent">Location</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Ville</label>
                    <select class="filter-control">
                        <option value="">Toutes les villes</option>
                        <option value="cotonou">Cotonou</option>
                        <option value="porto-novo">Porto-Novo</option>
                        <option value="parakou">Parakou</option>
                        <option value="abomey-calavi">Abomey-Calavi</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Prix max</label>
                    <select class="filter-control">
                        <option value="">Tous les prix</option>
                        <option value="10000000">10M FCFA</option>
                        <option value="25000000">25M FCFA</option>
                        <option value="50000000">50M FCFA</option>
                        <option value="100000000">100M FCFA</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Chambres</label>
                    <select class="filter-control">
                        <option value="">Toutes</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                    </select>
                </div>

                <div class="filter-group">
                    <button class="search-button" id="applyFilters">
                        <i class="fas fa-search"></i>
                        <span class="btn-text">Appliquer</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="results-section">
        <div class="container">
            <div class="results-header">
                <div class="results-info">
                    <h3><span id="resultsCount">24</span> propriétés trouvées</h3>
                </div>
                <div class="sort-controls">
                    <label>Trier par:</label>
                    <select class="sort-control">
                        <option value="newest">Plus récent</option>
                        <option value="price-low">Prix croissant</option>
                        <option value="price-high">Prix décroissant</option>
                        <option value="area">Surface</option>
                    </select>
                    <div class="view-toggle">
                        <button class="view-btn active" data-view="grid">
                            <i class="fas fa-th"></i>
                        </button>
                        <button class="view-btn" data-view="list">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="properties-container" id="propertiesContainer">
                <!-- Property cards will be generated by JavaScript -->
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="page-btn" disabled>
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <span class="page-dots">...</span>
                <button class="page-btn">8</button>
                <button class="page-btn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
</main>
@endsection