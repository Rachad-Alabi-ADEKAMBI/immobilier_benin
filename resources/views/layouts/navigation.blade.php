   <!-- Theme Toggle -->
   <button class="theme-toggle" onclick="toggleTheme()" title="Changer de thème">
       <i class="fas fa-moon" id="themeIcon"></i>
   </button>

   <nav class="navbar" id="navbar" style="margin-bottom: 150px;">
       <div class="nav-container">
           <div class="logo" >
                <a href=" {{ url('home') }}">
                       <i class="fas fa-home"></i>
               Immo
                </a>
           </div>

           <button class="mobile-menu-btn" id="mobileMenuBtn">
               <span></span>
               <span></span>
               <span></span>
           </button>

           <ul class="nav-links" id="navLinks">
               <li><a href=" {{ url('/home') }}" class="active">
                       <i class="fas fa-home"></i> Accueil
                   </a></li>
               <li><a href=" {{ url('/ads') }}">
                       <i class="fas fa-building"></i> Propriétés
                   </a></li>
               <li><a href=" {{ url('home#about') }}"">
                       <i class="fas fa-info-circle"></i> À propos
                   </a></li>
               <li><a href=" {{ url('home#contact') }}">
                       <i class="fas fa-envelope"></i> Contact
                   </a></li>
               <li>
                   <a href=" {{ url('login') }}" class="login-link">
                       <i class="fas fa-sign-in-alt"></i> Connexion
                   </a>
               </li>
           </ul>

           <a href="dashboard.html" class="cta-nav">
               <i class="fas fa-plus"></i>
               Publier une annonce
           </a>
       </div>
   </nav>
