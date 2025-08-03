@extends('layouts.app')

@section('title', 'Annonces')

@section('content')

    <!-- Single Property Page -->
    <div class="page" id="page-propriete">
        <div style="padding-top: 100px;">
            <section style="padding: 4rem 0;">
                <div class="container">
                    <!-- Breadcrumb -->
                    <nav style="margin-bottom: 2rem;">
                        <div
                            style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-light); font-size: 0.9rem;">
                            <a href="#" onclick="showPage('home')" style="color: #667eea; text-decoration: none;">
                                <i class="fas fa-home"></i> Accueil
                            </a>
                            <i class="fas fa-chevron-right"></i>
                            <a href="#" onclick="showPage('proprietes')"
                                style="color: #667eea; text-decoration: none;">Propriétés</a>
                            <i class="fas fa-chevron-right"></i>
                            <span>Villa moderne à Cotonou</span>
                        </div>
                    </nav>

                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; align-items: start;">
                        <!-- Property Details -->
                        <div>
                            <!-- Image Gallery -->
                            <div class="content-card fade-in" style="margin-bottom: 2rem;">
                                <div style="position: relative; height: 400px; border-radius: 15px; overflow: hidden;">
                                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                        alt="Villa moderne" style="width: 100%; height: 100%; object-fit: cover;">
                                    <div class="property-badge" style="position: absolute; top: 1rem; left: 1rem;">
                                        <i class="fas fa-star"></i> Coup de cœur
                                    </div>
                                    <div class="property-type" style="position: absolute; top: 1rem; right: 1rem;">
                                        Vente</div>
                                </div>

                                <!-- Thumbnail Gallery -->
                                <div
                                    style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-top: 1rem;">
                                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                        style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px; cursor: pointer; border: 2px solid #667eea;">
                                    <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                        style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px; cursor: pointer; border: 2px solid transparent;">
                                    <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                        style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px; cursor: pointer; border: 2px solid transparent;">
                                    <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                        style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px; cursor: pointer; border: 2px solid transparent;">
                                </div>
                            </div>

                            <!-- Property Info -->
                            <div class="content-card fade-in">
                                <div class="card-header">
                                    <div>
                                        <h1
                                            style="font-size: 2rem; font-weight: 800; color: var(--text-dark); margin-bottom: 0.5rem;">
                                            Villa moderne à Cotonou
                                        </h1>
                                        <div class="property-location" style="font-size: 1.1rem;">
                                            <i class="fas fa-map-marker-alt"></i>
                                            Cotonou, Littoral, Bénin
                                        </div>
                                    </div>
                                    <div class="property-price" style="font-size: 2.5rem; margin: 0;">
                                        85,000,000 FCFA
                                    </div>
                                </div>

                                <div class="card-content">
                                    <!-- Features -->
                                    <div
                                        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                                        <div
                                            style="text-align: center; padding: 1rem; background: var(--bg-gray); border-radius: 10px;">
                                            <i class="fas fa-bed"
                                                style="font-size: 2rem; color: #667eea; margin-bottom: 0.5rem;"></i>
                                            <div style="font-weight: 600;">4 Chambres</div>
                                        </div>
                                        <div
                                            style="text-align: center; padding: 1rem; background: var(--bg-gray); border-radius: 10px;">
                                            <i class="fas fa-bath"
                                                style="font-size: 2rem; color: #667eea; margin-bottom: 0.5rem;"></i>
                                            <div style="font-weight: 600;">3 Salles de bain</div>
                                        </div>
                                        <div
                                            style="text-align: center; padding: 1rem; background: var(--bg-gray); border-radius: 10px;">
                                            <i class="fas fa-ruler-combined"
                                                style="font-size: 2rem; color: #667eea; margin-bottom: 0.5rem;"></i>
                                            <div style="font-weight: 600;">250 m²</div>
                                        </div>
                                        <div
                                            style="text-align: center; padding: 1rem; background: var(--bg-gray); border-radius: 10px;">
                                            <i class="fas fa-car"
                                                style="font-size: 2rem; color: #667eea; margin-bottom: 0.5rem;"></i>
                                            <div style="font-weight: 600;">2 Parkings</div>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div style="margin-bottom: 2rem;">
                                        <h3
                                            style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem; color: var(--text-dark);">
                                            <i class="fas fa-info-circle" style="color: #667eea;"></i> Description
                                        </h3>
                                        <p style="color: var(--text-light); line-height: 1.8; font-size: 1.1rem;">
                                            Magnifique villa moderne située dans un quartier résidentiel calme de
                                            Cotonou.
                                            Cette propriété exceptionnelle offre un cadre de vie luxueux avec des
                                            finitions haut de gamme.
                                            La villa dispose d'un grand salon lumineux, d'une cuisine équipée moderne,
                                            de 4 chambres spacieuses
                                            dont une suite parentale avec dressing et salle de bain privative.
                                        </p>
                                        <p
                                            style="color: var(--text-light); line-height: 1.8; font-size: 1.1rem; margin-top: 1rem;">
                                            L'extérieur comprend un jardin paysager, une terrasse couverte idéale pour
                                            les moments de détente,
                                            et un parking sécurisé pour 2 véhicules. Proche des commodités : écoles,
                                            centres commerciaux,
                                            transports en commun.
                                        </p>
                                    </div>

                                    <!-- Amenities -->
                                    <div>
                                        <h3
                                            style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem; color: var(--text-dark);">
                                            <i class="fas fa-check-circle" style="color: #667eea;"></i> Équipements
                                        </h3>
                                        <div
                                            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                                            <div
                                                style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-light);">
                                                <i class="fas fa-wifi" style="color: #00b894;"></i> Internet haut
                                                débit
                                            </div>
                                            <div
                                                style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-light);">
                                                <i class="fas fa-shield-alt" style="color: #00b894;"></i> Sécurité
                                                24h/24
                                            </div>
                                            <div
                                                style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-light);">
                                                <i class="fas fa-swimming-pool" style="color: #00b894;"></i> Piscine
                                            </div>
                                            <div
                                                style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-light);">
                                                <i class="fas fa-tree" style="color: #00b894;"></i> Jardin paysager
                                            </div>
                                            <div
                                                style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-light);">
                                                <i class="fas fa-bolt" style="color: #00b894;"></i> Générateur
                                            </div>
                                            <div
                                                style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-light);">
                                                <i class="fas fa-tint" style="color: #00b894;"></i> Forage d'eau
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div>
                            <!-- Contact Agent -->
                            <div class="content-card fade-in" style="margin-bottom: 2rem;">
                                <div class="card-header">
                                    <div class="card-title">
                                        <i class="fas fa-user-tie"></i> Agent immobilier
                                    </div>
                                </div>
                                <div class="card-content" style="text-align: center;">
                                    <div
                                        style="width: 80px; height: 80px; border-radius: 50%; background: var(--primary-gradient); 
                                                display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; 
                                                color: white; font-size: 2rem; font-weight: 700;">
                                        JK
                                    </div>
                                    <h4 style="font-weight: 700; margin-bottom: 0.5rem;">Jean Kouassi</h4>
                                    <p style="color: var(--text-light); margin-bottom: 1.5rem;">Agent certifié</p>

                                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                                        <a href="tel:+229" class="btn btn-primary"
                                            style="width: 100%; justify-content: center;">
                                            <i class="fas fa-phone"></i> Appeler
                                        </a>
                                        <a href="mailto:jean@immobilierbenin.com" class="btn btn-outline"
                                            style="width: 100%; justify-content: center; color: #667eea; border-color: #667eea;">
                                            <i class="fas fa-envelope"></i> Email
                                        </a>
                                        <button class="btn btn-outline"
                                            style="width: 100%; justify-content: center; color: #667eea; border-color: #667eea;">
                                            <i class="fas fa-calendar"></i> Planifier visite
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="content-card fade-in" style="margin-bottom: 2rem;">
                                <div class="card-header">
                                    <div class="card-title">
                                        <i class="fas fa-heart"></i> Actions rapides
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                                        <button class="btn btn-outline"
                                            style="width: 100%; justify-content: center; color: #e17055; border-color: #e17055;">
                                            <i class="fas fa-heart"></i> Ajouter aux favoris
                                        </button>
                                        <button class="btn btn-outline"
                                            style="width: 100%; justify-content: center; color: #667eea; border-color: #667eea;">
                                            <i class="fas fa-share"></i> Partager
                                        </button>
                                        <button class="btn btn-outline"
                                            style="width: 100%; justify-content: center; color: #fdcb6e; border-color: #fdcb6e;">
                                            <i class="fas fa-calculator"></i> Simuler crédit
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Property Stats -->
                            <div class="content-card fade-in">
                                <div class="card-header">
                                    <div class="card-title">
                                        <i class="fas fa-chart-bar"></i> Statistiques
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <span style="color: var(--text-light);">
                                                <i class="fas fa-eye"></i> Vues
                                            </span>
                                            <span style="font-weight: 600;">1,234</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <span style="color: var(--text-light);">
                                                <i class="fas fa-heart"></i> Favoris
                                            </span>
                                            <span style="font-weight: 600;">89</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <span style="color: var(--text-light);">
                                                <i class="fas fa-calendar"></i> Publié
                                            </span>
                                            <span style="font-weight: 600;">Il y a 2 jours</span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <span style="color: var(--text-light);">
                                                <i class="fas fa-tag"></i> Référence
                                            </span>
                                            <span style="font-weight: 600;">#IB2024001</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
