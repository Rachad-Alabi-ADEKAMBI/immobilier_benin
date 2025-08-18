 <div class="user-profile">
     <div class="user-avatar">
         {{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}
         {{ strtoupper(substr(auth()->user()->last_name, 0, 1)) }}
     </div>
     <div class="user-info">
         <div class="user-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
         <div class="user-role">{{ auth()->user()->role }}</div>
     </div>
 </div>
