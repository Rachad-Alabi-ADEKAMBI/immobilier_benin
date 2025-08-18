 <!-- Theme Toggle -->

 <div class="header-actions">

     <button class="theme-toggle" onclick="toggleTheme()" title="Changer de thème">
         <i class="fas fa-moon" id="themeIcon"></i>
     </button>

     <!-- Mobile Header -->
     <div class="mobile-header">
         <button class="mobile-menu-btn" onclick="toggleMobileSidebar()">
             <i class="fas fa-bars"></i>
         </button>
         <div class="sidebar-logo">
             <i class="fas fa-home"></i>
             <span>ImmobilierBenin</span>
         </div>
         <div class="user-avatar">JK</div>
     </div>

     <!-- Mobile Overlay -->
     <div class="mobile-overlay" id="mobileOverlay" onclick="closeMobileSidebar()"></div>
 </div>
