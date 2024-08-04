<p class="text text-center">
    Bonjour <strong>
        admin
    </strong>
</p>

<div class="col-sm-12 mt-1 text-center">
    <div class="menu">
        <a class="btn btn-blue m-2 {{ Request::is('dashboard_admin') ? 'bg-secondary' : '' }}" href="{{ url('/dashboard_admin') }}">
            <i class="fas fa-list"></i> Annonces
        </a>

        <a class="btn btn-blue m-2 {{ Request::is('users') ? 'bg-secondary' : '' }}" href="{{ url('/users') }}">
            <i class="fas fa-users"></i> Utilisateurs
        </a>

        <a class="btn btn-blue m-2 {{ Request::is('needs_admin') ? 'bg-secondary' : '' }}" href="{{ url('/needs_admin') }}">
            <i class="fas fa-question"></i> Demandes
        </a>
    </div>
</div>