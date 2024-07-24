<x-app-layout>

<section class="section">
    <div>
        <!--new hero-->
        <div class="hero">
            <div class="row">
                <div class="col-sm-12 col-md-8 mx-auto">
                    <div class="hero__content animate__animated animate__backInLeft animate__delay-1s">
                        <h1>
                            IMMOBILIER BENIN
                        </h1>
                        <p class="text text-white fw-bold">
                            Annonces gratuites vente et location de biens immobiliers
                        </p>
                        <a class="btn btn-primary" href="{{ url('/ads') }}">
                            Voir les annonces
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--end hero-->

        <!--search-->
        @include('pages/front/search')
        <!--end search-->

        <!--category-->
<div class="container">
    <div class="row categories">
        <div class="col-sm-12 col-md-3 category">
                <i class="bi bi-house"></i>
            <p class="category__name">
                Maison
            </p>
        </div>
        <div class="col-sm-12 col-md-3 category">
                <i class="bi bi-building"></i>
            <p class="category__name">
                Appartement
            </p>
        </div>
        <div class="col-sm-12 col-md-3 category">
                <i class="bi bi-bag"></i>
            <p class="category__name">
                Boutiques
            </p>
        </div>
        <div class="col-sm-12 col-md-3 category">
                <i class="bi bi-geo"></i>
            <p class="category__name">
                Terrain
            </p>
        </div>
    </div>
