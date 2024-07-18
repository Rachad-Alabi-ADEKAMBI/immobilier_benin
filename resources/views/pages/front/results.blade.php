<x-app-layout>
    <section class='section'>
        <div class="">

            <!--search-->
            @include('pages.front.search')
            <!--search-->

            <!--properties-->
            <div class="container mt-2 mb-3">
                <div class="row">
                    <div class="col-12 mt-4">
                        <h2 class="mx-auto text-center">
                            Résultats de la recherche ({{ $datas->count() }})
                        </h2>
                    </div>
                </div>

                <div class="row ads mt-3">
                    @if($datas->count() > 0)
                        @foreach($datas as $data)
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
                                    <div class="final__details">
                                        <div class="detail">
                                            <i class="bi bi-people"></i> {{ $data->people }} ménage{{ $data->people > 1 ? 's' : '' }}
                                        </div>
                                        <div class="detail">
                                            <i class="bi bi-room"></i> {{ $data->rooms }} chambre{{ $data->rooms > 1 ? 's' : '' }}
                                        </div>
                                        <div class="detail">
                                            <i class="bi bi-bathroom"></i> {{ $data->bathrooms }} douche{{ $data->bathrooms > 1 ? 's' : '' }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="row align-items-end" id='app'>
                            <div class="col-sm-12 col-md-8 mx-auto">
                                <div class="bg-white border rounded p-3 wow">
                                    <form action="" method="POST">
                                        <h1 class="mx-auto text-center">
                                            Nouvelle recherche personnalisée
                                        </h1>
                                        <div class="row g-3 mt-2">
                                            <p class="text text-grey p-2">
                                                Malheureusement nous n'avons trouvé aucun résultat pour cette recherche, mais vous pouvez en faire une recherche 
                                                personnalisée, les annonceurs de Immobilier Bénin seront alors
                                                informés que vous avez ce besoin. <br>
                                                <span class="text text-danger">*</span> Il est nécessaire de 
                                                posséder un compte gratuit Immobilier Bénin pour cette option. <br>
                                                <span class="text text-danger">*</span> Votre numéro de téléphone
                                                sera partagé afin que vous soyez contacté.
                                            </p>
                                        </div>
                                        <div class="row-sm-12 col-md-8 mx-auto text-center">
                                            @if(isset($_SESSION['user']['id']))
                                                <button class="btn btn-success m-2" href="{{ url('/newNeed')}}">
                                                    Oui, créer la demande
                                                </button>
                                            @else
                                                <a class="btn btn-blue m-2" href="{{ url('/login') }}">
                                                    Connexion
                                                </a>
                                            @endif
                                            <button type="button" class="btn btn-danger m-2" onclick="window.history.back()">
                                                Non, merci
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!--end properties-->

        </div>
    </section>
</x-app-layout>
