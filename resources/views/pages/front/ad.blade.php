<x-app-layout>

    <section class="section">
    <div class="" id="app">
        <div class="container">
            
            <div class="row">
                <div class="col">
                    <h1 class="text-center">
                        {{ $datas_first->name }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 mx-auto text-center main-img">
                    <img src="{{ asset('/img/ads/' . $datas_first->pic1) }}" alt="louer ou venre un bien immobilier au Bénin">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic2) }}" alt="louer ou venre un bien immobilier au Bénin">
                </div>
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic3) }}" alt="louer ou venre un bien immobilier au Bénin">
                </div>
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic4) }}" alt="louer ou venre un bien immobilier au Bénin">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic5) }}" alt="louer ou venre un bien immobilier au Bénin">
                </div>
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic6) }}" alt="louer ou venre un bien immobilier au Bénin">
                </div>
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic7) }}" alt="louer ou venre un bien immobilier au Bénin">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic8) }}" alt="louer ou venre un bien immobilier au Bénin">
                </div>
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic9) }}" alt="louer ou venre un bien immobilier au Bénin">
                </div>
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic10) }}" alt="louer ou venre un bien immobilier au Bénin">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="icon">
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-ruler-combined text-blue me-2"></i>{{ $datas_first->people }} ménage{{ $datas_first->people > 1 ? 's' : '' }}
                            </small>
                            <small class="flex-fill text-center border-end py-2">
                                <i class="fa fa-bed text-blue me-2"></i>{{ $datas_first->rooms }} chambre{{ $datas_first->rooms > 1 ? 's' : '' }}
                            </small>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-bath text-blue me-2"></i>{{ $datas_first->bathrooms }} douche{{ $datas_first->bathrooms > 1 ? 's' : '' }}
                            </small>
                        </div>
                    </div>

                    <div class="icon">
                        <small class="flex-fill text-left border-end py-2">
                            <i class="fa fa-ruler-combined text-left me-2"></i>
                            {{ number_format($datas_first->size, 0, '', ' ') }} m2
                        </small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <p><i class="fa fa-list-alt text-blue me-2"></i> 
                        {{ $datas_first->category }} <br>
                        <i class="bi bi-geo-alt text-blue"></i>
                        {{ $datas_first->location }}, {{ $datas_first->action }} <br>
                        <i class="far fa-clock text-blue"></i>
                        {{ $datas_first->created_at }}
                    </p>

                    <div class="d-flex border-top">
                        <h5 class="text-blue mt-3 mb-2">{{ number_format($datas_first->price, 0, '', ' ') }} XOF</h5>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 ml-0">
                    @if($datas_first->category != 'Terrain' && $datas_first->category != 'Boutique' )
                        <div class="final__details" >
                                    <div class="detail"><i class="fa-solid fa-users text-blue"></i> {{ $datas_first->people }} ménage{{ $datas_first->people > 1 ? 's' : '' }}</div>
                                    <div class="detail"><i class="fa-solid fa-bed text-blue"></i> {{ $datas_first->rooms }} chambre{{ $datas_first->rooms > 1 ? 's' : '' }}</div>
                                    <div class="detail"><i class="fa-solid fa-shower text-blue"></i> {{ $datas_first->bathrooms }} douche{{ $datas_first->bathrooms > 1 ? 's' : '' }}</div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-12 col-md-8 mx-auto text-center">
                    <p class="text text-grey">{{ $datas_first->description }}</p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <p class="text-left">
                        <i class="fas fa-exclamation text-danger"></i> N'envoyez jamais de l'argent à une personne que vous n'avez jamais vue.<br>
                        <i class="fas fa-exclamation text-danger"></i> Assurez-vous que le bien appartient réellement au vendeur lors d'un achat.<br>
                        <i class="fas fa-exclamation text-danger"></i> <a href="/contacT">Contactez-nous </a> si vous ne savez pas comment procéder.
                    </p>
                    
                </div>
                <div class="col-sm-12 col-md-8 mx-auto text-center">
                    <p>
                        Annonceur: <strong> 
                                    {{ ucwords(strtolower($datas_first->first_name)) }}
                                    {{ ucwords(strtolower($datas_first->last_name)) }}
                                    </strong> <br>
                        Contact: <strong>{{ $datas_first->phone }}</strong>
                    </p>
                </div>
                <div class="col-sm-12 col-md-8 mx-auto text-center">
                    <p>
                        Partager: <br>
                        <a href="https://wa.me/?text=https://immobilier_benin.000webhostapp.com/property.php?id=1">
                            <i class="fab fa-whatsapp text-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/share.php?u=https:/immobilier_benin.000webhostapp.com/property.php?id=1" target="_blank">
                            <i class="fab fa-facebook text-facebook"></i>
                        </a>
                    </p>
                </div>
            </div>

        </div>
      

        <div class="row mt-">
            <div class="col-12 text-center">
                <h2 class="text-center">
                    Annonces similaires
                </h2>
            </div>
        </div>

        
        <div class="row ads mt-1">
            @foreach($datas_second as $datas)
            <div class="ad">
                <div class="ad__image">
                    <img src="{{ url('img/ads/' . $datas->pic1) }}" alt="Immobilier Benin">
                    <div class="action">{{ $datas->action }}</div>
                    <div class="category">{{ $datas->category }}</div>
                </div>
                <div class="ad__infos">
                    <div class="price">{{ number_format($datas->price, 0, '', ' ') }} XOF</div>
                    <div class="name">{{ ucfirst($datas->name) }}</div>
                    <div class="more__details">
                        <div class="location"><i class="bi bi-geo-alt"></i> {{ $datas->location }}</div>
                        <div class="date"><i class="bi bi-calendar"></i> {{ $datas->created_at->format('d/m/Y') }}</div>
                    </div>
                    <div class="final__details" >
                        <div class="detail"><i class="fa-solid fa-users"></i> {{ $datas->people }} ménage{{ $datas->people > 1 ? 's' : '' }}</div>
                        <div class="detail"><i class="fa-solid fa-bed"></i> {{ $datas->rooms }} chambre{{ $datas->rooms > 1 ? 's' : '' }}</div>
                        <div class="detail"><i class="fa-solid fa-shower"></i> {{ $datas->bathrooms }} douche{{ $datas->bathrooms > 1 ? 's' : '' }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>
    </section>

</x-app-layout>

<style>
    img{
        width: 320px;
        height: 250px;
        margin: auto;
    }
</style>
