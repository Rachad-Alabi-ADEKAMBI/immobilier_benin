<?php use Illuminate\Support\Facades\Request; ?>

<p class="text text-center pt-2">
    Bonjour <strong>
        {{ ucfirst(auth()->user()->first_name) }}
        {{ strtoupper(auth()->user()->last_name) }}
    </strong> 
</p>

@if (auth()->user()->situation == 'Non disponible')
    <p class="text text-danger text-center">
        Votre profil a été temporairement désactivé par l'administrateur du site, <br>
        Un email descriptif vous a été envoyé, merci de régulariser votre compte.
    </p>
@endif

<div class="col-sm-12 text-center">
    <div class="menu">
        <a class="btn btn-primary m-2 {{ Request::is('dashboard') ? 'bg-secondary' : '' }}" href="{{ url('/dashboard') }}">
            <i class="bi bi-card-list"></i> Mes annonces
        </a>

        <a class="btn btn-primary m-2 {{ Request::is('needs') ? 'bg-secondary' : '' }}" href="{{ url('/needs') }}">
            <i class="bi bi-question-circle-fill"></i> Demandes clients
        </a>

        <a class="btn btn-primary m-2 {{ Request::is('profile') ? 'bg-secondary' : '' }}" href="{{ url('/profile') }}">
            <i class="bi bi-gear"></i> Paramètres
        </a>
    </div>
</div>


