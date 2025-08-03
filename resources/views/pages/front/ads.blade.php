@extends('layouts.app')

@section('content')
    <!-- Properties Page -->
    <section style="padding: 4rem 0;">
        <div class="container">
            <div class="section-header fade-in">
                <h2 class="section-title">Toutes nos propriétés</h2>
                <p class="section-subtitle">
                    Découvrez notre catalogue complet de biens immobiliers
                </p>
            </div>

            <!-- Filters -->
            <div class="content-card fade-in" style="margin-bottom: 3rem;">
                <div class="card-header">
                    <div class="card-title">
                        <i class="fas fa-filter"></i> Filtres de recherche
                    </div>
                </div>
                <div class="card-content">
                    <div class="search-form">
                        <div class="form-group">
                            <label><i class="fas fa-home"></i> Type de bien</label>
                            <select class="form-control">
                                <option>Tous les types</option>
                                <option>Maison</option>
                                <option>Appartement</option>
                                <option>Terrain</option>
                                <option>Commercial</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-tag"></i> Transaction</label>
                            <select class="form-control">
                                <option>Achat ou Location</option>
                                <option>Achat</option>
                                <option>Location</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-map-marker-alt"></i> Ville</label>
                            <select class="form-control">
                                <option>Toutes les villes</option>
                                <option>Cotonou</option>
                                <option>Porto-Novo</option>
                                <option>Parakou</option>
                                <option>Abomey-Calavi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-dollar-sign"></i> Budget max</label>
                            <select class="form-control">
                                <option>Tous les budgets</option>
                                <option>
                                    < 10M FCFA</option>
                                <option>10M - 50M FCFA</option>
                                <option>50M - 100M FCFA</option>
                                <option>> 100M FCFA</option>
                            </select>
                        </div>
                    </div>
                    <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 1rem;">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i> Appliquer les filtres
                        </button>
                        <button class="btn btn-outline" style="color: #667eea; border-color: #667eea;">
                            <i class="fas fa-undo"></i> Réinitialiser
                        </button>
                    </div>
                </div>
            </div>

            <!-- Properties Grid -->
            <div class="properties-grid">
                <!-- Property 1 -->
                <div class="property-card fade-in">
                    <div class="property-image">
                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Villa moderne">
                        <div class="property-badge">
                            <i class="fas fa-star"></i> Coup de cœur
                        </div>
                        <div class="property-type">Vente</div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Villa moderne à Cotonou</h3>
                        <div class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Cotonou, Littoral
                        </div>
                        <div class="property-price">85,000,000 FCFA</div>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-bed"></i> 4 ch.
                            </div>
                            <div class="feature">
                                <i class="fas fa-bath"></i> 3 sdb
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i> 250 m²
                            </div>
                        </div>
                        <div class="property-actions">
                            <button class="btn-small btn-primary-small" onclick="showPage('propriete')">
                                <i class="fas fa-eye"></i> Voir détails
                            </button>
                            <button class="btn-small btn-outline-small">
                                <i class="fas fa-heart"></i> Favoris
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 2 -->
                <div class="property-card fade-in">
                    <div class="property-image">
                        <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Appartement luxe">
                        <div class="property-badge">
                            <i class="fas fa-fire"></i> Populaire
                        </div>
                        <div class="property-type">Location</div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Appartement de luxe</h3>
                        <div class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Porto-Novo, Ouémé
                        </div>
                        <div class="property-price">450,000 FCFA/mois</div>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-bed"></i> 3 ch.
                            </div>
                            <div class="feature">
                                <i class="fas fa-bath"></i> 2 sdb
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i> 120 m²
                            </div>
                        </div>
                        <div class="property-actions">
                            <button class="btn-small btn-primary-small" onclick="showPage('propriete')">
                                <i class="fas fa-eye"></i> Voir détails
                            </button>
                            <button class="btn-small btn-outline-small">
                                <i class="fas fa-heart"></i> Favoris
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 3 -->
                <div class="property-card fade-in">
                    <div class="property-image">
                        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Terrain">
                        <div class="property-badge">
                            <i class="fas fa-gem"></i> Exclusif
                        </div>
                        <div class="property-type">Vente</div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Terrain constructible</h3>
                        <div class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Abomey-Calavi, Atlantique
                        </div>
                        <div class="property-price">15,000,000 FCFA</div>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-tree"></i> Arboré
                            </div>
                            <div class="feature">
                                <i class="fas fa-road"></i> Accès route
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i> 500 m²
                            </div>
                        </div>
                        <div class="property-actions">
                            <button class="btn-small btn-primary-small" onclick="showPage('propriete')">
                                <i class="fas fa-eye"></i> Voir détails
                            </button>
                            <button class="btn-small btn-outline-small">
                                <i class="fas fa-heart"></i> Favoris
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 4 -->
                <div class="property-card fade-in">
                    <div class="property-image">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Maison familiale">
                        <div class="property-badge">
                            <i class="fas fa-home"></i> Familial
                        </div>
                        <div class="property-type">Vente</div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Maison familiale</h3>
                        <div class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Parakou, Borgou
                        </div>
                        <div class="property-price">45,000,000 FCFA</div>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-bed"></i> 5 ch.
                            </div>
                            <div class="feature">
                                <i class="fas fa-bath"></i> 3 sdb
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i> 180 m²
                            </div>
                        </div>
                        <div class="property-actions">
                            <button class="btn-small btn-primary-small" onclick="showPage('propriete')">
                                <i class="fas fa-eye"></i> Voir détails
                            </button>
                            <button class="btn-small btn-outline-small">
                                <i class="fas fa-heart"></i> Favoris
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 5 -->
                <div class="property-card fade-in">
                    <div class="property-image">
                        <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Studio moderne">
                        <div class="property-badge">
                            <i class="fas fa-bolt"></i> Nouveau
                        </div>
                        <div class="property-type">Location</div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Studio moderne</h3>
                        <div class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Cotonou, Littoral
                        </div>
                        <div class="property-price">180,000 FCFA/mois</div>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-bed"></i> 1 ch.
                            </div>
                            <div class="feature">
                                <i class="fas fa-bath"></i> 1 sdb
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i> 35 m²
                            </div>
                        </div>
                        <div class="property-actions">
                            <button class="btn-small btn-primary-small" onclick="showPage('propriete')">
                                <i class="fas fa-eye"></i> Voir détails
                            </button>
                            <button class="btn-small btn-outline-small">
                                <i class="fas fa-heart"></i> Favoris
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Property 6 -->
                <div class="property-card fade-in">
                    <div class="property-image">
                        <img src="https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="Bureau commercial">
                        <div class="property-badge">
                            <i class="fas fa-briefcase"></i> Commercial
                        </div>
                        <div class="property-type">Location</div>
                    </div>
                    <div class="property-content">
                        <h3 class="property-title">Bureau commercial</h3>
                        <div class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Porto-Novo, Ouémé
                        </div>
                        <div class="property-price">800,000 FCFA/mois</div>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-door-open"></i> 6 pièces
                            </div>
                            <div class="feature">
                                <i class="fas fa-car"></i> Parking
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i> 200 m²
                            </div>
                        </div>
                        <div class="property-actions">
                            <button class="btn-small btn-primary-small" onclick="showPage('propriete')">
                                <i class="fas fa-eye"></i> Voir détails
                            </button>
                            <button class="btn-small btn-outline-small">
                                <i class="fas fa-heart"></i> Favoris
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div style="display: flex; justify-content: center; align-items: center; gap: 1rem; margin-top: 3rem;">
                <button class="btn btn-outline" style="color: #667eea; border-color: #667eea;" disabled>
                    <i class="fas fa-chevron-left"></i> Précédent
                </button>
                <div style="display: flex; gap: 0.5rem;">
                    <button class="btn btn-primary" style="padding: 0.5rem 1rem;">1</button>
                    <button class="btn btn-outline"
                        style="color: #667eea; border-color: #667eea; padding: 0.5rem 1rem;">2</button>
                    <button class="btn btn-outline"
                        style="color: #667eea; border-color: #667eea; padding: 0.5rem 1rem;">3</button>
                    <span style="padding: 0.5rem;">...</span>
                    <button class="btn btn-outline"
                        style="color: #667eea; border-color: #667eea; padding: 0.5rem 1rem;">10</button>
                </div>
                <button class="btn btn-outline" style="color: #667eea; border-color: #667eea;">
                    Suivant <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
@endsection
