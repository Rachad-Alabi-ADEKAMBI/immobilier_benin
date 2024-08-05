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
                    <img src="{{ asset('/img/ads/' . $datas_first->pic1) }}" alt="appartement a louer a cotonou">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic2) }}" alt="appartement a louer a cotonou">
                </div>
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic3) }}" alt="appartement a louer a cotonou">
                </div>
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic4) }}" alt="appartement a louer a cotonou">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic5) }}" alt="appartement a louer a cotonou">
                </div>
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic6) }}" alt="appartement a louer a cotonou">
                </div>
                <div class="col-sm-12 col-md-4 mx-auto text-center image">
                    <img src="{{ url('img/ads/' . $datas_first->pic7) }}" alt="appartement a louer a cotonou">
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
                            {{ $datas_first->size }} m2
                        </small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p><i class="fa fa-list-alt text-blue me-2"></i> 
                        {{ $datas_first->category }} <br>
                        <i class="fa fa-map-marker-alt text-blue me-2"></i> 
                        {{ $datas_first->location }}, {{ $datas_first->action }} <br>
                        <i class="far fa-clock text-blue"></i>
                        {{ $datas_first->created_at }}
                    </p>

                    <div class="d-flex border-top">
                        <h5 class="text-blue mt-3 mb-2">{{ $datas_first->price }} F CFA</h5>
                    </div>
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
                        <i class="fas fa-exclamation text-danger"></i> <a href="index.php?action=contactPage">Contactez-nous </a> si vous ne savez pas comment procéder.
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

        <div class="row content mt-1">
            @foreach($datas_second as $data)
            <div class="col-lg-4 col-md-6 wow fadeInUp item ad" data-wow-delay="0.1s">
                <div class="property-item rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ url('img/' . $data->pic1) }}" alt="">
                        <div class="bg-blue rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                            {{ $data->action }}
                        </div>
                        <div class="bg-white rounded-top text-blue position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                            {{ $data->category }}
                        </div>
                    </div>
                    <div class="p-4 pb-0">
                        <h5 class="text-blue mb-3">{{ $data->price }} XOF</h5>
                        <a class="d-block h5 mb-2" href="">{{ ucwords(strtolower($data->name)) }}</a>
                        <p><i class="fa fa-map-marker-alt text-blue me-2"></i> {{ $data->location }}</p>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-blue me-2"></i>{{ $data->people }} ménage{{ $data->people > 1 ? 's' : '' }}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-blue me-2"></i>{{ $data->rooms }} chambre{{ $data->rooms > 1 ? 's' : '' }}</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-blue me-2"></i>{{ $data->bathrooms }} douche{{ $data->bathrooms > 1 ? 's' : '' }}</small>
                    </div>

                    <div class="d-flex border-top">
                        <small class="flex-fill text-left border-end py-2"><i class="fa fa-ruler-combined text-blue me-2"></i>{{ $data->size }} m2</small>
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
