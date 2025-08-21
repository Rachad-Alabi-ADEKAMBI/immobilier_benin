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

 <aside class="sidebar" id="sidebar">
     <button class="mobile-close-btn" onclick="closeMobileSidebar()">
         <i class="fas fa-times"></i>
     </button>

     <div class="sidebar-header">
         <a href="{{ route('home') }}" class="sidebar-logo">
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
                 <a class="nav-link {{ request()->routeIs('dashboardUser') ? 'active' : '' }}"
                     href="{{ route('dashboardUser') }}">
                     <i class="fas fa-tachometer-alt"></i>
                     <span class="nav-text">Vue d'ensemble</span>
                 </a>
             </div>
             <div class="nav-item">
                 <a class="nav-link {{ request()->routeIs('myAds') ? 'active' : '' }}" href="{{ route('myAds') }}">
                     <i class="fas fa-building"></i>
                     <span class="nav-text">Propriétés</span>
                 </a>
             </div>
         </div>

         <div class="nav-section">
             <div class="nav-section-title">Gestion</div>
             <div class="nav-item">
                 <a class="nav-link {{ request()->routeIs('myNotifications') ? 'active' : '' }}"
                     href="{{ route('myNotifications') }}">
                     <i class="fas fa-envelope"></i>
                     <span class="nav-text">Notifications</span>
                 </a>
             </div>
             <div class="nav-item">
                 <a class="nav-link {{ request()->routeIs('settingsUser') ? 'active' : '' }}"
                     href="{{ route('settingsUser') }}">
                     <i class="fas fa-cog"></i>
                     <span class="nav-text">Paramètres</span>
                 </a>
             </div>
         </div>

         <div class="nav-section">
             <div class="nav-section-title">Compte</div>
             <div class="nav-item">
                 <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                     <i class="fas fa-arrow-left"></i>
                     <span class="nav-text">Retour au site</span>
                 </a>
             </div>
             <div class="nav-item">
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button type="submit">
                         Déconnexion
                     </button>
                 </form>
             </div>


         </div>
     </nav>

 </aside>
