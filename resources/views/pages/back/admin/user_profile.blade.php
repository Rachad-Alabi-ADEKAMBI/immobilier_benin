 <a href="{{ route('newAd') }}" class="header-btn">
     <i class="fas fa-plus"></i>
     Nouvelle annonce
 </a>

 <div class="user-profile">
     <div class="user-avatar">
         {{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}
         {{ strtoupper(substr(auth()->user()->last_name, 0, 1)) }}
     </div>
     <div class="user-info">
         <div class="user-name">
             {{ ucfirst(auth()->user()->first_name) }} {{ ucfirst(auth()->user()->last_name) }}
         </div>
         <div class="user-role">
             Connecté
         </div>
     </div>

 </div>
