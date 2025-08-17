<template>
    <div class="page active" id="page-home">
        <!-- Hero Section -->
        <section class="hero" id="home">
            <div class="floating-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
                <div class="shape shape-4"></div>
            </div>
            <div class="hero-container">
                <h1 class="hero-title">
                    Trouvez votre propriété de rêve au Bénin
                </h1>
                <p class="hero-subtitle">
                    Découvrez les meilleures opportunités immobilières avec
                    notre plateforme moderne et intuitive. Maisons,
                    appartements, terrains - tout ce dont vous avez besoin pour
                    votre projet.
                </p>
                <div class="hero-cta">
                    <a
                        href="#"
                        onclick="showPage('proprietes')"
                        class="btn btn-primary"
                    >
                        <i class="fas fa-search"></i>
                        Explorer les propriétés
                    </a>
                    <a
                        href="#"
                        onclick="showPage('about')"
                        class="btn btn-outline"
                    >
                        <i class="fas fa-play"></i>
                        En savoir plus
                    </a>
                </div>
            </div>
        </section>

        <!-- Search Section -->
        <section class="search-section">
            <div class="search-container">
                <div class="search-card">
                    <div class="search-form">
                        <div class="form-group">
                            <label
                                ><i class="fas fa-home"></i> Type de bien</label
                            >
                            <select class="form-control">
                                <option>Tous les types</option>
                                <option>🏠 Maison</option>
                                <option>🏢 Appartement</option>
                                <option>🌳 Terrain</option>
                                <option>🏪 Commercial</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label
                                ><i class="fas fa-tag"></i> Transaction</label
                            >
                            <select class="form-control">
                                <option>Achat ou Location</option>
                                <option>💰 Achat</option>
                                <option>🏠 Location</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label
                                ><i class="fas fa-map-marker-alt"></i>
                                Localisation</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Ville, quartier..."
                            />
                        </div>
                        <div class="form-group">
                            <label
                                ><i class="fas fa-dollar-sign"></i>
                                Budget</label
                            >
                            <select class="form-control">
                                <option>Tous les budgets</option>
                                <option>< 10M FCFA</option>
                                <option>10M - 50M FCFA</option>
                                <option>50M - 100M FCFA</option>
                                <option>> 100M FCFA</option>
                            </select>
                        </div>
                    </div>
                    <button class="search-btn">
                        <i class="fas fa-search"></i>
                        Rechercher maintenant
                    </button>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="container">
                <div class="section-header fade-in">
                    <h2 class="section-title">Pourquoi nous choisir ?</h2>
                    <p class="section-subtitle">
                        Nous offrons une expérience immobilière exceptionnelle
                        avec des services de qualité
                    </p>
                </div>
                <div class="features-grid">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="feature-title">Recherche avancée</h3>
                        <p class="feature-description">
                            Trouvez exactement ce que vous cherchez avec nos
                            filtres intelligents et notre système de recherche
                            avancé.
                        </p>
                    </div>
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">Transactions sécurisées</h3>
                        <p class="feature-description">
                            Toutes nos transactions sont sécurisées et vérifiées
                            pour votre tranquillité d'esprit.
                        </p>
                    </div>
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="feature-title">Agents experts</h3>
                        <p class="feature-description">
                            Notre équipe d'agents certifiés vous accompagne à
                            chaque étape de votre projet immobilier.
                        </p>
                    </div>
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="feature-title">Plateforme moderne</h3>
                        <p class="feature-description">
                            Interface intuitive et responsive, accessible
                            partout et à tout moment sur tous vos appareils.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Properties Section -->
        <section class="properties" id="properties">
            <div class="container">
                <div class="section-header fade-in">
                    <h2 class="section-title">Propriétés en vedette</h2>
                    <p class="section-subtitle">
                        Découvrez notre sélection de propriétés exceptionnelles
                    </p>
                </div>
                <div class="properties-grid">
                    <!-- Property 1 -->
                    <div class="property-card fade-in">
                        <div class="property-image">
                            <img
                                src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                alt="Villa moderne"
                            />
                            <div class="property-badge">
                                <i class="fas fa-star"></i> Coup de cœur
                            </div>
                            <div class="property-type">Vente</div>
                        </div>
                        <div class="property-content">
                            <h3 class="property-title">
                                Villa moderne à Cotonou
                            </h3>
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
                                <button
                                    class="btn-small btn-primary-small"
                                    onclick="showPage('propriete')"
                                >
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
                            <img
                                src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                alt="Appartement luxe"
                            />
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
                                <button
                                    class="btn-small btn-primary-small"
                                    onclick="showPage('propriete')"
                                >
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
                            <img
                                src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                alt="Terrain"
                            />
                            <div class="property-badge">
                                <i class="fas fa-gem"></i> Exclusif
                            </div>
                            <div class="property-type">Vente</div>
                        </div>
                        <div class="property-content">
                            <h3 class="property-title">
                                Terrain constructible
                            </h3>
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
                                <button
                                    class="btn-small btn-primary-small"
                                    onclick="showPage('propriete')"
                                >
                                    <i class="fas fa-eye"></i> Voir détails
                                </button>
                                <button class="btn-small btn-outline-small">
                                    <i class="fas fa-heart"></i> Favoris
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 3rem">
                    <a
                        href="#"
                        onclick="showPage('proprietes')"
                        class="btn btn-primary"
                    >
                        <i class="fas fa-th-large"></i>
                        Voir toutes les propriétés
                    </a>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item fade-in">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Propriétés actives</span>
                    </div>
                    <div class="stat-item fade-in">
                        <span class="stat-number">1000+</span>
                        <span class="stat-label">Clients satisfaits</span>
                    </div>
                    <div class="stat-item fade-in">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Agents experts</span>
                    </div>
                    <div class="stat-item fade-in">
                        <span class="stat-number">12</span>
                        <span class="stat-label">Villes couvertes</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about" id="about">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2>À propos d'ImmobilierBenin</h2>
                        <p>
                            Depuis plus de 10 ans, ImmobilierBenin est votre
                            partenaire de confiance dans le secteur immobilier
                            béninois. Nous mettons notre expertise au service de
                            vos projets, qu'il s'agisse d'achat, de vente ou de
                            location.
                        </p>
                        <p>
                            Notre équipe d'agents certifiés vous accompagne avec
                            professionnalisme et transparence pour concrétiser
                            vos rêves immobiliers dans les meilleures
                            conditions.
                        </p>
                        <div class="about-features">
                            <div class="about-feature">
                                <i class="fas fa-award"></i>
                                <span>10+ ans d'expérience</span>
                            </div>
                            <div class="about-feature">
                                <i class="fas fa-users"></i>
                                <span>1000+ clients satisfaits</span>
                            </div>
                            <div class="about-feature">
                                <i class="fas fa-handshake"></i>
                                <span>Transactions sécurisées</span>
                            </div>
                            <div class="about-feature">
                                <i class="fas fa-clock"></i>
                                <span>Support 24h/7j</span>
                            </div>
                        </div>
                        <a
                            href="#"
                            onclick="showPage('contact')"
                            class="btn btn-primary"
                        >
                            <i class="fas fa-envelope"></i>
                            Nous contacter
                        </a>
                    </div>
                    <div class="about-image">
                        <img
                            src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="À propos"
                        />
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact" id="contact">
            <div class="container">
                <div class="section-header fade-in">
                    <h2 class="section-title">Contactez-nous</h2>
                    <p class="section-subtitle">
                        Notre équipe est à votre disposition pour répondre à
                        toutes vos questions
                    </p>
                </div>
                <div class="contact-content">
                    <div class="contact-form">
                        <h3>
                            <i class="fas fa-envelope"></i> Envoyez-nous un
                            message
                        </h3>
                        <form>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-user"></i> Nom complet
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Votre nom complet"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-envelope"></i> Email
                                </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="votre@email.com"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-phone"></i> Téléphone
                                </label>
                                <input
                                    type="tel"
                                    class="form-control"
                                    placeholder="+229 XX XX XX XX"
                                />
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-comment"></i> Message
                                </label>
                                <textarea
                                    class="form-control"
                                    rows="5"
                                    placeholder="Votre message..."
                                    required
                                ></textarea>
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary"
                                style="width: 100%"
                            >
                                <i class="fas fa-paper-plane"></i>
                                Envoyer le message
                            </button>
                        </form>
                    </div>
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Adresse</h4>
                                <p>
                                    123 Avenue de l'Indépendance<br />Cotonou,
                                    Bénin
                                </p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Téléphone</h4>
                                <p>+229 XX XX XX XX<br />+229 YY YY YY YY</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Email</h4>
                                <p>
                                    contact@immobilierbenin.com<br />info@immobilierbenin.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "HomePageComponent",

    data() {
        return {
            message: "ok",
        };
    },

    mounted() {
        //  this.alert();
    },
    computed: {},

    methods: {
        alert() {
            alert("ok");
        },
        formatAmount(value) {
            return Number(value).toLocaleString("fr-FR");
        },

        formatDateTime(datetime) {
            const date = new Date(datetime);
            const options = {
                day: "2-digit",
                month: "2-digit",
                year: "numeric",
                hour: "2-digit",
                minute: "2-digit",
            };
            return date.toLocaleString("fr-FR", options);
        },
    },
};
</script>