</div>
<!--end category-->



        <!--properties 1-->
        <div class="container mt-2 mb-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="mx-auto text-center">
                        Dernières annonces
                    </h2>
                </div>
            </div>
            <div class="row ads mt-3">
                @foreach($datas_first as $data)
                <a href="{{ url('/ad/' . $data->id) }}" class="ad">
                    <div class="ad__image">
                        <img src="{{ url('img/ads/' . $data->pic1) }}" alt="appartement a louer a cotonou">
                        <div class="action">
                            {{ $data->action }}
                        </div>
                        <div class="category">
                            {{ $data->category }}
                        </div>
                    </div>
                    <div class="ad__infos">
                        <div class="price">
                            {{ number_format($data->price, 0, '', ' ') }} XOF
                        </div>
                        <div class="name">
                            {{ $data->name }}
                        </div>
                        <div class="more__details">
                            <div class="location">
                                <i class="bi bi-geo-alt"></i> {{ $data->location }}
                            </div>
                            <div class="date">
                                <i class="bi bi-calendar"></i> {{ $data->created_at->format('d/m/y') }}
                            </div>
                        </div>
                        @if ($data->category != 'Terrain' && $data->category != 'Boutique')
                        <div class="final__details">
                            <div class="detail">
                                <i class="fa-solid fa-users"></i>{{ $data->people }} ménage{{ $data->people > 1 ? 's' : '' }}
                            </div>
                            <div class="detail">
                                <i class="fa-solid fa-bed"></i>{{ $data->rooms }} chambre{{ $data->rooms > 1 ? 's' : '' }}
                            </div>
                            <div class="detail">
                                <i class="fa-solid fa-shower"></i>{{ $data->bathrooms }} douche{{ $data->bathrooms > 1 ? 's' : '' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <!--end properties-->

        <!--services-->
        <div class="container mt-4" id="services">
            <div class="row services">
                <div class="col-sm-12 col-md-6 services__image">
                    <img src="{{ asset('img/hero1.jpg') }}" alt="" class="image">
                    <div class="services__image__bg">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 services__text">
                    <h2>
                        Nos services
                    </h2>
                    <div class="mt-4">
                        <p><i class="fa fa-check text-blue mr-2"></i>Annonces gratuites</p>
                        <p><i class="fa fa-check text-blue mr-2"></i>Recherches personnalisées</p>
                        <p><i class="fa fa-check text-blue mr-2"></i>Mise en relation entre annonceurs et clients</p>
                        <p><i class="fa fa-check text-blue mr-2"></i>Gestion juridique, fiscale et sociale</p>
                        <p><i class="fa fa-check text-blue mr-2"></i>Gestion de patrimoine</p>
                        <p><i class="fa fa-check text-blue mr-2"></i>Conseils en investissement</p>
                    </div>
                </div>
            </div>
        </div>
        <!--end services-->

        <!--properties 2-->
        <div class="container mt-4 mb-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="mx-auto text-center">
                        Annonces les plus consultées
                    </h2>
                </div>
            </div>
            <div class="row ads mt-3">
                @foreach($datas_second as $data)
                <a href="{{ url('/ad/' . $data->id) }}" class="ad">
                    <div class="ad__image">
                        <img src="{{ url('img/ads/' . $data->pic1) }}" alt="appartement a louer a cotonou">
                        <div class="action">
                            {{ $data->action }}
                        </div>
                        <div class="category">
                            {{ $data->category }}
                        </div>
                    </div>
                    <div class="ad__infos">
                        <div class="price">
                            {{ number_format($data->price, 0, '', ' ') }} XOF
                        </div>
                        <div class="name">
                            {{ $data->name }}
                        </div>
                        <div class="more__details">
                            <div class="location">
                                <i class="bi bi-geo-alt"></i> {{ $data->location }}
                            </div>
                            <div class="date">
                                <i class="bi bi-calendar"></i> {{ $data->created_at->format('d/m/y') }}
                            </div>
                        </div>
                        @if ($data->category != 'Terrain' && $data->category != 'Boutique')
                        <div class="final__details">
                            <div class="detail">
                                <i class="fa-solid fa-users"></i>{{ $data->people }} ménage{{ $data->people > 1 ? 's' : '' }}
                            </div>
                            <div class="detail">
                                <i class="fa-solid fa-bed"></i>{{ $data->rooms }} chambre{{ $data->rooms > 1 ? 's' : '' }}
                            </div>
                            <div class="detail">
                                <i class="fa-solid fa-shower"></i>{{ $data->bathrooms }} douche{{ $data->bathrooms > 1 ? 's' : '' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <!--end properties-->

        <!--about-->
        <div class="container mt-5 mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-6 about__text">
                    <h2>
                        Qui sommes nous ?
                    </h2>
                    <div class="mt-4">
                        <p>
                            Immobilier Bénin est un service du groupe <strong>Orizon +</strong>. Nous intervenons à toutes
                            les étapes de votre projet d'entreprise et d'investissement. <br> <br> Notre plus grande réussite se
                            trouve au niveau des membres de la diaspora que nous accompagnons à concrétiser leurs projets
                            d'investissement grâce à notre équipe d'experts en gestion juridique, fiscale et sociale.
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 about__image">
                    <img src="{{ asset('img/hero1.jpg') }}" alt="" class="image">
                    <div class="about__image__bg">
                    </div>
                </div>
            </div>
        </div>
        <!--end about-->

        <!--testimonial-->
        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="mx-auto text-center">
                        Témoignages
                    </h2>
                </div>
            </div>
            <div class="row mt-3 mb-3 testimonials">
                <div class="col-sm-12 col-md-6 testimonial">
                    <p class="text">
                        "J'ai eu recours à Immobilier Benin pour vendre ma maison à Porto-Novo. Ils m'ont accompagné à
                        toutes les étapes et ont réussi à trouver un acheteur en moins de deux semaines. Service de
                        qualité et personnel très compétent. Je recommande vivement !"
                    </p>
                    <div class="user">
                        <div class="user__image">
                            <img src="{{ asset('img/hero1.jpg') }}" alt="">
                        </div>
                        <div class="user__name">
                            <span>Jean Dupont</span>
                            <span>Porto-Novo</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 testimonial">
                    <p class="text">
                        "Immobilier Benin nous a aidé à trouver le terrain idéal pour notre projet d'hôtel à Cotonou.
                        Leur connaissance du marché et leurs conseils nous ont été précieux. Merci à toute l'équipe pour
                        leur professionnalisme."
                    </p>
                    <div class="user">
                        <div class="user__image">
                            <img src="{{ asset('img/hero1.jpg') }}" alt="">
                        </div>
                        <div class="user__name">
                            <span>Amina Diop</span>
                            <span>Cotonou</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end testimonial-->
    </div>
</section>

</x-app-layout>
