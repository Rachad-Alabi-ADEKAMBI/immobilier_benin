  <aside class="sidebar" id="sidebar">
      <button class="mobile-close-btn" onclick="closeMobileSidebar()">
          <i class="fas fa-times"></i>
      </button>

      <div class="sidebar-header">
          <a href="index.html" class="sidebar-logo">
              <i class="fas fa-home"></i>
              <span>ImmobilierBenin</span>
          </a>
          <button class="sidebar-toggle" onclick="toggleSidebar()">
              <i class="fas fa-chevron-left"></i>
          </button>
      </div>

      <nav class="sidebar-nav">
          <div class="nav-section">
              <div class="nav-section-title">Principal</div>
              <div class="nav-item">
                  <a class="nav-link active" onclick="showSection('overview')">
                      <i class="fas fa-tachometer-alt"></i>
                      <span class="nav-text">Vue d'ensemble</span>
                  </a>
              </div>
              <div class="nav-item">
                  <a class="nav-link" onclick="showSection('properties')">
                      <i class="fas fa-building"></i>
                      <span class="nav-text">Propriétés</span>
                  </a>
              </div>
              <div class="nav-item">
                  <a class="nav-link" onclick="showSection('users')">
                      <i class="fas fa-users"></i>
                      <span class="nav-text">Utilisateurs</span>
                  </a>
              </div>
              <div class="nav-item">
                  <a class="nav-link" onclick="showSection('transactions')">
                      <i class="fas fa-handshake"></i>
                      <span class="nav-text">Transactions</span>
                  </a>
              </div>
          </div>

          <div class="nav-section">
              <div class="nav-section-title">Gestion</div>
              <div class="nav-item">
                  <a class="nav-link" onclick="showSection('analytics')">
                      <i class="fas fa-chart-line"></i>
                      <span class="nav-text">Analytiques</span>
                  </a>
              </div>
              <div class="nav-item">
                  <a class="nav-link" onclick="showSection('messages')">
                      <i class="fas fa-envelope"></i>
                      <span class="nav-text">Messages</span>
                  </a>
              </div>
              <div class="nav-item">
                  <a class="nav-link" onclick="showSection('settings')">
                      <i class="fas fa-cog"></i>
                      <span class="nav-text">Paramètres</span>
                  </a>
              </div>
          </div>

          <div class="nav-section">
              <div class="nav-section-title">Compte</div>
              <div class="nav-item">
                  <a class="nav-link" onclick="showSection('profile')">
                      <i class="fas fa-user"></i>
                      <span class="nav-text">Mon profil</span>
                  </a>
              </div>
              <div class="nav-item">
                  <a class="nav-link" href="index.html">
                      <i class="fas fa-arrow-left"></i>
                      <span class="nav-text">Retour au site</span>
                  </a>
              </div>
              <div class="nav-item">
                  <a class="nav-link" onclick="logout()">
                      <i class="fas fa-sign-out-alt"></i>
                      <span class="nav-text">Déconnexion</span>
                  </a>
              </div>
          </div>
      </nav>
  </aside>
